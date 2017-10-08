<?php
// MySQL接続情報
$dsn = 'mysql:dbname=cebty;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8'); 
 ?>