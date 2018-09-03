
<?php

   session_start();

   include('session.php');
   //echo $_SESSION['login_user1'];
    $user=(Session::getInstance())->getSession();

   if($user!="product_admin")
   {
    header('Location: http://localhost/hypermarket.com/login.php');
   }
   else
   {

   class insertClass
   {
      

//FORM HANDLING IN OOP
     
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
  // echo '<p>Connected successfully</p>';
      
      //echo 'constructor called';
    }



    //PRODUCTS DATA INSERTION


    public function insertProductsData($fileName,$fileTmpName)
    {
       

      $fileExtension =pathinfo($fileName,PATHINFO_EXTENSION);

      

       $allowedType=array('csv');
       if(!in_array($fileExtension, $allowedType))
       {
        echo 'Invalid file extension'; //change to html success message
       }
       else
       {
        
        //upload the file
        $handle = fopen($fileTmpName,'r'); 
        while (($myData = fgetcsv($handle,1000,',')) !=FALSE) 
        {
         $stmt = $this->conn->prepare("INSERT INTO products (name,price,quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("sii",$name,$price,$quantity);

        $name = $myData[0];
        $price = $myData[1];
        $quantity = $myData[2];

        $stmt->execute();

        //$result = $stmt->get_result();
       // $row = $result->fetch_assoc();
        //echo $row;
        }
      if($stmt->affected_rows===0)
        {
            die("error in uploading file".mysql_connect_error());

        }
        else
        {
            echo 'products uploaded successfully'; //change to html success message
        }

         $stmt->close();
         $this->conn->close();

       }
       

    }


    //USERS CONTACT NUMBERS INSERTION


    public function insertUsersData( $fileName,$fileTmpName )
    {
      $fileExtension =pathinfo($fileName,PATHINFO_EXTENSION);

       $allowedType=array('csv');
       if(!in_array($fileExtension, $allowedType))
       {
        echo 'Invalid file extension'; //change to html success message
       }
       else
       {
        //upload the file
        $handle = fopen($fileTmpName,'r'); 
        while (($myData = fgetcsv($handle,1000,',')) !=FALSE) 
        {
         $stmt = $this->conn->prepare("INSERT INTO users (number) VALUES (?)");
         $stmt->bind_param("s",$number);

         $number = $myData[0];
        
         $stmt->execute();

         //$result = $stmt->get_result();
         // $row = $result->fetch_assoc();
         //echo $row;
        }
      if($stmt->affected_rows===0)
        {
            die("error in uploading file".mysql_connect_error());

        }
        else
        {
            echo 'contacts uploaded successfully'; //change to html success message
        }

         $stmt->close();
         $this->conn->close();
      
    }

  }

  public function logoutFun()
  {
        
         session_destroy();
         //echo $_SESSION['login_user1'];
         header('Location: http://localhost/hypermarket.com/login.php');
  }
}

  $newObj = new insertClass();

  if(isset($_POST['submit']))
  {
   
    $newObj->insertProductsData($_FILES['data']['name'],$_FILES['data']['tmp_name']);
  }
  if(isset($_POST['submit1']))
  {
    $newObj->insertUsersData($_FILES['data1']['name'],$_FILES['data1']['tmp_name']);
  }  
  if(isset($_POST['logout']))
    {

       $newObj->logoutFun();
         
    }
}

?>

<html>
<head>
    <title>Products and User</title>
</head>
    <body>

        <br>
        <br>
        <div style="text-align: center;">
           <h1 >Insert products data to Database</h1>
           <form action="products1.php" method="post" enctype="multipart/form-data">
           <input type="file" name="data">
           <br>
           <br>
           <button type="submit" name="submit">Submit</button>
           </form>        
        </div>

         <br>
        <br>
        <div style="text-align: center;">
           <h1 >Insert users contact to Database</h1>
           <form action="products1.php" method="post" enctype="multipart/form-data">
           <input type="file" name="data1">
           <br>
           <br>
           <button type="submit" name="submit1">Submit</button>
           </form>        
        </div>

      <div style="float: right;">
          <form action="products.php" method="post">
              <button type="submit" name="logout">Logout</button>
          </form>
      </div> 
    
       
    <script type="text/javascript">
      
    </script>
</body>
</html>
