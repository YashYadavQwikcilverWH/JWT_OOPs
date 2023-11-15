<?php
namespace JWT_Exercise\Database_Connect;

class DB_Connect
{ protected $servername = "localhost";
  protected $username = "root";
  protected $password = "";
  protected $dbname = "jwt";
  public $conn;
function connect_db() {
// Create connection

 $this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);
// Check connection

if ($this->conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo("Success");
return ($this->conn);
}
}
?>