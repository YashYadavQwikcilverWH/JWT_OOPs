<?php
namespace JWT_Exercise\SQL_Query;
use JWT_Exercise\Database_Connect\DB_Connect;
class SQL_command
{
function command($conn,$uid,$user){
    $sql = "SELECT uid,username,domainName FROM user_details where uid='$uid' && username='$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
    return $row;
}
else 
      {
        echo "0 results";
      }
}
}
?>