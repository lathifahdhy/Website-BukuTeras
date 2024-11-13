<?php
// Fungsi untuk membuat URL dasar
function base_url($path = '') {
    $base_url = "http://localhost/buka-teras"; // Ganti sesuai dengan URL root proyek Anda
    return $base_url . $path;
}

// Fungsi untuk membersihkan input
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Fungsi untuk menampilkan semua cerita yang disimpan
function get_stories($conn) {
    $result = $conn->query("SELECT * FROM stories ORDER BY created_at DESC");
    $stories = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $stories[] = $row;
        }
    }
    return $stories;
}
?>
