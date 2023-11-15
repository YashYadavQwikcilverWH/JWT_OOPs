<?php

namespace JWT_Exercise\Printing;
class PrintT
{
function printToken($jwt){
    $response = [
        'success' => 'true',
        'token' => $jwt
     ];
     
     header('Content-type: application/json');
     echo json_encode($response);
}

}
?>