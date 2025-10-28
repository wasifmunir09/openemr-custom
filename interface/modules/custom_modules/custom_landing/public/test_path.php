<?php
echo "Current directory: " . __DIR__ . "<br>";
echo "Four levels up: " . realpath(__DIR__ . "/../../../../globals.php") . "<br>";
echo "File exists: " . (file_exists(__DIR__ . "/../../../../globals.php") ? "YES" : "NO") . "<br>";
?>
