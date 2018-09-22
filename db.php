<?php
$host = 'localhost'; // адрес сервера
$database = 'testdb'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

	$conn = mysqli_connect($host,$user,$password,$database);
	if (!$conn) {
	 die('Could not connect: ' . mysqli_error());
	}
	// mysqli_query($conn,'m_category' );
?>