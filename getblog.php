<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require __DIR__ . '../../vendor/autoload.php';
use JWT_Exercise\Header\getHeader;
use JWT_Exercise\Skey\secretKey;
use JWT_Exercise\Decode\Decoding;

// $headers = getallheaders();
// $jwt = $headers["Authorization"];
$head=new getHeader();
$jwt=$head->returnHead();


// $secret_Key  = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';
$Skey=new secretKey();
$secret_Key=$Skey->returnkey();



// $token = JWT::decode($jwt, new Key($secret_Key,'HS512'));
// echo "<br><br>";
// print_r($token);

$decode=new Decoding();
$decode->printToken($jwt,$secret_Key);

?>
