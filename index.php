<?php 
    $error="";
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
         global $error;
        $error='No products found';
       }
        
  }

 }

 $homeObj =new homeClass();
 $res=$homeObj->displayProducts();
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


      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

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
  .tab ul li a{
    font-weight: bold;
    background-color: white;
    color: green;
  }

  .tab ul li.active a{
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

            <a class="brand-logo" href="#" style="color:green;font-family: 'Merienda One', cursive;font-size:30px;"><b>Yara </b><span style="font-family: 'Comfortaa', cursive;
"><b>Hyper</b></span></a> 
              
            <a class="sidenav-trigger" data-target="mobile-nav" href="#" style="color: black;"> <i class="material-icons">menu</i> </a>
        <ul  class="right hide-on-med-and-down">

            <li class="home-marker active"><a href="#home" style="">&nbsp;  Home</a></li>
            <li class="products-marker"><a href="#products" style="">&nbsp; Products</a></li>
            <li class="about-marker"><a href="#about" style="">&nbsp; About</a></li>
            <li class="contact-marker"><a href="#contact" style="">&nbsp; Contact</a></li>
       </ul>
    </div>
  </nav>
 </div>
<ul class="sidenav" id="mobile-nav">
    <li class="home-marker active"><a class="sidenav-close" href="#home" style="">Home</a></li>
    <li class="products-marker"><a class="sidenav-close" href="#products" style="">Products</a></li>
    <li class="about-marker"><a class="sidenav-close" href="#about" style="">About</a></li>
    <li class="contact-marker"><a class="sidenav-close" href="#contact" style="">Contact</a></li>
   
</ul>
       
       <section class="home" id="home">
           <div class="slider" >
    <ul class="slides">
      <li>
        <img src="images/image1.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3></h3>
          <h5 class="light grey-text text-lighten-3"></h5>
        </div>
      </li>
      <li>
        <img src="images/image2.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3></h3>
          <h5 class="light grey-text text-lighten-3"></h5>
        </div>
      </li>
      <li>
        <img src="images/image3.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3></h3>
          <h5 class="light grey-text text-lighten-3"></h5>
        </div>
      </li>
      <li>
        <img src="images/image4.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3></h3>
          <h5 class="light grey-text text-lighten-3"></h5>
        </div>
      </li>
    </ul>
  </div>



       </section>
       <br>
       <br>

       <section class="products" id="products">

           <?php
         if($error=="")
        {
          foreach ($res as $value) {
        
        ?>
        
            <img style=""> src="<?php echo $value['image_path'] ?>">
            <h1><?php echo $value['name']?></h1>
            <h2><?php echo $value['price']?></h2>
            <h3><?php echo $value['quantity']?></h3>
       
       <?php
         }
     }
     else{
     ?>

       <br>
       <br>
       <br>
       <br>
     <h4 style="text-align: center;"><?php echo $error; ?></h4>
     <?php

    }
         ?>
         
<div class="container tab">

        <ul id="tabs-swipe-demo" class="tabs" style="text-align: center;">
    <li class="tab col s3 active"><a class="" href="#test-swipe-1">Household</a></li>
    <li class="tab col s3"><a  href="#test-swipe-2">Bakery</a></li>
    <li class="tab col s3"><a  href="#test-swipe-3">Fancy</a></li>
    <li class="tab col s3"><a  href="#test-swipe-4">Electronics</a></li>
    <li class="tab col s3"><a  href="#test-swipe-5">Sports</a></li>
  </ul>
  <div id="test-swipe-1" class="col s12 ">House hold items</div>
  <div id="test-swipe-2" class="col s12 ">BAkery items</div>
  <div id="test-swipe-3" class="col s12 ">Fancy</div>
  <div id="test-swipe-4" class="col s12 ">ELectronics</div>
  <div id="test-swipe-5" class="col s12 ">SPorts</div>
            </div>  

       </section>
        
     
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
            
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
     <script type="text/javascript">
         
          $(document).ready(function(){
    $('.sidenav').sidenav();
  });

     

        $('a').click(function()
    { $('html,body').animate({
     scrollTop:$($(this).attr('href')).offset().top },1000);
  });


  $(document).ready(function(){
    $('.slider').slider(
        {
            interval : 2000,
            height   : 600
        });
  });
        
        $('.tabs').on('click', 'li', function() {
    $('.tabs li.active').removeClass('active');
    $(this).addClass('active');
});

          $(document).ready(function(){
    $('ul.tabs').tabs({
      swipeable : true,
      responsiveThreshold : 1920
    });
  });


      (function()
      {
       var navLinks = $('nav ul li '), navH = $('nav').height(),
       section = $('section'),
       documentEl = $(document); documentEl.on('scroll', function() { var currentScrollPos = documentEl.scrollTop(); section.each(function() { var self = $(this); if ( self.offset().top < (currentScrollPos + navH) && (currentScrollPos + navH) < (self.offset().top + self.outerHeight()) ) { var targetClass = '.' + self.attr('class') + '-marker'; navLinks.removeClass('active'); $(targetClass).addClass('active'); } }); }); })();

      
    
     </script>

    </body>
  </html>
