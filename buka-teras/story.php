<?php session_start();
$theme = $_GET['theme'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cerita Anda</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Tuliskan Ceritamu</h2>
    <img src="images/<?php echo $theme; ?>.jpg" alt="Gambar Tema">
    <form action="save_story.php" method="post">
        <textarea name="story" rows="10" cols="50" placeholder="Tulis ceritamu di sini..."></textarea>
        <input type="hidden" name="theme" value="<?php echo $theme; ?>">
        <button type="submit">Simpan Cerita</button>
    </form>
</body>
</html>
