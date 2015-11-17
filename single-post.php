<?php 
	session_start();
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
	$posts = findPostRow(); 
	$name = $posts['FirstName'] . " " . $posts['LastName']; 
	?>
   </div>
      <div class="col-md-7">  <!-- start main content column -->
         <ol class="breadcrumb">
           <li><a href="index.php">Home</a></li>
           <li><a href="browse.php">Browse</a></li>
           <li><a href="browse-posts.php">Posts</a></li>
           <li><a href="#" class="active"><?php echo $posts['Title']; ?></a></li>
         </ol>   
         
         <div> <!-- Post description-->
        <?php
        echo "<h1>". $posts['Title'] . "</h1></br>";
        echo "<p>" . $posts['Message'] . "</p>";
        ?>
        </div>        
           	<div class="well">
           		<h4>Images For Post</h4> 
            	<div class="row"> 
            	                  
            	<?php 
            		$pdo = databaseConnection();
					$sql = "SELECT TravelPost.UID, TravelPost.PostID, Path, TravelImage.ImageID, TravelImageDetails.Title \n"
    				. "FROM TravelPost\n"
    				. "INNER JOIN TravelImage\n"
    				. "ON TravelImage.UID = TravelPost.UID\n"
    				. "INNER JOIN TravelImageDetails\n"
    				. "ON TravelImageDetails.ImageID = TravelImage.ImageID\n"
    				. "WHERE TravelPost.PostID = " . $_GET['id'];
    		
    				$result = $pdo->query($sql);
        			images($result);
        			$pdo = null;
        		?>
        		
        		</div>
        		
        	</div>  
        	        
      </div>  <!-- end main content column -->
      
   	<div class="col-md-2">
   	<?php include "includes/travel-right-rail-post.inc.php";?>
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
