<?php
$error = "";
class homeClass {
	public function __construct() {
		// In the variables section below, replace user and password with your own MySQL credentials as created on your server
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
		//  echo 'constructor called';

	}
	public function displayProducts() {
		$sql = "SELECT * FROM products";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$res = [];
			foreach ($row as $value) {
				// while ($value['category']=='Household') {
				//   echo $value['name'].'<br>';
				//   break;
				// }
				//$res[$value['category']][] = $value;
			}
		} else {
			global $error;
			$error = 'No products found';
		}
		return $row;
	}
}
$homeObj = new homeClass();
$res = $homeObj->displayProducts();
?>

<!DOCTYPE html>
  <html>
    <head>
        <title>Home</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">


    <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playball" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

     <link rel="stylesheet" href="css/aos.css" />
     <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
     <script src="js/aos.js"></script>



      <!--Import materialize.css
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>-->

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <style type="text/css">


nav ul li a{
    font-weight: bold;
    background-color: white;
    color: green;
    font-size: 18px;
  }

  nav ul li.active a{
    background-color: #4caf50;
    color: white;

  }
  .tabs .tab a{
    background-color: white;
    color: green;

}
  .tab1 ul li.active a:focus.active{
    background-color: #4caf50;
    color: white;

  }



  .sidenav li a
  {
    font-weight: bold;
  }

     </style>
    </head>

    <body>

  <div class="navbar-fixed">
    <nav style="background-color:white;padding: 0px 10px 0px;">

        <div class="nav-wrapper">

            <a class="brand-logo" href="#" style="color:green;font-family: 'Merienda One', cursive;font-size:28px;"><b>Yara </b><span style="font-family: 'Comfortaa', cursive;
"><b>Hyper</b></span></a>

            <a class="sidenav-trigger" data-target="mobile-nav" href="#" style="color: black;"> <i class="material-icons">menu</i> </a>
        <ul  class="right hide-on-med-and-down">

            <li class="home-marker active"><a href="#home" style="">&nbsp;  Home</a></li>
            <li class="products-marker"><a href="#products" style="">&nbsp; Products</a></li>
            <li class="about-marker"><a href="#about" style="">&nbsp; About</a></li>
            <li class="service-marker"><a href="#service" style="">&nbsp; Services</a></li>
            <li class="contact-marker"><a href="#contact" style="">&nbsp; Contact</a></li>
       </ul>
    </div>
  </nav>
 </div>
<ul class="sidenav" id="mobile-nav">
    <li class="home-marker active"><a class="sidenav-close" href="#home" style="">Home</a></li>
    <li class="products-marker"><a class="sidenav-close" href="#products" style="">Products</a></li>
    <li class="about-marker"><a class="sidenav-close" href="#about" style="">About</a></li>
    <li class="service-marker"><a class="sidenav-close" href="#service" style="">Services</a></li>
    <li class="contact-marker"><a class="sidenav-close" href="#contact" style="">Contact</a></li>

</ul>

       <section class="home" id="home" style="">
           <div class="slider">
    <ul class="slides">
      <li>
        <img src="images/image9.jpg"> <!-- random image -->
        <div class="caption center-align">

          <h1 style="margin-top: 100px;" class="white-text" >Welcome to <span style="font-family: 'Playball', cursive;
">Yara Hyper</span></h1>
           <h2 style="" class="white-text">Largest hyper market in Malappuram</h2>
       </div>
      </li>

      <li>
        <img src="images/image7.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3></h3>
          <h2 class="white-text">Purity in every pack...</h2>
        </div>
      </li>
      <li>
        <img src="images/image10.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3></h3>
          <h2 class="white-text">Freshness in every bite...</h2>
        </div>
      </li>
      <li>
        <img src="images/image8.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3></h3>
          <h2 class=" orange-text ">Baked fresh for you...</h2>
        </div>
      </li>
      <li>
        <img src="images/image6.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3></h3>
          <h2 class=" red-text ">Flavours for every season...</h2>
        </div>
      </li>
    </ul>
  </div>



       </section>
       <br>
