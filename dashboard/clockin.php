<?php

include("../config/connection.php");

session_start();
$user_id = $_SESSION['user_id'];

date_default_timezone_set('Asia/Makassar');
$date_now = date('Y-m-d');
$time_now = date('H:i:s');

$attendance_check = "SELECT * FROM absensi WHERE user_id='$user_id' AND tanggal='$date_now'";
$result_check = $db->query($attendance_check);

if ($result_check->num_rows > 0) { // Jika user sudah absen pada hari ini (hari yang sama)
    header("location:index.php?message=Kamu sudah absen hari ini! ❌");
} else { // Jika user belum absen pada hari ini (hari yang sama)
    $query = "INSERT INTO absensi(`id`, `user_id`, `tanggal`, `jam_masuk`, `jam_keluar`) 
    VALUES (NULL, '$user_id', '$date_now', '$time_now', NULL)";
    $result = $db->query($query);

    if ($result) {
        header("location:index.php?message=BERHASIL absen jam masuk hari ini ✅ Terima kasih 👍");
    } else {
        header("location:index.php?message=GAGAL melakukan absensi jam masuk hari ini ❌");
    }
}
