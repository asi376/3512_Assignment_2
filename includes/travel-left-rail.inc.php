<?php 
	include_once "functions.php";
?>

   
      <div class="panel panel-default">
           <div class="panel-heading">Search</div>
           <div class="panel-body">
             <form>
               <div class="input-group">
                  <input type="text" class="form-control" placeholder="search ...">
                  <span class="input-group-btn">
                    <button class="btn btn-warning" type="button"><span class="glyphicon glyphicon-search"></span>          
                    </button>
                  </span>
               </div>  
             </form>
           </div>
         </div>  <!-- end search panel -->       
      
         <div class="panel panel-info">
           <div class="panel-heading">Continents</div>
           <ul class="list-group">   
				<?php 
				try
				{
					$pdo = databaseConnection();
					$sql = "SELECT ContinentName FROM GeoContinents";
					
					$result = $pdo->query($sql);
					foreach ($result as $statement)
					{
						echo "<li class='list-group-item'><a href='#'>" . $statement['ContinentName'] . "</a></li>";						
					}
					$pdo = null;
				}
				catch(PDOException $e)
				{
					die( $e->getMessage() );
				}
					
				
				?>

           </ul>
         </div>  <!-- end continents panel -->  
         <div class="panel panel-info">
           <div class="panel-heading">Popular Countries</div>
           <ul class="list-group">  

				<?php 
				try
				{
					$pdo = databaseConnection();
					$sql = "SELECT DISTINCT CountryName, ISO \n"
    					. "FROM `GeoCountries` \n"
    					. "INNER JOIN TravelImageDetails\n"
    					. "ON ISO = CountryCodeISO\n"
    					. "ORDER BY `CountryName` ASC";
					
					$result = $pdo->query($sql);
					foreach ($result as $statement)
					{
						echo "<li class='list-group-item'><a href='single-country.php?iso=" . $statement['ISO'] .  "'>" ;
						echo $statement['CountryName'] . "</a></li>";						
					}
					$pdo = null;
				}
				catch(PDOException $e)
				{
					die( $e->getMessage() );
				}								
				?>
  
           </ul>
         </div>  <!-- end countries panel -->    