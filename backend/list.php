<?php
header("Access-Control-Allow-Origin:*");
$dns = "mysql:dbname=todo;host=localhost";
$username = "root";
$password = "19711217";


try{
    $connection = new PDO($dns,$username,$password);
}catch(Exception $exception){
    print_r($exception);
}

$sqlQuery = "SELECT * FROM tasks";

$result = $connection->query($sqlQuery, PDO::FETCH_OBJ);

if(!$result){
    echo"Nose puede listar el contenido";
    die();
}

$tasks = [];
foreach($result as $item){
    $tasks[] = $item;
}

echo json_encode($tasks);