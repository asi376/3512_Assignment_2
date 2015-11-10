<?php 
	include_once "functions.php";
	
	$sql1 = "SELECT FirstName, LastName, TravelPost.UID, Title, PostID\n"
    . "FROM TravelUserDetails\n"
    . "INNER JOIN TravelPost\n"
    . "ON TravelPost.UID = TravelUserDetails.UID WHERE PostID =" . $_GET['id'] . " ORDER BY `TravelPost`.`UID` ASC";
    $sql2 = "SELECT * FROM `TravelPost` ORDER BY `TravelPost`.`UID` ASC";
    
    $pdo = databaseConnection();
    
    $result1 = $pdo->query($sql1);
    $result2 = $pdo->query($sql2);
	
        
?>
  		<div class="pull-right">	
        	<div class="panel panel-default">        	
  				<?php
  					echo "<div class='panel-heading'>Posted By</div>";
  					$UID = rightPanelUser($result1);
  					echo "<div class='panel-heading'><em>Posts by this user</em></div>";
  					rightPanelPost($result2, $UID);
  				?>
			</div>
			
			<div class="panel panel-success">
				<div class="panel-heading">Social</div>
  				<div class="panel-body"><p><a class="btn btn-primary btn-md">Add to Favourites</a></p><p><a class="btn btn-success btn-md">View Favourites</a></p></div>
			</div>
			
        </div>
        