<div class="center-align move">
  <a class="pulse btn-floating  waves-light green" href="#products">
    <i class="material-icons">expand_more</i></a>
  </div>

       <section class="products" id="products">
        <br>
        <br>
         <div data-aos="zoom-in">
         <h2  style="text-align: center; font-family: 'Poppins', sans-serif;font-size: 42px;font-weight: 400;line-height: 32px;letter-spacing: 1px;"><span class="grey-text">Our</span><span class="green-text">&nbsp; Products</span></h2>
         <hr style="width: 5%;border-top:solid 2px #4caf50;border-bottom:solid 2px #4caf50;">
         </div>
<div class="container tab1">




        <ul  id="tabs-swipe-demo" class="tabs" style="text-align: center;">

    <li  class="tab col s3 active"><a href="index.php#test-swipe-1" class="active">Household</a></li>
    <li  class="tab col s3"><a  href="index.php#test-swipe-2" focus>Bakery</a></li>
    <li  class="tab col s3"><a  href="index.php#test-swipe-3" >Fancy</a></li>
    <li  class="tab col s3"><a  href="index.php#test-swipe-4" >Electronics</a></li>
    <li  class="tab col s3"><a  href="index.php#test-swipe-5" >Sports</a></li>

  </ul>
<br>
<br>

   <?php
if ($error == "") {
	?>
 <div id="test-swipe-1" class="test-swipe-1">
       <div class="row">

    <?php
foreach ($res as $value) {
		while ($value['category'] == 'Household') {
			?>
    <div class="col s12 m6 l4">
      <div class="card card z-depth-6 hoverable">
        <div class="card-image waves-light waves-effect waves-block">
          <img style="height:275px;" src="<?php echo $value['image_path'] ?>">
            </div>
        <div class="card-content" style="padding: 1px;">
          <h2 style="font-size: 30px;margin-left:10px;" class="black-text"><?php echo $value['name'] ?></h2>
          <h6 style="margin-left: 10px;font-weight: bold;"><span class="green-text"> &#8377; </span><?php echo $value['price'] ?></h6>
          <h6 style="margin-left: 10px;font-weight: bold;"><span class="green-text">Qty : </span><?php echo $value['quantity'] ?></h6>
         </div>
      </div>
    </div>
       <?php
break;
		}

	}
	?>
  </div>
</div>
<div id="test-swipe-2">
       <div class="row">

    <?php
foreach ($res as $value) {
		while ($value['category'] == 'Bakery') {
			?>
    <div class="col s12 m6 l4">
      <div class="card card z-depth-6 hoverable">
        <div class="card-image waves-light waves-effect waves-block">
          <img style="height:275px;" src="<?php echo $value['image_path'] ?>">
           </div>
        <div class="card-content">
          <h2 class="card-title black-text" style="font-size: 30px;"><?php echo $value['name'] ?></h2>
          <h6>Rs :<?php echo $value['price'] ?></h6>
          <h6>Qty :<?php echo $value['quantity'] ?></h6>

        </div>

      </div>
    </div>
       <?php
break;
		}

	}
	?>
  </div>
</div>
<div id="test-swipe-3">
       <div class="row">

    <?php
foreach ($res as $value) {
		while ($value['category'] == 'Fancy') {
			?>
    <div class="col s12 m6 l4" >
      <div class="card card z-depth-6 hoverable">
        <div class="card-image waves-light waves-effect waves-block">
          <img  style="height:275px;" src="<?php echo $value['image_path'] ?>">
           </div>
        <div class="card-content  ">
          <h2 class="card-title black-text" style="font-size: 30px;"><?php echo $value['name'] ?></h2>
          <h6>Rs :<?php echo $value['price'] ?></h6>
          <h6>Qty :<?php echo $value['quantity'] ?></h6>
        </div>
      </div>
    </div>
       <?php
break;
		}

	}
	?>
  </div>
</div>
<div id="test-swipe-4">
       <div class="row">

    <?php
foreach ($res as $value) {
		while ($value['category'] == 'Electronics') {
			?>
    <div class="col s12 m6 l4">
      <div class="card card z-depth-6 hoverable">
        <div class="card-image waves-light waves-effect waves-block">
          <img  style="height:275px;" src="<?php echo $value['image_path'] ?>">
           </div>
        <div class="card-content">
          <h2 class="card-title black-text" style="font-size: 30px;"><?php echo $value['name'] ?></h2>
          <h6>Rs :<?php echo $value['price'] ?></h6>
          <h6>Qty :<?php echo $value['quantity'] ?></h6>

        </div>

      </div>
    </div>
       <?php
break;
		}

	}
	?>
  </div>
</div>
<div id="test-swipe-5">
       <div class="row">

    <?php
foreach ($res as $value) {
		while ($value['category'] == 'Sports') {
			?>
    <div class="col s12 m6 l4">
      <div class="card z-depth-6 hoverable"">
        <div class="card-image waves-light waves-effect waves-block">
          <img  style="height:275px;" src="<?php echo $value['image_path'] ?>">
           </div>
        <div class="card-content">
          <h2 class="card-title black-text" style="font-size: 30px;"><?php echo $value['name'] ?></h2>
          <h6>Rs :<?php echo $value['price'] ?></h6>
          <h6>Qty :<?php echo $value['quantity'] ?></h6>

        </div>

      </div>
    </div>
       <?php
break;
		}

	}
	?>
  </div>
</div>
    <?php
} else {
	?>
        <br>
        <h4 style="text-align: center;"><?php echo $error; ?></h4>
     <?php
}
?>


