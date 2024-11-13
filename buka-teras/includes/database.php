<?php
$conn = new mysqli("localhost", "root", "", "buka_teras"); // "root" adalah default user MySQL tanpa password.
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
