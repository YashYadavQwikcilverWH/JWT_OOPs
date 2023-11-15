<?php
namespace JWT_Exercise\Decode;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class Decoding
{
function printToken($jwt,$secret_Key){
    $token = JWT::decode($jwt, new Key($secret_Key,'HS512'));
    print_r($token);
}

}
?>