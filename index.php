<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Страничка</title>
    <style type="text/css">
        #post {
            position: center;
            width: 40%; /* Ширина */
            height: 10%;
            background: #BFBFBF; /* Цвет фона */
            border-color: #FFFFFF; /* Поля */
            -moz-box-sizing: border-box; /* Для Firefox */
            -webkit-box-sizing: border-box; /* Для Safari и Chrome */
            box-sizing: border-box; /* Для IE и Opera */
        }
        /*#comments {*/
            /*align-content:  center;*/
            /*width: 30%; !* Ширина *!*/
            /*height: 25px;*/
            /*background: #4986E7; !* Цвет фона *!*/
            /*border-color: #FFFFFF; !* Поля *!*/
            /*-moz-box-sizing: border-box; !* Для Firefox *!*/
            /*-webkit-box-sizing: border-box; !* Для Safari и Chrome *!*/
            /*box-sizing: border-box; !* Для IE и Opera *!*/
        /*}*/
    </style>
</head>
<body>
<?


include("db.php");
?>
<?php
$idsql = mysqli_query($conn,"SELECT max(id) from img;") or die(mysqli_error($conn));

$idm = mysqli_fetch_array($idsql);

            foreach ($idm as $key=>$value)
            {
                $id = $value;

            }
// echo $id;

// print_r ($id);

$sql = mysqli_query($conn,"SELECT * FROM `img`	WHERE `id` = ".$id.";") or die(mysqli_error($conn));
	$row = mysqli_fetch_array($sql);
   
    ?>
<img src="<?php echo $row['img_file']; ?>">

<form name="user_frm" method="POST" action="/addavva.php" enctype="multipart/form-data">
	<table>
			<input type="file" value="" name="img_file">
            <?php echo '<br>';?>
    </table>

	 <input type="submit" value="create" name="addavva">

</form>
<form method="post" action="add.php">
      Добавить Запись:
		<input type="text" name="title" size='30' />

		<input type="submit" name="submit" value="Создать" />

    <?php echo '<br>';?>

</form>
<?php echo '<br>';?>

	<?php

	

	$result = mysqli_query($conn,"SELECT * FROM `m_category`");

	    if (!$result)

		    die("Error: Data not found.");

	while($test = mysqli_fetch_array($result)) {

		$id = $test['id'];

             echo '<div  id="post" >';

             echo $test['title'];

            echo '<br>';

		echo "<a href ='edit.php?id=$id'> Редактировать </a>";

		echo "<a href ='delete.php?id=$id'> Удалить</a>";

		echo '<div id="comments" align="center">';

		echo '<form method="post" action="addcomment.php">';

     $result2 = mysqli_query($conn,"SELECT * FROM `comments`");

        if (!$result2)
            die("Error2: Data not found.");
        echo '<input type="text" name="title" size=\'30\' />'." ".'<input type="submit" name="submit" value="отправить" />';
        echo '<br>';
              while($test2 = mysqli_fetch_array($result2)){
                  $id2 = $test2['idc'];

                     echo $test2['title'];
                  echo "<a href ='editcomment.php?id=$id2'> Редактировать </a>";
                  echo "<a href ='deletecomment.php?id=$id2'> Удалить</a>";
                  echo '<br>';

              }
        echo '<br>';


                  echo '<br>';


                         echo '</form>';


                 echo   '</div>';


 echo '</div>';





	}
	mysqli_close($conn);
	?>



</body>
</html>