<table border="1">
    <tr>
        <th>Date</th>
        <th>Clock In</th>
        <th>Clock Out</th>
        <th>Performa</th>
    </tr>

    <?php
    include("../config/connection.php");

    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM absensi WHERE user_id='$user_id'";
    $result = $db->query($query);

    while ($data = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $data['tanggal'] . "</td>";
        echo "<td>" . $data['jam_masuk'] . "</td>";
        echo "<td>" . $data['jam_keluar'] . "</td>";
        echo "<td>🗿</td>";
        echo "</tr>";
    }
    ?>
</table>

<form action="" method="POST">
    <button type="submit" name="absen"></button>
</form>