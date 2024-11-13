<?php
include('includes/database.php');

// Cek koneksi ke database
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan daftar tema
$query = "SELECT * FROM themes";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Tema</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Pastikan file CSS ada -->
</head>
<body>
    <h1>Pilih Tema</h1> <!-- Tambahkan judul di sini -->

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Tampilkan tombol dengan link ke select_books.php
            echo "<a href='select_books.php?theme_id=" . $row['theme_id'] . "'>";
            echo "<button>" . $row['theme'] . "</button>";
            echo "</a><br>";
        }
    } else {
        echo "<p>Tidak ada tema yang tersedia.</p>";
    }
    ?>

</body>
</html>
