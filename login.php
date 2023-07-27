<?php
include("connection.php");

if (isset($_POST['login'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE user_id='$user_id' AND password='$password'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        while ($data = $result->fetch_assoc()) {
            session_start();
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['status'] = "login";
            header("location:dashboard/index.php?message=Selamat Datang di Simple Attendance System dek 🤩");
        }
    } else {
        header("location:index.php?message=Login gagal dek 🗿 Silahkan masukkan data yang benar 👍😁");
    }
}
