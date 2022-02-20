<?php
$dsn="mysql:host=localhost;dbname=tttt";
$username="root";
$password="root";
$results_per_page = 4; // number of results per page
try{
    $db=new PDO($dsn, $username, $password);
}catch(Exception $e){
    $error = $e->getMessage();
    echo $error;
    exit();    
}
?>
