<?php
global $mypdo;
$mypdo = new PDO('mysql:host=localhost;port=3306;dbname=Customer_info', 'root', 'root');
$mypdo->query("SET NAMES utf8");
$mypdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
require_once("mydata.php");