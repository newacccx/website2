<?php
// Set your desired upload directory
$uploadDir = 'uploads/';

// Create the upload directory if it doesn't exist
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if there are no errors during file upload
    if ($_FILES['pdfFile']['error'] == UPLOAD_ERR_OK) {
        $uploadFile = $uploadDir . basename($_FILES['pdfFile']['name']);

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $uploadFile)) {
            // Get the absolute URL of the uploaded file
            $fileUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $uploadFile;

            // Return the file URL as the response
            echo $fileUrl;
        } else {
            echo 'Error uploading file.';
        }
    } else {
        echo 'File upload error.';
    }
}
?>
