<?php
$file = $_GET["file"] ?? "";
$path = "uploads/" . $file;

if (!file_exists($path)) {
    die("Видео не найдено");
}

$baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
$videoUrl = $baseUrl . "/" . $path;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Просмотр видео</title>

<style>
body {
    background: #111;
    color: white;
    text-align: center;
    font-family: Arial;
}

video {
    margin-top: 20px;
    width: 800px;
    max-width: 95%;
    border-radius: 10px;
}
a {
    color: #0af;
}
</style>
</head>
<body>

<h2>Просмотр видео</h2>

<video controls>
    <source src="<?php echo $videoUrl; ?>" type="video/mp4">
</video>

<p>📎 Прямая ссылка:</p>
<a href="<?php echo $videoUrl; ?>"><?php echo $videoUrl; ?></a>

<br><br>

<button onclick="copy()">📋 Копировать ссылку</button>

<script>
function copy() {
    navigator.clipboard.writeText("<?php echo $videoUrl; ?>");
    alert("Скопировано");
}
</script>

</body>
</html>
