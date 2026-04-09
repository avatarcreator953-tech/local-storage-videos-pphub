<?php
$file = $_POST["file"];
unlink("uploads/" . basename($file));
echo "ok";
