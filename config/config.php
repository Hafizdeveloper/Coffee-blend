<?php
    define('server', "mysql:host=localhost;dbname=coffee-blend");
    define('user', "root");
    define('password', "");

    try{
        $connection = new PDO(server,user,password);
    }catch(PDOException $error){
        echo $error->getMessage();
    }
?>