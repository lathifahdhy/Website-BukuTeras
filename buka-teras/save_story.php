<?php
include('includes/database.php'); // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $story_content = $conn->real_escape_string($_POST['story_content']); // Escape input untuk menghindari SQL injection

    // Validasi input kosong
    if (empty($story_content)) {
        echo "<script>alert('Cerita tidak boleh kosong.');</script>";
        exit;
    }

    // Query untuk menyimpan cerita
    $query = "INSERT INTO stories (book_id, story_content, created_at) VALUES ($book_id, '$story_content', NOW())";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Cerita berhasil disimpan!');</script>";
        
        // Tambahkan tombol kembali ke menu tema dengan tautan ke theme.php
        echo "<br><br><a href='theme.php'><button>Kembali ke Menu Tema</button></a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
