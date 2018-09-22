<?php
require("db.php");
$id =$_REQUEST['id'];

$result = mysqli_query($conn,"SELECT * FROM `m_category` WHERE id  = $id");
$test = mysqli_fetch_array($result);
if (!$result)
	die("Error: Data not found.");

$title=$test['title'] ;

if(isset($_POST['save'])) {	
	$title_save = $_POST['title'];

	mysqli_query($conn,"UPDATE `m_category` SET title ='$title_save' WHERE id = $id")
				or die(mysqli_error($conn));
//	echo "Saved!";
	
	header("Location: index.php");			
}
mysqli_close($conn);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Редактирование</title>
</head>
<body>
<form method="post">
<table>
	<tr>
		<td>Название:</td>
		<td><input type="text" name="title" value="<?php echo $title ?>" size='30' /></td>
		<td><input type="submit" name="save" value="Сохранить" /></td>
	</tr>
</table>
</body>
</html>