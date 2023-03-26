<?php
$dsn = 'mysql:host=localhost;dbname=zippyusedauto';
$username = 'root';
$password = '';

$error_message = null; 
try{
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e){
    $error_message = $e->getMessage();  
    include('../view/error.php');
    exit(); 
}
?>