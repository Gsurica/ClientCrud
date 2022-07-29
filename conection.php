<?php

$host = "localhost";
$db = "crud_clientes";
$user = "root";
$pass = "140703gui";

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
  die("Falha no banco de dados!");
}

