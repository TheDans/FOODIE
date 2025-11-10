<?php
session_start();
include("studconnection.php");

if (!isset($_SESSION['userlogged']) || $_SESSION['userlogged'] != 1) {
    header("Location:/FOODIE/landing-page/index.html");
    exit();
}

$studID = $_SESSION['studID'];

// Check if a file is uploaded
if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] == 0) {
    $targetDir = "uploads/profile_pics/";
    $fileName = basename($_FILES['profilePic']['name']);
    $fileTmp = $_FILES['profilePic']['tmp_name'];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Allowed image types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileType, $allowedTypes)) {
        // Create upload folder if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Rename file (studentID_timestamp.extension)
        $newFileName = $studID . "_" . time() . "." . $fileType;
        $targetFile = $targetDir . $newFileName;

        // Move uploaded file
        if (move_uploaded_file($fileTmp, $targetFile)) {
            // Save file path in database
            $sql = "UPDATE students SET profile_pic='$targetFile' WHERE studID='$studID'";
            mysqli_query($conn, $sql);
            
            // Redirect back to settings page
            header("Location: settings.php?upload=success");
            exit();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type. Please upload JPG, JPEG, PNG, or GIF only.";
    }
} else {
    echo "No file uploaded or an error occurred.";
}
?>
