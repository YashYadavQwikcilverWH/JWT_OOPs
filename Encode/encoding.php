<?php
namespace JWT_Exercise\Encode;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class encoding 
{
function encode($row,$date,$secret_Key)
{
    
    
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

    return $jwt;
    
      } 
}
?>