
<?php
require_once "db.php";

$password = "Admin123!";
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare(
    "UPDATE users SET password_hash = :hash WHERE username = :username"
);

$stmt->execute([
    "hash" => $hash,
    "username" => "admin"
]);

echo $stmt->rowCount() > 0
    ? "Admin password updated successfully."
    : "No row changed. Check whether the admin account exists.";
?>
