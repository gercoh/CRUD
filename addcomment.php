<?php
if(isset($_POST['submit'])){
    include 'db.php';
    if(isset($_POST['title'])){
        $title = $_POST['title'];
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        mysqli_query($conn,"INSERT INTO `comments`(title) VALUES ('$title')");
    }
}

header("Location: index.php");
?>