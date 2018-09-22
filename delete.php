<?php
include("db.php");  

$id =$_REQUEST['id'];
		
// sending query
mysqli_query($conn,"DELETE FROM m_category WHERE id = '$id'")
	or die(mysqli_error());
	
header("Location: index.php");
?>