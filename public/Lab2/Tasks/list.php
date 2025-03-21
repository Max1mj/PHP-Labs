<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $dir = "./../uploads/";

        if (is_dir($dir)) {
            $file_list = scandir($dir);

            foreach ($file_list as $file) {
                if ($file != "." && $file != "..") {
                    echo "<a href='$dir/$file' download>$file</a> <br>";
                }
                
            }
        }
    }
?>