<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error']
=== UPLOAD_ERR_OK) {
     $file = $_FILES['profile_picture'];

     $uploadDir = 'images/';

     $fileName = uniqid('profile_') . '_' . basename($file['name']);
     $uploadPath = $uploadDir . $fileName;

     if (move_uploaded_file($file['tmp_name'], $uploadPath)) {

        $dbHost = 'localhost';
        $dbName = 'Tuts2';
        $dbUser = 'root';
        $dbPass = '';

        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

        $stmt = $conn->prepare("INSERT INTO profile_images (image_path) VALUES (?)");

        $stmt->execute([$uploadPath]);

        $conn = null;

        echo "You have successfully inserted your profile picture";

     } else {

        echo "Your image error to upload";
        {
            echo "No file selected";
        }

     }
}

}


?>