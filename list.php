<?php
$files = array_diff(scandir("uploads"), [".", ".."]);
echo json_encode(array_values($files));
