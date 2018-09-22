<?php
require("db.php");
$id2 =$_REQUEST['id'];

$result2 = mysqli_query($conn,"SELECT * FROM `comments` WHERE idc  = $id2");
$test2 = mysqli_fetch_array($result2);
if (!$result2)
    die("Error: Data not found.");

$title2=$test2['title'] ;

if(isset($_POST['saver'])) {
    $title_save2 = $_POST['title'];

    mysqli_query($conn,"UPDATE `comments` SET title ='$title_save2' WHERE idc = $id2")
    or die(mysqli_error());
//    echo "Saved!";

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
            <td><input type="text" name="title" value="<?php echo $title2 ?>" size='30' /></td>
            <td><input type="submit" name="saver" value="Сохранить" /></td>
        </tr>
    </table>
</body>
</html>