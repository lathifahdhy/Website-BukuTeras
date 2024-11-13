<?php
include('includes/database.php'); // Koneksi ke database

// Ambil tema yang dipilih dari request (misalnya lewat metode GET)
if (isset($_GET['theme_id'])) {
    $theme_id = $_GET['theme_id'];

    // Query untuk mendapatkan buku berdasarkan tema yang dipilih
    $query = "SELECT * FROM books WHERE theme_id = $theme_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h3>Pilih Buku:</h3>";
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<img src='images/" . $row['book_image'] . "' alt='" . $row['book_title'] . "' style='width:100px; height:150px;'><br>";
            echo "<button onclick=\"selectBook(" . $row['id'] . ")\">" . $row['book_title'] . "</button>";
            echo "</div>";
        }
    } else {
        echo "Tidak ada buku yang ditemukan untuk tema ini.";
    }
}
?>

<script>
function selectBook(bookId) {
    // Arahkan ke halaman menulis cerita setelah buku dipilih
    window.location.href = 'write_story.php?book_id=' + bookId;
}
</script>
