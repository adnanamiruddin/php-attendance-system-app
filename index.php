<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == 'login') {
    header("location:dashboard/index.php?message=Selamat datang kembali...");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <h2 class="login-title">Login Form</h2>
            <form action="login.php" method="POST" class="login-form">
                <?php
                if (isset($_GET['message'])) {
                    echo $_GET['message'];
                }
                ?>
                <input type="text" name="user_id" class="login-input" />
                <input type="password" name="password" class="login-input" />
                <button type="submit" name="login" class="login-button">Masuk</button>
            </form>
        </div>
    </div>
</body>

</html>