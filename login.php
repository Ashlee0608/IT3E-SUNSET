
<?php
session_start();
require_once "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    $stmt = $pdo->prepare(
        "SELECT user_id, username, password_hash, user_type
         FROM users
         WHERE username = :username
         LIMIT 1"
    );

    $stmt->execute(["username" => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password_hash"])) {
        session_regenerate_id(true);

        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["user_type"] = $user["user_type"];

        if ($user["user_type"] === "admin") {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        $error = "Incorrect username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SunSonSolar Login</title>
</head>
<body>
    <h1>SunSonSolar Login</h1>

    <?php if ($error !== ""): ?>
        <p style="color:red;">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label for="username">Username</label>
        <input type="text" id="username" name="username"
               required autocomplete="username">

        <br><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password"
               required autocomplete="current-password">

        <br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
