<?php 
	include_once "functions.php"; 
	
			if ( !isset($_GET['id']))
			header("Location: error.php");			
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

<?php 
include "includes/travel-header.inc.php";
 ?>
 
   <div class="container">  <!-- start main content container -->
   
   <div class="row">  <!-- start main content row -->

   
  <div class="col-md-3">
   	<?php 
	include "includes/travel-left-rail.inc.php";
	$posts = findImageRow(); 
	$name = $posts['FirstName'] . " " . $posts['LastName']; 
	?>
   </div>
      <div class="col-md-7">  <!-- start main content column -->
         <ol class="breadcrumb">
           <li><a href="index.php">Home</a></li>
           <li><a href="browse.php">Browse</a></li>
           <li><a href="browse-images.php">Images</a></li>
           <li><a href="#" class="active"><?php echo $posts['Title']; ?></a></li>
         </ol>   
         
         <div> <!-- Post description-->
        <?php
        echo "<h2>". $posts['Title'] . "</h2></br>";
        ?>
        </div>        
           	<div class="well">
            	<div class="row">                   
            	<?php 
            		$pdo = databaseConnection();
					$sql = "SELECT * FROM TravelImage \n"
    				. "INNER JOIN TravelImageDetails \n"
    				. "ON TravelImageDetails.ImageID = TravelImage.ImageID \n"
    				. "WHERE TravelImage.ImageID = " . $_GET['id'];
    		
    				$result = $pdo->query($sql);
        			largeImage($result);
        			$pdo = null;
        		?>
        		</div>
        	</div>    
        	<div>
        	<?php
        		echo "<p>" . $posts['Description'] . "</p>";
        	?>	
        	</div>      
      </div>  <!-- end main content column -->
      
       <div class="col-md-2">
   	<?php include "includes/travel-right-rail-image.inc.php";?>
   </div>
   </div>  <!-- end main content row -->
</div>   <!-- end main content container -->

<?php
include "includes/travel-footer.inc.php";
?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap3_travelTheme/dist/js/bootstrap.min.js"></script> 
   
</body>
</html>