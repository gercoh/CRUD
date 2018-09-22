<?php
include("db.php");

$id2 =$_REQUEST['id'];

// sending query
mysqli_query($conn,"DELETE FROM comments WHERE idc = '$id2'")
or die(mysqli_error($conn));

header("Location: index.php");
?>