</div>

</section>
<div class="center-align move">
  <a class="pulse btn-floating  waves-light green" href="#about">
    <i class="material-icons">expand_more</i></a>
  </div>
  <br>
  <br>
<section id="about" class="about">
        <br>
        <br>
       <div>
         <h3 class="" style="font-size: 16px;text-align: center;margin:0;">ABOUT US</h3>
         <h2  style="text-align: center; font-family: 'Poppins', sans-serif;font-size: 42px;font-weight: 400;line-height: 32px;letter-spacing: 1px;"><span class="green-text">What</span><span class="grey-text">&nbsp; we are ?</span></h2>
         <hr style="width: 5%;border-top:solid 2px #4caf50;border-bottom:solid 2px #4caf50;">
         </div>
  <div class="container" >

            <p class="flow-text" style="line-height: 26px;font-size: 20px;text-align: justify;opacity: 0.9;">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in vol</p>

  </div>

</section>
<div class="center-align move">
  <a class="pulse btn-floating  waves-light green" href="#service">
    <i class="material-icons">expand_more</i></a>
  </div>
  <br>
  <br>
<section id="service" class="service">
  <br>
  <br>
    <div>
         <h3 class="" style="font-size: 16px;text-align: center;margin:0;">OUR SERVICES</h3>
         <h2  style="text-align: center; font-family: 'Poppins', sans-serif;font-size: 42px;
    font-weight: 400;
    line-height: 32px;
    letter-spacing: 1px;"><span class="grey-text">What</span><span class="green-text">&nbsp; we Offer ?</span></h2>
         <hr style="width: 5%;border-top:solid 2px #4caf50;border-bottom:solid 2px #4caf50;">
         </div>
<div class="container" >

            <p class="flow-text" style="line-height: 26px;font-size: 20px;text-align: justify;opacity: 0.9;">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in vol</p>

  </div>
