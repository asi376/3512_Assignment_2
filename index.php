<?php 
	session_start();
	include_once "functions.php";	
?>

<!DOCTYPE html>
<html lang="en">
  <head>

     <!-- Google fonts used in this theme  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,800,600,700,300' rel='stylesheet' type='text/css'>  

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Assignment 1</title>
    
   

    <!-- Bootstrap core CSS -->
    <link href="bootstrap3_travelTheme/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="bootstrap3_travelTheme/theme.css" rel="stylesheet">  
    
    <!-- Custom CSS for carousel-->
    <link rel="stylesheet" type="text/css" href="style.css">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap3_travelTheme/assets/js/html5shiv.js"></script>
      <script src="bootstrap3_travelTheme/assets/js/respond.min.js"></script>
    <![endif]-->
    

  </head>

  <body>

<?php 
include "includes/travel-header.inc.php";
 ?>
 
 <div id="carousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ol>
 <?php
 	$pdo = databaseConnection();
 ?>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  <?php 	
    $image = carouselImage(13, $pdo);
  ?>
    <div class="item active">
      <?php 
      
      echo "<img src='travel-images/medium/" . $image[0] . "' alt='" . $image[1]. "'>" ;
      
      ?>
      <div class="carousel-caption">
      <?php
          echo "<h3>" .  $image[1] .  "</h3>";
          echo "<p>" .  $image[2] .  "</p>";
          echo "<p><a class='btn btn-warning btn-lg'";
          echo " href='single-image.php?id=" . $image[3] . "'>Learn more &raquo;</a></p>";
      ?>    
      </div>
    </div>
    <?php  	
    $image = carouselImage(6, $pdo);
  ?>
    <div class="item">
      <?php 
      
      echo "<img src='travel-images/medium/" . $image[0] . "' alt='" . $image[1]. "'>" ;
      
      ?>
      <div class="carousel-caption">
          <?php
          echo "<h3>" .  $image[1] .  "</h3>";
          echo "<p>" .  $image[2] .  "</p>";
          echo "<p><a class='btn btn-warning btn-lg'";
          echo " href='single-image.php?id=" . $image[3] . "'>Learn more &raquo;</a></p>";
      ?> 
      </div>
    </div>
     <?php
    $image = carouselImage(7, $pdo);
  ?>
    <div class="item">
      <?php 
      
      echo "<img src='travel-images/medium/" . $image[0] . "' alt='" . $image[1]. "'>" ;
      
      ?>
      <div class="carousel-caption">
          <?php
          echo "<h3>" .  $image[1] .  "</h3>";
          echo "<p>" .  $image[2] .  "</p>";
          echo "<p><a class='btn btn-warning btn-lg'";
          echo " href='single-image.php?id=" . $image[3] . "'>Learn more &raquo;</a></p>";
      ?> 
      </div>
    </div>
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->

<?php
include "includes/travel-footer.inc.php";
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap3_travelTheme/dist/js/bootstrap.min.js"></script> 
    
</body>
</html>
