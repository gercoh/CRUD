<?php

   /**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22.09.2018
 * Time: 11:42
 */
include("db.php"); // подключаемся с бд
   
$errorSubmit = false; 
if ($_POST["addavva"]) {
 
    if (isset($_FILES['img_file']) && $_FILES['img_file'] != "") { 
        $whitelist = array(".gif", ".jpeg", ".png", ".jpg", ".bmp"); 
    
        $error = true; 
        foreach ($whitelist as $item) {
            if (preg_match("/$item\$/i", $_FILES['img_file']['name'])) $error = false;
        }
     
        if ($error) {
           
            $errorSubmit = 'Не верный формат картинки!';
        } else {
          
            move_uploaded_file($_FILES["img_file"]["tmp_name"], "files/" . $_FILES["img_file"]["name"]);
            $path_file = "files/" . $_FILES["img_file"]["name"];
            $sql = mysqli_query($conn, "
					INSERT INTO `img` 
						(`id`, 
						`img_file`) 
						VALUES 
						(null, 
                        '" . $path_file . "');") or die(mysqli_error());
                        // print_r ($sql);
                if ($sql)
                    // echo "User created!"; 
                    header("Location: index.php");
        }
        if (!$errorSubmit) {
    }
}
}