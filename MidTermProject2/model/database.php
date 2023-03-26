<?php
$dsn = 'mysql:host=yjo6uubt3u5c16az.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=umk4wrug26yxpr7g';
$username = 'wy254450c55lm1nb';
$password = 'd2tf9vep0fuuxmlv';

$error_message = null; 
try{
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e){
    $error_message = $e->getMessage();  
    include('../view/error.php');
    exit(); 
}
?>
