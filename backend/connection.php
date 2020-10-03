<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'NASA');

    if (!$conn) {
        echo 'problem with connecting to database';
    }
?>