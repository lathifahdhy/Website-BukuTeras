<?php
include('includes/database.php'); // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $story_content = $conn->real_escape_string($_POST['story_content']); // Escape input untuk menghindari SQL injection

    // Validasi input kosong
    if (empty($story_content)) {
        echo "Cerita tidak boleh kosong.";
        exit;
    }

    // Query untuk menyimpan cerita
    $query = "INSERT INTO stories (book_id, story_content, created_at) VALUES ($book_id, '$story_content', NOW())";

    if ($conn->query($query) === TRUE) {
        echo "Cerita berhasil disimpan!";
        
        // Tambahkan tombol kembali ke menu tema
        echo "<br><br><a href='themes.php'><button>Kembali ke Menu Tema</button></a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
