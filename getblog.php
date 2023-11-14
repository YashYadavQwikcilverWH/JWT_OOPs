<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once('../vendor/autoload.php');

$headers = getallheaders();
$jwt = $headers["Authorization"];


$secret_Key  = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';

//how to get header
// $jwt = 'header toke'

$token = JWT::decode($jwt, new Key($secret_Key,'HS512'));
echo "<br><br>";
print_r($token);
?>
