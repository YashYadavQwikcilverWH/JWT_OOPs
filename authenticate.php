<?php
require __DIR__ . '../../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use JWT_Exercise\Postman\postget;
use JWT_Exercise\Database_Connect\DB_Connect;
use JWT_Exercise\SQL_Query\SQL_command;
use JWT_Exercise\Encode\encoding;
use JWT_Exercise\Skey\secretKey;
use JWT_Exercise\Printing\PrintT;

//get data from postman Post Request with uid and username 
$getD = new postget(); 
$getD->getData();
$user =$getD->user;
$uid=$getD->uid;
// echo($uid." ".$user);//Testing

//Connect to database
$DBcon=new DB_Connect();
$conn=$DBcon->connect_db();

//validrateate user against database
$sqlCommand=new SQL_command();
$sqlresult=$sqlCommand->command($conn,$uid,$user);
// var_dump($sqlresult);

//Get Secret Key
$Skey=new secretKey();
$secret_Key=$Skey->returnkey();


// Encoding 
$date = new DateTimeImmutable();
$encode=new encoding();  
$jwt=$encode->encode($sqlresult,$date,$secret_Key);

// var_dump($jwt);

//Printing Token
$printing=new PrintT();
$printing->printToken($jwt);

?>

