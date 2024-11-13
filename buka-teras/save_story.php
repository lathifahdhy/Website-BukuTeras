<?php
include('includes/database.php'); // Koneksi ke database

// Variabel untuk menyimpan pesan notifikasi
$notification = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $story_content = $conn->real_escape_string($_POST['story_content']); // Escape input untuk keamanan SQL

    // Validasi input kosong
    if (empty($story_content)) {
        $notification = "Cerita tidak boleh kosong.";
    } else {
        // Query untuk menyimpan cerita
        $query = "INSERT INTO stories (book_id, story_content, created_at) VALUES ($book_id, '$story_content', NOW())";

        if ($conn->query($query) === TRUE) {
            $notification = "Cerita berhasil disimpan!";
        } else {
            $notification = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tulis Cerita</title>
    <style>
        /* Gaya untuk notifikasi */
        #notification {
            display: none; /* Disembunyikan secara default */
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50; /* Hijau untuk sukses */
            color: white;
            padding: 15px;
            border-radius: 5px;
            z-index: 1000;
        }
        /* Warna merah untuk pesan error */
        .error {
            background-color: #f44336; /* Warna merah */
        }
    </style>
    <script>
        // Fungsi untuk menampilkan notifikasi
        function showNotification(message, isError = false) {
            const notification = document.getElementById('notification');
            notification.innerText = message;
            notification.style.display = 'block';

            // Tambahkan kelas error jika pesan adalah error
            if (isError) {
                notification.classList.add('error');
            } else {
                notification.classList.remove('error');
            }
            
            // Sembunyikan notifikasi setelah 3 detik
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }
    </script>
</head>
<body>

<!-- Elemen notifikasi -->
<div id="notification"></div>

<!-- Formulir untuk menulis cerita -->
<form action="write_story.php" method="POST">
    <input type="hidden" name="book_id" value="1"> <!-- Ganti 1 dengan ID buku yang sesuai -->
    <textarea name="story_content" rows="10" cols="50" placeholder="Tulis cerita Anda di sini..."></textarea><br>
    <button type="submit">Simpan Cerita</button>
</form>

<?php
// Jika ada notifikasi, tampilkan menggunakan JavaScript
if (!empty($notification)) {
    // Tentukan apakah notifikasi adalah error atau tidak
    $isError = ($notification === "Cerita tidak boleh kosong." || strpos($notification, "Error:") !== false);
    echo "<script>showNotification('$notification', " . ($isError ? 'true' : 'false') . ");</script>";
}
?>

</body>
</html>
