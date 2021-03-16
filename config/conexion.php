<?php

    $host="localhost";
    $port = '3307';
    $database="futbol";
    $user='root';
    $password='';

    try{
        $con = new PDO('mysql:dbname='.$database.';host='.$host.';port='.$port, $user, $password);
    }catch (PDOException $e){
       echo "Error ".$e->getMessage();
    }
?>
