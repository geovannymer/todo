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

$content = file_get_contents("php://input");
$task = json_decode($content);

$id = $task->id;
$name = $task->name;
$description = $task->description;
$date = $task->date;

$slqQuery = "UPDATE tasks SET
    name = '$name', description = '$description', date = '$date'
    where id = $id";

$result = $connection->query($slqQuery);

if($result){
    echo "El registro se guardo correctamente";
}else{
    echo "Error, no se pudo actuaizar";
}

