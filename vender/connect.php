<?php
	$dsn = "mysql:host=localhost;dbname=test_message";
	$username = "root";
	$password = "";

	try {
	    $conn = new PDO($dsn, $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	    echo "Ошибка подключения: " . $e->getMessage();
	}
?>