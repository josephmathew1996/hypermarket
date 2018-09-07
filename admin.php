<?php

session_start();
include 'session.php';

$user = (Session::getInstance())->getSession();

if ($user != "market_admin") {
	header('Location: http://localhost/hypermarket.com/login.php');
} else {

	class products {

		public function __construct() {

			$servername = "localhost";
			$username = "joseph";
			$password = "password";
			$database = "market";

			// Create MySQL connection
			$this->conn = new mysqli($servername, $username, $password, $database);

			// Check connection - if it fails, output will include the error message
			if ($this->conn->connect_error) {
				die('<p>Connection failed: <p>' . $this->conn->connect_error);
			}
			//echo '<p>Connected successfully</p>';

			//echo 'constructor called';
		}

		public function getProducts() {
			//global $len,$res;
			$sql = "SELECT name FROM products";
			$result = $this->conn->query($sql);

			//var_dump($result->num_rows);

			if ($result->num_rows > 0) {

				$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
				return $data;
				/*print_r($data);
					           $i=0;
					          foreach($data as $x => $x_value)
					          {
					              $d=$x_value;

					           foreach($d as $x1 => $x_value1)
					           {

					             //echo $x_value1;
					             $res[$i]=$x_value1;
					             $i++;

					           }

					              //print_r($d) ;
					         }

					        $len= sizeof($res);
				*/
			} else {

				echo 'No data';
			}

		}
		public function addimagedata($fileName, $productName) {
			// echo $fileName.'<br>'.$productName;

			$stmt = $this->conn->prepare("SELECT * FROM products WHERE name=?");
			$stmt->bind_param('s', $productName);
			$stmt->execute();
			$result = $stmt->get_result();

			//echo '<br>'.$result->num_rows;

			//echo $result;

			if ($result->num_rows === 0) {
				echo 'no product found';
				//header('Location: http://localhost/hypermarket.com/login.php');

			} else {
				echo 'product found<br>';
				$row = $result->fetch_assoc();
				$id = $row['id'];
				//echo $id;
				$imagePath = "product_images/" . $fileName;
				//echo $imagePath;
				//echo $row['name'];
				//var_dump($row);
				$stmt = $this->conn->prepare("UPDATE products SET image_path=? WHERE id=?");
				$stmt->bind_param("si", $imagePath, $id);
				$stmt->execute();
				// echo $stmt->affected_rows.'<br>'.$imagePath;

				if ($stmt->affected_rows === 0) {
					die("error in uploading imagedata" . $this->conn->connect_error);

				} else {
					echo 'image data added successfully'; //change to html success message
				}

			}

			$stmt->close();
			$this->conn->close();

		}

		public function logoutFun() {

			session_destroy();
			//echo $_SESSION['login_user1'];
			header('Location: http://localhost/hypermarket.com/login.php');
		}

	}

	$productObj = new products();

	$res = $productObj->getProducts();
	//var_dump($res);

	if (isset($_POST['logout'])) {

		$productObj->logoutFun();

	}
	if (isset($_POST['submit'])) {
		if (isset($_FILES['image']['name']) && isset($_POST['product'])) {
			$productObj->addimagedata($_FILES['image']['name'], $_POST['product']);
		}

	}

}

?>

<html>
<head>
    <title>Admin</title>
</head>
    <body>

        <br>
        <br>
        <div style="text-align: center;">
           <h1 >Add product image to database</h1>
           <form action="admin.php" method="post" enctype="multipart/form-data">
           <input type="file" name="image">
           <br>
           <br>
           <select name="product">
            <option value="" selected>Select a product</option>
            <?php
foreach ($res as $value) {
	?>
            <option value="<?php echo $value['name']; ?>"> <?php echo $value['name']; ?> </option>
            <?php

}
?>
          </select>
          <br><br>
           <button type="submit" name="submit">Submit</button>
           </form>
        </div>

         <br>
        <br>


      <div style="float: right;">
          <form action="admin.php" method="post">
              <button type="submit" name="logout">Logout</button>
          </form>
      </div>


    <script type="text/javascript">

    </script>
</body>
</html>
