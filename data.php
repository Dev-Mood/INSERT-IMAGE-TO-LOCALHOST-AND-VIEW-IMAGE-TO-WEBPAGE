<link rel="stylesheet" href="style.css">
<?php

$dbHost = 'localhost';
$dbName = 'Tuts2';
$dbUser = 'root';
$dbPass = '';

$conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

$stmt = $conn->query("SELECT image_path FROM profile_images");
$images = $stmt->fetchAll(PDO::FETCH_COLUMN);

$conn = null;

foreach ($images as $image) {
    echo '<img src="' . $image .'" alt="Profile Picture" id="image" /><br>';
}

?>