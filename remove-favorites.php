<?php 
session_start();
session_destroy();
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap3_travelTheme/assets/js/html5shiv.js"></script>
      <script src="bootstrap3_travelTheme/assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<header>
   <div id="topHeaderRow">
      <div class="container">
         <div class="pull-right">
            <ul class="list-inline">
              <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
              <li><a href="browse-favorites.php"><span class="glyphicon glyphicon-star"></span>Favorites (0)</a></li>
            </ul>         
         </div>
      </div>
   </div>  <!-- end topHeaderRow -->
   
    <div class="navbar navbar-default ">
      <div class="container">
         <nav>
           <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand" href="index.php">Share Your Travels</a>
           </div>
           <div class="navbar-collapse collapse">
             <ul class="nav navbar-nav">
               <li><a href="index.php">Home</a></li>
               <li><a href="aboutus.php">About</a></li>
               <li><a href="#contact">Contact</a></li>
               <li class="dropdown">
                 <a href="browse.php" class="dropdown-toggle" data-toggle="dropdown">Browse <b class="caret"></b></a>
                 <ul class="dropdown-menu">
                   <li><a href="browse-posts.php">Posts</a></li>
                   <li><a href="browse-images.php">Images</a></li>
                   <li class="divider"></li>
                   <li><a href="browse-countries.php">Countries</a></li>
                   <li><a href="browse-users.php">Users</a></li>                
                 </ul>
               </li>
             </ul>
           </div><!-- end navbar collapse -->
        </nav>
      </div>
    </div>  <!-- end navbar -->
</header>

<script src="bootstrap3_travelTheme/js/dropdown.js"></script> 
 
   <div class="container">  <!-- start main content container -->
   <div class="row">  <!-- start main content row -->
   <div class="col-md-3">
   	<?php 
	include "includes/travel-left-rail.inc.php";  
	?>
   </div>
      <div class="col-md-9">  <!-- start main content column -->
         <ol class="breadcrumb">
           <li><a href="index.php">Home</a></li>
           <li><a href="browse-favorites.php" class="active">Browse Favorites</a></li>
         </ol>   
         
         <div class="jumbotron" id="postJumbo">
           <h1>Your Favorite has been removed!</h1>
           </br></br></br>
         </div>        
      
        
  
      
      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end main content container -->

<?php
include "includes/travel-footer.inc.php";
?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap3_travelTheme/dist/js/bootstrap.min.js"></script> 
   
</body>
</html>
