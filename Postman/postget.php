<?php
namespace JWT_Exercise\Postman;
class postget
{
   public $user;
   public $uid;
   function getData(){
   global $user,$uid;
   $this->user= $_POST['username'];
   $this->uid = $_POST['uid']; 
}
}
?>