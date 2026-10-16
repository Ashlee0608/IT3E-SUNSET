<?php
// Include database connection
require_once "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and trim form inputs
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $middlename = trim($_POST["middlename"] ?? "");
    $birthdate = trim($_POST["birthdate"] ?? null);
    $gender = trim($_POST["gender"] ?? null);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"] ?? "");
    $address = trim($_POST["address"] ?? "");
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $user_type = trim($_POST["user_type"] ?? "customer");
    $department = trim($_POST["department"] ?? null);

    // Basic server-side validation for required fields
    if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password)) {
        $message = "Please fill in all required fields.";
    } else {
        try {
            // Check if username or email already exists
            $checkStmt = $pdo->prepare("SELECT user_id FROM users WHERE username = :username OR email = :email");
            $checkStmt->execute(["username" => $username, "email" => $email]);
            
            if ($checkStmt->rowCount() > 0) {
                $message = "Error: Username or Email already exists.";
            } else {
                // Hash the password securely
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                // Insert user using prepared statements
                $sql = "INSERT INTO users (firstname, lastname, middlename, birthdate, gender, email, phone, address, username, password_hash, user_type, department) 
                        VALUES (:firstname, :lastname, :middlename, :birthdate, :gender, :email, :phone, :address, :username, :password_hash, :user_type, :department)";
                
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "middlename" => $middlename ?: null,
                    "birthdate" => $birthdate ?: null,
                    "gender" => $gender ?: null,
                    "email" => $email,
                    "phone" => $phone ?: null,
                    "address" => $address ?: null,
                    "username" => $username,
                    "password_hash" => $password_hash,
                    "user_type" => $user_type,
                    "department" => $department ?: null
                ]);

                $message = "Registration successful! You can now <a href='login.php'>log in</a>.";
            }
        } catch (PDOException $e) {
            $message = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Sign Up - SunSonSolar</title>
    <style>
        body {
            background-color: #fff0f3;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px;
            color: #000;
        }
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffe6ed;
            border: 1px solid #ffccd5;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        h2 {
            margin-top: 0;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 14px;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ff8fab;
            border-radius: 4px;
            background-color: #fff;
        }
        .btn {
            display: block;
            width: 100%;
            background-color: #ffb3c6;
            color: #000;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ff8fab;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #ff8fab;
        }
        .message {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #ffccd5;
            border-radius: 4px;
            text-align: center;
            font-weight: bold;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #d81159;
            text-decoration: none;
            font-size: 14px;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Customer Sign Up</h2>

    <?php if (!empty($message)): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <form action="registration.php" method="POST">
        <div class="form-group">
            <label>First Name *</label>
            <input type="text" name="firstname" required>
        </div>
        <div class="form-group">
            <label>Last Name *</label>
            <input type="text" name="lastname" required>
        </div>
        <div class="form-group">
            <label>Middle Name</label>
            <input type="text" name="middlename">
        </div>
        <div class="form-group">
            <label>Birthdate</label>
            <input type="date" name="birthdate">
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select name="gender">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label>Email Address *</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone">
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label>Username *</label>
            <input type="text" name="username" required>
        </div>
        <div class="form-group">
            <label>Password *</label>
            <input type="password" name="password" required>
        </div>

        <!-- Hidden default for regular customer registrations -->
        <input type="hidden" name="user_type" value="customer">

        <button type="submit" class="btn">Register</button>
    </form>

    <a href="index.php" class="back-link">&larr; Back to Home</a>
</div>

</body>
</html>