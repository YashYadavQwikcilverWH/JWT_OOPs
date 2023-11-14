<?php
// session_start();

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once('../vendor/autoload.php');


//get data from postman
//  $user= $_REQUEST['username'];
//  $uid = $_REQUEST['uid'];

 $user= $_POST['username'];
 $uid = $_POST['uid'];


//validrateate user against database

//Connect DB


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jwt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT uid,username,domainName FROM user_details where uid='$uid' && username='$user'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();

//if success gene token and return json
$secret_Key  = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';

$date   = new DateTimeImmutable();
$expire_at = $date->modify('+60 minutes')->getTimestamp();      // Add 60 seconds
$domainName = $row["domainName"];
$user = $row["username"];
$uid = $row["uid"];


// Retrieved from filtered POST data
$request_data = [
    'iat'  => $date->getTimestamp(),         // Issued at: time when the token was generated
    'iss'  => $domainName,                       // Issuer
    'nbf'  => $date->getTimestamp(),         // Not before
    'exp'  => $expire_at,                           // Expire
    'userName' => $user,                     // User name
    'uid' => $uid
];

$jwt =  JWT::encode(
    $request_data,
    $secret_Key,
    'HS512'
);

$response = [
   'success' => 'true',
   'token' => $jwt
];

header('Content-type: application/json');
echo json_encode($response);



  } else {
    echo "0 results";
  }

  // $_SESSION["jwt"] = $jwt;

// // //die;
// // $token = JWT::decode($jwt, new Key($secret_Key,'HS512'));
// // echo "<br><br>";
// // print_r($token);
// // die;
// echo $jwt;


?>
<!-- 
//user
//blog - user id


login endpoint
get blog - pass token i header and then based on id return blog -->
