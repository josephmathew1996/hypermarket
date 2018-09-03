
<?php
 

session_start();

include('session.php');

class login
{

    public function __construct()

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

   public function checkLogin($username,$password)
   {
      
      $stmt=$this->conn->prepare("SELECT * FROM admin WHERE admin_name=? and password=?");
      $stmt->bind_param("ss",$username,$password);
      $stmt->execute();
      $result = $stmt->get_result();
       
       //echo '<br>'.$result->num_rows;
        
        if($result->num_rows===0)
        {
           echo 'login failed';
           //header('Location: http://localhost/hypermarket.com/login.php');

        }
        else
        {
           
           $row = $result->fetch_assoc();
           //var_dump($row);
           
           
	         if($row['role']=="product_admin") 
           {

            //echo 'login success';
            (Session::getInstance())->setSession($row);
           
            //echo $_SESSION['login_user'];
            header('Location: http://localhost/hypermarket.com/products1.php');
           }
           
           if($row['role']=="market_admin") //Here tooo
           {
            

            //echo 'login success';
            (Session::getInstance())->setSession($row);
            //echo $_SESSION['login_user2'];
            header('Location: http://localhost/hypermarket.com/admin.php');
           }
       
        }

         $stmt->close();
         $this->conn->close();

   

   }

}

$loginObj = new login();


if(isset($_POST['submit']))
{
  if(isset($_POST['username']) && isset($_POST['password']))
  {

    $loginObj->checkLogin($_POST['username'],md5($_POST['password']));


  }
}
    

?>

<html>
<head>
    <title>Login</title>
</head>
    <body>
        <br>
        <br>
        <div style="text-align: center;">
           <h1 >Login</h1>
           <form action="login.php" method="post">
           <input type="text" name="username" placeholder="Username">
           <br>
           <br>
           <input type="password" name="password" placeholder="Password">
           <br>
           <br>
           <button type="submit" name="submit">Login</button>
           </form>        
        </div>
       

</body>


    <script type="text/javascript">
      
    </script>
</html>