</section>
<div class="move"><a class="right btn-floating btn-large waves-light green" href="#home"><i class="material-icons">expand_less</i></a>
</div>
<section id="contact" class="contact">
   <footer style="background-color:#262626;" class="z-depth-5 page-footer">

                  <div class="row" align="center">
                    <div class="sc col s12 m3">
                      <h5 class=" white-text"> <b>Reach Us</b></h5>
                      <p class=" grey-text text-lighten-4"><b>State Highway 72, Kakad<br>Tirurangadi<br>Malappuram District<br>Kerala-676306<br>9061877775<br>yarahyper786@gmail.com</b></p>


                    </div>
                          <div class="sc col s12 m3">
                              <a href="https://www.google.com/maps/dir//Yara+Hyper,+State+Highway+72,+Tirurangadi,+Kerala+676306/@11.0434133,75.8916229,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x3ba64d126f8aab4f:0x4f4b4f40c05479fa!2m2!1d75.9267282!2d11.0434153!3e0">  <h5 style="color:white; font-weight: 500;"><b>Locate Us <i style="color:#e53935;font-size:100%" class="material-icons">location_on</i></b></h5></a>
                          <a href="https://www.google.com/maps/dir//Yara+Hyper,+State+Highway+72,+Tirurangadi,+Kerala+676306/@11.0434133,75.8916229,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x3ba64d126f8aab4f:0x4f4b4f40c05479fa!2m2!1d75.9267282!2d11.0434153!3e0"> <img style="margin-top:15px;border-radius:50%;height:60%;width:50%;" class="hoverable responsive-img z-depth-5 waves-effect waves-block waves-light" src="images/map.png">
                    </a>
                          </div>
                    <div class="sc col s12 m3">
                      <div class="row">

                        <h5 class="white-text"><b>Around The Web</b></h5>
                                  <div style="">
                        <ul class="list">
                          <div class="col s4 push-s3">
                            <li><a href="http://facebook.com" class="waves-effect waves-light btn-floating blue">
                               <i class="fab fa-facebook"></i></a></li></div>
                            <div class="col s4 push-s1">
                              <li><a href="https://www.youtube.com/channel/UCE09cIehtM5fgMHqTo4E92w" class="waves-effect waves-light btn-floating red">
                               <i class="fab fa-youtube"></i></a></li>
                             </div>

                        </ul></div>
                      </div>
                    </div>
                    <div class="sc col s12 m3">
                      <h5 class="white-text"> <b>Vision</b></h5>
                      <p class="grey-text text-lighten-4"><b>Customer satisfaction by providing quality products</b></p>


                    </div>




                </div>

                <div style="background-color:black;text-align: center;" class="footer-copyright">
                  <div class="sc container">
                    This independent website is operated under license from <a href="#home" target="_blank" style="color:#d12323;">YaraHyper</a>
                    Copyright © YaraHyper 2018. All Rights Reserved.
                     <span style="color:#d12323;" >Contact : </span>8281234441, 9037992136
                  </div>
                </div>
              </footer>
</section>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
     <script src="js/jquery.matchHeight-min.js" charset="utf-8"></script>
      <script src="js/popper.min.js"></script>

      <!--JavaScript at end of body for optimized loading
      <script type="text/javascript" src="js/materialize.min.js"></script>-->

     <script type="text/javascript">

          $(document).ready(function(){
    $('.sidenav').sidenav();
  });



        $('nav ul li a').click(function()
    { $('html,body').animate({
     scrollTop:$($(this).attr('href')).offset().top },1000);
  });
        $('.move a').click(function()
    { $('html,body').animate({
     scrollTop:$($(this).attr('href')).offset().top },1000);
  });


  $(document).ready(function(){
    $('.slider').slider(
        {
            interval : 3000,
            height   : 750
        });
  });

        $('.tab1').on('click', 'li', function() {
    $('.tab1 li.active ').removeClass('active');
    $(this).addClass('active');
});

          $(document).ready(function(){
    $('ul.tabs').tabs();
  });


      (function()
      {
       var navLinks = $('nav ul li '), navH = $('nav').height(),
       section = $('section'),
       documentEl = $(document); documentEl.on('scroll', function() { var currentScrollPos = documentEl.scrollTop(); section.each(function() { var self = $(this); if ( self.offset().top < (currentScrollPos + navH) && (currentScrollPos + navH) < (self.offset().top + self.outerHeight()) ) { var targetClass = '.' + self.attr('class') + '-marker'; navLinks.removeClass('active'); $(targetClass).addClass('active'); } }); }); })();



     </script>
    <script>
    AOS.init();
    </script>
    </body>
  </html>
