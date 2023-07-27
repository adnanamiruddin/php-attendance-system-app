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
</head>

<body>
    <div>
        <div>
            <h2>Login Form</h2>
            <form action="login.php" method="POST">
                <?php
                if (isset($_GET['message'])) {
                    echo $_GET['message'];
                }
                ?>
                <input type="text" name="user_id" />
                <input type="password" name="password" />
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
</body>

</html>