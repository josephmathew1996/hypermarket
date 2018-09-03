<?php
session_start();

class Session
{
   // Hold an instance of the class
   private static $instance;
   
   private function __construct()

    {

      // In the variables section below, replace user and password with your own MySQL credentials as created on your server
    $servername = "localhost";
    $username = "joseph";
    $password = "password";
    $database =  "market";

    // Create MySQL connection
    $this->conn = new mysqli($servername, $username, $password,$database);

    // Check connection - if it fails, output will include the error message
    if ($this->conn->connect_error) {
        die('<p>Connection failed: <p>' . $this->conn->connect_error);
    }
   //echo '<p>Connected successfully</p>';
      
    //  echo 'constructor called';
    }



   // The singleton method
   public static function getInstance()
   {
       if (!isset(self::$instance)) {
           //echo 'Oops! no instance available. Creating new instance<br>';
           self::$instance = new Session();
          // echo 'Instance created<br>';
       }
       return self::$instance;
   }
   
   public function setSession($params){
       $_SESSION['login_user']=$params;
   }
   
   public function getSession(){
      return $_SESSION['login_user']['role'];
   }
   
}



?>
