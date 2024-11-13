<?php
include('includes/database.php'); // Koneksi ke database

// Periksa apakah parameter book_id dikirim melalui URL
if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];

    // Query untuk mendapatkan detail buku berdasarkan book_id
    $query = "SELECT * FROM books WHERE id = $book_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
        echo "<h3>Menulis Cerita untuk Buku: " . $book['book_title'] . "</h3>";
        echo "<img src='images/" . $book['book_image'] . "' alt='" . $book['book_title'] . "' style='width:200px; height:300px;'><br>";
    } else {
        echo "Buku tidak ditemukan.";
    }
} else {
    echo "ID buku tidak disediakan.";
    exit;
}
?>

<form action="save_story.php" method="POST">
    <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
    <textarea name="story_content" rows="10" cols="50" placeholder="Tulis cerita Anda di sini..."></textarea><br>
    <button type="submit">Simpan Cerita</button>
</form>
