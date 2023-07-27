<table class="table">
    <tr class="table-tr">
        <th class="table-th">Tanggal</th>
        <th class="table-th">Jam Masuk</th>
        <th class="table-th">Jam Keluar</th>
        <th class="table-th">Status</th>
    </tr>

    <?php
    include("../config/connection.php");

    $user_id = $_SESSION['user_id'];

    date_default_timezone_set('Asia/Makassar');
    $date_now = date("Y-m-d");
    $time_now = date("H:i:s");

    $query = "SELECT * FROM absensi WHERE user_id='$user_id'";
    $result = $db->query($query);

    if (isset($_POST['clockout'])) {
        $query = "UPDATE absensi SET jam_keluar='$time_now' WHERE user_id='$user_id' AND tanggal='$date_now'";

        $clockout = $db->query($query);
        if ($clockout) {
            session_start();
            session_destroy();
            header("location:../index.php?message=Berhasil absen jam keluar ✅ Terima kasih 👍");
        } else {
            echo "Terjadi kesalahan awokwakowok 🗿";
        }
    }

    while ($data = $result->fetch_assoc()) {
        echo "<tr class='table-tr'>";
        echo "<td class='table-td'>" . $data['tanggal'] . "</td>";
        echo "<td class='table-td'>" . $data['jam_masuk'] . "</td>";
        // Kolom Jam Keluar
        if (empty($data['jam_keluar']) && !empty($data['jam_masuk']) && $data['tanggal'] == $date_now) {
            echo "<td class='table-td'>
                <form action='' method='POST'>
                    <button type='submit' name='clockout'>Keluar</button>
                </form>
            </td>";
        } else {
            echo "<td class='table-td'>" . $data['jam_keluar'] . "</td>";
        }
        // Kolom Status
        if (!empty($data['jam_masuk']) && !empty($data['jam_keluar'])) {
            echo "<td class='table-td'>👍</td>";
        } else {
            echo "<td class='table-td'>❌</td>";
        }
        echo "</tr>";
    }
    ?>
</table>

<form action="clockin.php" method="POST">
    <button type="submit" name="absen">Absen</button>
</form>