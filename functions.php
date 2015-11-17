<?php

	function databaseConnection()
	{
		try
		{
			$user = "testuser";
			$pass = "mypassword";
			$db = "travels";
			$host = "localhost";		
						
			$connString = "mysql:host=$host;dbname=$db";
		
			$pdo = new PDO($connString, $user, $pass);
			
			return $pdo;						
		}
		catch(PDOException $e)
		{
			die( $e->getMessage() );
			$pdo = null;
		}
	 }
	 
	 
	function echoFavs($favorites)
	{		
		
		foreach($favorites as $fav)
		{	
			
			echo "<tr><td>";
			echo "<img src='travel-images/medium/" . $fav['Path'] . "' alt='" . $fav['Title'] . "' class='img-thumbnail'/>" ;
			echo "</td><td><p><a href='single-image.php?id=" . $fav['ImageID'] . "'>" . $fav['Title'] . "</a></p></td><td><p>" . $fav['CountryName'] . "</p></td></tr>";	
		
		
		}
		
        
		
	}
	
	function returnFav()
	{
		$pdo = databaseConnection();
		
		$sql = "SELECT Path, TravelImage.ImageID, Title, CountryName\n"
    		. "FROM TravelImageDetails\n"
    		. "INNER JOIN TravelImage\n"
    		. "ON TravelImageDetails.ImageID = TravelImage.ImageID\n"
    		. "INNER JOIN GeoCountries\n"
   	 		. "ON GeoCountries.ISO = TravelImageDetails.CountryCodeISO WHERE TravelImage.ImageID = " . $_GET['id'];
   	 		
   	 	$result = $pdo->query($sql);
   	 	return $result;
   	 	
   	 	
	}
	
	function filterByCity()
	{
		$pdo = databaseConnection();
		$sql = "SELECT * \n"
    	. "FROM TravelImageDetails\n"
    	. "INNER JOIN TravelImage ON TravelImageDetails.ImageID = TravelImage.ImageID\n"
    	. "WHERE CityCode = '" . $_GET['city'] . "'" ;
    	
    	$result = $pdo->query($sql);
    	
    	images($result);
    	$pdo = null;
	}
	
	function filterByCountry()
	{
		$pdo = databaseConnection();
		$sql = "SELECT * \n"
    	. "FROM TravelImageDetails\n"
    	. "INNER JOIN TravelImage ON TravelImageDetails.ImageID = TravelImage.ImageID\n"
    	. "WHERE CountryCodeISO = '" . $_GET['country'] . "'" ;
    	
    	$result = $pdo->query($sql);
    	
    	images($result);
    	$pdo = null;
	} 

	function fetchAllCities()
	{
		$pdo = databaseConnection();
		$sql = "SELECT * FROM `GeoCities`\n"
    	. "INNER JOIN TravelImageDetails\n"
    	. "ON TravelImageDetails.CityCode = GeoCities.GeoNameID\n"
    	. "GROUP BY AsciiName";
    	
    	$result = $pdo->query($sql);
    	
    	echo "<option value='0'>Filter by City</option>";
    	
    	foreach($result as $statement)
    	{
    		echo "<option value='" . $statement['CityCode'] . "'>" . $statement['AsciiName'] . "</option>";
    		
    	}
    	$pdo = null;
	}
	
	function fetchAllCountries()
	{
		$pdo = databaseConnection();
		$sql = "SELECT * FROM GeoCountries\n"
    	. "INNER JOIN TravelImageDetails ON TravelImageDetails.CountryCodeISO = GeoCountries.ISO GROUP BY CountryName";
		
		$result = $pdo->query($sql);
		
		echo "<option value='ZZZ'>Filter by Country</option>";
		
		foreach($result as $statement)
		{
			echo "<option value='" . $statement['ISO'] . "'>" . $statement['CountryName'] . "</option>";
		}
		$pdo = null;
	}
	
	function fetchAllImages()
	{
		$pdo = databaseConnection();
		$sql = "SELECT Path, TravelImage.ImageID, Title\n"
    	. "FROM `TravelImage`\n"
    	. "INNER JOIN TravelImageDetails\n"
    	. "ON TravelImage.ImageID = TravelImageDetails.ImageID";
    	
    	$result = $pdo->query($sql);
    	images($result);
		$pdo = null;
		
	}
	
	function rightPanelUser($result)
	{	
    	
    	foreach ($result as $statement)
    		{	    			
    				$row = $statement;
    				$row['FirstName'] = utf8_encode($row['FirstName']);
					$row['LastName'] = utf8_encode($row['LastName']);
					$name = $row['FirstName'] . " " . $row['LastName'];
    				echo "<div class='panel-body'><a href='single-user.php?id=" . $statement['UID'] . "'>" . $name . "</a></div>";
    				$UID = $statement['UID'];    			
			}	
				return $UID;	
	}
	
	function rightPanelImgDetails($result)
	{
		foreach($result as $statement)
		{
			echo "<div class='panel-body'>" . $statement['AsciiName'] . ", <a href='browse-images.php?city=0&country=" . $statement['CountryCodeISO'] . "'>";
			echo $statement['CountryName'] . "</a></div>";
			
		}
	}
	
	function rightPanelPost($result, $UID)
	{		
    	foreach ($result as $statement)
    	{			
			if ($statement['UID'] == $UID)
    		{    				   				
    			echo "<div class='panel-body'><a href='single-post.php?id=" . $statement['PostID'] . "'>";
    			echo  $statement['Title'] . "</a>" . "</div>";
	
    		}
    	}
	}
		
	
	function otherPosts($result)
	{
		foreach($result as $statement)
		{
			echo "<a href='single-post.php?id=" . $statement['PostID'] . "'>" . $statement['Title'] . "</a>";
		}
	}
	
	function images($result)
	{
		foreach ($result as $picture)
        {
    		echo "<div class='col-md-3'>";
    		echo "<a href='single-image.php?id=" . $picture['ImageID'] . "'>";
    		echo "<img src='travel-images/square-medium/" . $picture['Path'] . "' alt='" . $picture['Title'] . "' class='img-thumbnail'/>" ;
      		echo "</a>";
     		echo "</div>";
       	}
	}
	
	function largeImage($result)
	{
		foreach ($result as $picture)
        {
      		echo "<a href='single-image.php?id=" . $picture['ImageID'] . "'>";
      		echo "<img src='travel-images/large/" . $picture['Path'] . "' alt='" . $picture['Title'] . "' class='img-thumbnail'/>" ;
      	  	echo "</a>";
      	}
	}
	
	function userRows()
	{
		$pdo = databaseConnection();
		$sql = "SELECT UID, FirstName, LastName FROM `TravelUserDetails`\n"
    	. "ORDER BY `TravelUserDetails`.`FirstName` ASC";
    	
    	$result = $pdo->query($sql);
    	
    	foreach($result as $user)
         	{
         		$name = $user['FirstName'] . " ". $user['LastName'];
         		$name = utf8_encode($name);
         		echo "<li class='list-group-item'><a href='single-user.php?id=" .$user['UID'] ;
         		echo "'>" . $name . "</a></li>"; 
         	}
        $pdo = null;
	}
	
	function findImageRow()
	{
		$pdo = databaseConnection();
    	
    	$sql = "SELECT * FROM TravelImageDetails\n"
    	. "INNER JOIN GeoCountries\n"
    	. "ON TravelImageDetails.CountryCodeISO = GeoCountries.ISO\n"
   	 	. "INNER JOIN GeoCities\n"
    	. "ON TravelImageDetails.CityCode = GeoCities.GeoNameID\n"
    	. "INNER JOIN TravelImage\n"
    	. "ON TravelImage.ImageID = TravelImageDetails.ImageID WHERE TravelImage.ImageID = " . $_GET['id'] ;
    	
		$result = $pdo->query($sql);
		
		
		foreach ($result as $statement)
		{
				$row = $statement;
				$row['FirstName'] = utf8_encode($row['FirstName']);
				$row['LastName'] = utf8_encode($row['LastName']);
				$row['Description'] = utf8_encode($row['Description']);
				$row['Title'] = utf8_encode($row['Title']);		
				break;		
						
		}
		return $row;
	}
	
	function findPostRow()
	{
		$pdo = databaseConnection();
		$sql = "SELECT Title, Message, TravelPost.UID, FirstName, LastName, PostID, ImageID, Path \n"
    	. "FROM TravelPost\n"
    	. "INNER JOIN TravelUserDetails\n"
    	. "ON TravelUserDetails.UID = TravelPost.UID\n"
    	. "INNER JOIN TravelImage\n"
    	. "ON TravelImage.UID = TravelUserDetails.UID\n"
    	. "WHERE PostID = " . $_GET['id'] . " ORDER BY `TravelPost`.`UID` ASC";
    	
		$result = $pdo->query($sql);
		
		
		foreach ($result as $statement)
		{
				$row = $statement;
				$row['FirstName'] = utf8_encode($row['FirstName']);
				$row['LastName'] = utf8_encode($row['LastName']);
				$row['Message'] = utf8_encode($row['Message']);
				$row['Title'] = utf8_encode($row['Title']);		
				break;		
						
		}
		return $row;
	}
	
	function findUserRow()
	{
		$pdo = databaseConnection();
		$sql = "SELECT * FROM TravelUserDetails\n";
    	
		$result = $pdo->query($sql);
		foreach ($result as $statement)
		{
			if($statement['UID'] == $_GET['id'])
			{
				$row = $statement;
				$row['FirstName'] = utf8_encode($row['FirstName']);
				$row['LastName'] = utf8_encode($row['LastName']);
				$row['Address'] = utf8_encode($row['Address']);
				$row['City'] = utf8_encode($row['City']);
				$row['Country'] = utf8_encode($row['Country']);
				return $row;
				break;
			}
		}
		$pdo = null;
	}
	
	function findUserRowPics()
	{
		$pdo = databaseConnection();
		$sql = "SELECT TravelUserDetails.UID, Address, FirstName, LastName, City, Country, Email, Path, Title, TravelImage.ImageID\n"
    	. "FROM TravelUserDetails\n"
    	. "INNER JOIN TravelImage\n"
    	. "ON TravelImage.UID = TravelUserDetails.UID \n"
    	. "INNER JOIN TravelImageDetails \n"
    	. "ON TravelImage.ImageID = TravelImageDetails.ImageID WHERE TravelUserDetails.UID = " . $_GET['id'];
    	
		$result = $pdo->query($sql);
		$pdo = null;
		
		return $result;
	}
	
	function findCountryRow()
	{
		$pdo = databaseConnection();
		$sql = "SELECT ISO, Capital, CountryName, Area, Population, CurrencyName, CountryDescription FROM GeoCountries";
		$result = $pdo->query($sql);
		foreach ($result as $statement)
		{
			if($statement['ISO'] == $_GET['iso'])
				$row = $statement;
		}
		$row['CountryDescription'] = utf8_encode($row['CountryDescription']);
		$pdo = null;
		return $row;
	}
	
	function carouselImage($imageID, $pdo)
	{
		$sql = "SELECT Path, Title, Description, TravelImageDetails.ImageID FROM TravelImage\n"
    	. "INNER JOIN TravelImageDetails\n"
    	. "ON TravelImage.ImageID = TravelImageDetails.ImageID\n"
    	. "WHERE TravelImage.ImageID = $imageID";
  		$result = $pdo->query($sql);
  			while ($row = $result->fetch() )
  			{
  				$path = $row['Path'];
  				$title = $row['Title'];
  				$desc = $row['Description'];
  				$ID = $row['ImageID'];
  			}
  		$array = array($path,$title,$desc, $ID);
  		$pdo = null;
  		return $array;
	}

 	function postRows()
 	{
 		$pdo = databaseConnection();
 		$sql = "SELECT TravelPost.PostID , TravelPostImages.ImageID, Path, Title, Message, PostTime, FirstName, LastName, TravelUserDetails.UID \n"
    	. "FROM TravelPostImages\n"
    	. "INNER JOIN TravelPost\n"
    	. "ON TravelPostImages.PostID = TravelPost.PostID\n"
    	. "INNER JOIN TravelUserDetails\n"
    	. "ON TravelPost.UID = TravelUserDetails.UID\n"
    	. "INNER JOIN TravelImage\n"
    	. "ON TravelImage.ImageID = TravelPostImages.ImageID\n"
    	. "ORDER BY `TravelPost`.`PostID` ASC";
    	
    	$result = $pdo->query($sql);
    	$lastPostID = 0;
    	
    	foreach ($result as $statement)
    	{
    		if ($statement['PostID'] != $lastPostID)
    		{		
    			$statement['FirstName'] = utf8_encode($statement['FirstName']);
				$statement['LastName'] = utf8_encode($statement['LastName']);
				$name = $statement['FirstName'] . " " . $statement['LastName'];
				$concatMsg = substr($statement['Message'], 0, 197);
				$concatMsg = utf8_encode($concatMsg);
				$concatMsg = $concatMsg . "...";
				$PostTime = substr($statement['PostTime'], 0, 10);
				
				
    			echo "<div class='row'>" . " <div class='col-md-2'>" ;
    			echo "<a href='single-image.php?id=". $statement['ImageID'] . "'>" ;
    			echo "<img src='travel-images/square-medium/" . $statement['Path'] . "' alt='" . $statement['Title'] . "' class='img-thumbnail'/></a>" ;
    			echo "</div>" . "<div class='col-md-10'>" . "<h2>" . $statement['Title'] . "</h2>" ;
    			echo "<div class='details'>" . "Posted by <a href='single-user.php?id=" . $statement['UID'] . "'>" . $name . "</a>";
    			echo "<span class='pull-right'>" . $PostTime . "</span>" . " </div>" . "<p class='excerpt'>" ;
    			echo $concatMsg . "</p> <p>" ;
    			echo "<a href='single-post.php?id=". $statement['PostID'] . "' class='btn btn-primary btn-sm'>Read more</a>" ;
    			echo  "</p></div></div><hr/>";
    			$lastPostID ++;
    		}
    	}
        $pdo = null;     		
	}
?>
