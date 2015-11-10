<?php 
	include_once "functions.php";
	
	$sql1 = "SELECT * \n"
    . "FROM TravelUserDetails\n"
    . "INNER JOIN TravelImage\n"
    . "ON TravelImage.UID = TravelUserDetails.UID\n"
    . "WHERE TravelImage.ImageID = " . $_GET['id'];
    $sql2 = "SELECT * \n"
    . "FROM TravelImageDetails\n"
    . "INNER JOIN GeoCities\n"
    . "ON GeoCities.GeoNameID = TravelImageDetails.CityCode\n"
    . "INNER JOIN GeoCountries\n"
    . "ON GeoCountries.ISO = TravelImageDetails.CountryCodeISO\n"
    . "WHERE TravelImageDetails.ImageID = " . $_GET['id'];
    
    $pdo = databaseConnection();
    
    $result1 = $pdo->query($sql1);
    $result2 = $pdo->query($sql2);
	
        
?>
  		<div class="pull-right">	
        	<div class="panel panel-default">        	
  				<?php
  				    echo "<div class='panel-heading'>Image By</div>";
  					$UID = rightPanelUser($result1);
  					echo "<div class='panel-heading'><em>Image Details</em></div>";
  					rightPanelImgDetails($result2);
  				?>
			</div>
			
			<div class="panel panel-success">
				<div class="panel-heading">Social</div>
  				<div class="panel-body"><p><a class="btn btn-primary btn-md">Add to Favourites</a></p><p><a class="btn btn-success btn-md">View Favourites</a></p></div>
			</div>
			
        </div>
        