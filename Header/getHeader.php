<?php
namespace JWT_Exercise\Header;

class getHeader
{
function returnHead(){
$headers = getallheaders();
$jwt = $headers["Authorization"];
return $jwt;
}

}

?> 