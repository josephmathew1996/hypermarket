<?php 
    
    class homeClass
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
      public function displayProducts()

      {

       $sql="SELECT * FROM products";
       $result = $this->conn->query($sql);

       if($result->num_rows>0)
       {
         
          $row =mysqli_fetch_all($result,MYSQLI_ASSOC);
          return $row;
          
          //print_r($row);
           
           //echo $row['name'].'<br>'.$row['price'].'<br>'.$row['quantity'].'<br>';
      }
      else
       {

        echo 'No data';
       }
        
  }

 }

 $homeObj =new homeClass();
 $res=$homeObj->displayProducts();
?>

<html>
<head>
    <title>Home</title>
</head>
    <body>
        <br>
        <br>
        <h1 style="text-align: center;">All products</h1>
        <?php
          foreach ($res as $value) {
        ?>
        <div>     
            <img style="width: 200px;height: 200px;" src="<?php echo $value['image_path'] ?>">
            <h1><?php echo $value['name']?></h1>
            <h2><?php echo $value['price']?></h2>
            <h3><?php echo $value['quantity']?></h3>
        </div>
       <?php
         }
         ?>
</body>
</html>
