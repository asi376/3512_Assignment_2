<?php 
session_start();
include_once "functions.php"; 
if (isset($_SESSION['cart']))
{
	{
		$favs = $_SESSION['cart'];
		$newFav = returnFav();
		$newFav = $newFav->fetchall();
		
		
		$merge = $favs;	
		foreach($newFav as $row)
		{
			$merge[] = array_merge($merge[0], $row);
		}
		
		$_SESSION['cart'] = $merge;
	
	}
}
else
{
		
		$fav = returnFav();
		
		$fav = $fav->fetchall();
		
		
			
		$_SESSION['cart'] = $fav;
		
	
		
	
} 
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
	?>
   </div>
      <div class="col-md-9">  <!-- start main content column -->
         <ol class="breadcrumb">
           <li><a href="index.php">Home</a></li>
           <li><a href="browse-cart.php">Browse Cart</a></li>
         </ol>   
         
         <tbody>
            <tr>
            <th><strong>Image</strong></th>
            <th><strong>Size</strong></th>
            <th><strong>Paper Stock</strong></th>
            <th><strong>Frame</strong></th>
            <th><strong>Price</strong></th>
             <?php		
                foreach ($_SESSION["cart"] as $item){
            		?>
            				<tr>
            				<td><strong><?php echo $item["name"]; ?></strong></td>
            				<td><?php echo $item["code"]; ?></td>
            				<td><?php echo $item["quantity"]; ?></td>
            				<td align=right><?php echo "$".$item["price"]; ?></td>
            				<td><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
            				</tr>
            				<?php
                    $item_total += ($item["price"]*$item["quantity"]);
            		}
            	?>
              
              <tr>
              <td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
              </tr>
          </tbody>
        </table>		
  <?php
      
         <?php
         
         ?>
  
      
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

    Status API Training Shop Blog About Pricing 

    © 2015 GitHub, Inc. Terms Privacy Security Contact Help 








$size = array(
array('5"x7"', 0.50),
array('8"x10"', 2.50),
array('11"x14"', 6.00),
array('12"x18"', 7.00)
);

$paperStock = array(
array('Matte', 0, 0),
array('Glossy', 0.50, 1.00),
array('Canvas', 4.00, 8.00)
)

$frame = array(
array('none', 0.00,0.00,0.00,0.00),
array('Blond Maple', 10.00, 12.00, 16.00, 20.00)
array('Expresso Walnut', 10.00, 12.00, 16.00, 20.00),
array('Gold Accent', 10.00, 12.00, 16.00, 20.00)
array('Silver Metal', 10.00, 20.00, 16.00, 20.00)
)

<form action = "browse-cart.php" method="get">
<select name="sizes">
    <option value="0">5"x7"</option>
    <option selected="selected" value="1">8"x10"</option>
    <option value="2">11"x14"</option>
	<option value="3">12"x18"</option>
</select>

<input type="number" name="quantity" value="1"></>


<select name="PaperStocks">
    <option selected="selected" value="0">Matte</option>
    <option value="1">Glossy</option>
    <option value="2">Canvas</option>
</select>


<select name="Frames">
    <option selected="selected" value="0">None</option>
    <option value="1">Blond Maple</option>
    <option value="2">Expresso Walnut</option>
	<option value="3">Gold Accent</option>
	<option value="4">Silver Metal</option>
</select>

if 

$item_total = (($_GET["sizes"] + $_GET["PaperStocks"] + $_GET["Frames"]) * $_GET["quantity"])


$cart_total += item_total 
