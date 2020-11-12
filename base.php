<?php

$dsn="mysql:host=localhost;dbname=invoice;charset=utf8";
$pdo=new PDO($dsn,'root','');

date_default_timezone_get("Asis/Taipei");
session_start();
?>