<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES['fileupload'])) {
            $file = $_FILES['fileupload'];
            $fileSize = $file['size'];
            $fileTmpName = $file['tmp_name'];
            $allowedTypes = ['image/png', 'image/jpeg'];
            $maxFileSize = 2 * 1024 * 1024;
            $fileName = basename($file['name']);

            if (is_uploaded_file($fileTmpName)) {
                $fileType = mime_content_type($fileTmpName);
                
                if ($fileSize > $maxFileSize) {
                    echo "File is more than 2MB";
                    exit;
                }
                
                if (!in_array($fileType, $allowedTypes)) {
                    echo "File is not jpg, png or jpeg";
                    exit;
                }

                $uploadDir = "./../uploads/";
        
                $filePath = $uploadDir . $fileName;
                $newFileName = $fileName;

                //Task 4

                if (file_exists($filePath)) {
                    $fileInfo = pathinfo($fileName);
                    $newFileName = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
                    $filePath = $uploadDir . $newFileName;
                    echo "File already exists. New Name: $newFileName <br>";
                }

            
                if (move_uploaded_file($fileTmpName, $filePath)) {
                    //Task 3
                    echo "<br>";
                    echo "File Name: $newFileName <br>";
                    echo "File Type: $fileType <br>";
                    echo "File Size: " . round($fileSize / 1024, 2) . "KB <br>";
                    echo "<a href=$filePath download> Download File</a> <br>";

                } else {
                    echo "File upload failed";
                }

            } 
        }
    }
?>
