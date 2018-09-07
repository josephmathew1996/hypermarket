
<?php
session_start();
    if(!isset($_SESSION['login_user']))
    {
      header('Location: http://localhost/hypermarket.com/login.php');
    }
    else
    {

      include('config.php');
      echo 'welcome '.$_SESSION['login_user'];

   // PRODUCTS INSERTION

    if(isset($_POST['submit']))
    {
       $fileName = $_FILES['data']['name'];
       $fileTmpName = $_FILES['data']['tmp_name'];

       $fileExtension =pathinfo($fileName,PATHINFO_EXTENSION);

       $allowedType=array('csv');
       if(!in_array($fileExtension, $allowedType))
       {
        echo 'Invalid file extension';
       }
       else
       {

        //upload the file
        $handle = fopen($fileTmpName,'r'); 
        while (($myData = fgetcsv($handle,1000,',')) !=FALSE) 
        {
         
    

        $stmt = $conn->prepare("INSERT INTO products (name,price,quantity,category) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siis",$name,$price,$quantity);

        $name = $myData[0];
        $price = $myData[1];
        $quantity = $myData[2];
        $category = $myData[3];

        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        echo $row;
        }
        if($stmt->affected_rows===0)
        {
            die("error in uploading file".mysql_connect_error());

        }
        else
        {
            echo 'products uploaded successfully';
        }

         $stmt->close();

      }


    }



    //USERS CONTACT NOUMBERS INSERTION



    if(isset($_POST['submit1']))
    {
       $fileName = $_FILES['data1']['name'];
       $fileTmpName = $_FILES['data1']['tmp_name'];

       $fileExtension =pathinfo($fileName,PATHINFO_EXTENSION);
    
       $allowedType=array('csv');
       if(!in_array($fileExtension, $allowedType))
       {
        echo 'Invalid file extension';
       }
       else
       {

        //upload the file
        $handle = fopen($fileTmpName,'r'); 
        while (($myData = fgetcsv($handle,1000,',')) !=FALSE) 
        {
         $number = $myData[0];

         $query= "insert into users (number)
         values('".$number."')";

         $run = mysqli_query($conn,$query);
          
        }
        if(!$run)
        {
            die("error in uploading file".mysqli_connect_error());
        }
        else
        {
            echo 'contacts uploaded successfully';
        }

       }


    }
    if(isset($_POST['logout']))
    {
         session_destroy();
         header('Location: http://localhost/hypermarket.com/login.php');
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
           <form action="products.php" method="post" enctype="multipart/form-data">
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
           <form action="products.php" method="post" enctype="multipart/form-data">
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
    
</body>


    <script type="text/javascript">
      
    </script>
</html>