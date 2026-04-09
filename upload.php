<?php

$dir = "uploads/";

if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

$ext = pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION);
$filename = uniqid("video_", true) . "." . $ext;

$path = $dir . $filename;

if (move_uploaded_file($_FILES["video"]["tmp_name"], $path)) {

    $baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

    echo "<h2>Видео загружено</h2>";

    echo "<p>▶ Страница просмотра:</p>";
    echo "<a href='watch.php?file=$filename'>$baseUrl/watch.php?file=$filename</a><br><br>";

    echo "<p>📎 Прямая ссылка на видео:</p>";
    echo "<a href='$path'>$baseUrl/$path</a>";

} else {
    echo "Ошибка загрузки";
}
?>
