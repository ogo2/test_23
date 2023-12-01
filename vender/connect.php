<?php
$conn = new mysqli("localhost", "root", "", "test_23");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
?>