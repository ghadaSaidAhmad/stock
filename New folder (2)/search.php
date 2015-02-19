<?php
session_start();
include_once("config/config.php");
?>
<?php include'header.php';?>

<div class="container wrap">
 <div class="col-md-9" >
  <div class="row"> 
        <!-- search form -->
        <form id="srchForm" method="post" action="search.php" >
          <div class="col-md-4">
            <input type="text" name="product" class="form-control"/>
          </div>
          <div class="col-md-4">
            <?php include("categories.php") ?>
          </div>
          <div class="col-md-4">
            <input type="submit" value="search" />
          </div>
        </form>
        <!--  #search form --> 
      </div>
      
      
      <br>
 <div id="products-wrapper">
    <h1>Products</h1>
    <div class="products">
    <?php
    if(isset($_GET["catid"]))
    {
    	 $catid= $_GET["catid"] ; 
    	 $sql  = "select * from product where Category_idCategory= $catid  ORDER BY productName ASC" ;
    	
    }
    if(isset( $_POST["product"]))
    {
    	$product = $_POST["product"];
    	$sql  = "select * from product where productName like '%$product%'  ORDER BY productName ASC" ;
    	$_SESSION["search"] = $product ;
    }
    else if(isset($_SESSION["search"]))
    {
    	$product  = $_SESSION["search"] ;
    	$sql  = "select * from product where productName like '%$product%'  ORDER BY productName ASC" ;
    }
   
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
	$results = $mysqli->query($sql);
    if ($results) { 
	
	
			
	
        //fetch results set as object and output HTML
        while($obj = $results->fetch_object())
        { 
		
		
			
			echo '<div class="product">'; 
            echo '<form method="post" action="cart_update.php">';
			echo '<div class="product-thumb"><img src='.$obj->images.' width="100"></div>';
            echo '<div class="product-content"><h3>'.$obj->ProductName.'</h3>';
            echo '<div class="product-desc">'.$obj->description.'</div>';
            echo '<div class="product-info">';
 			echo 'Price '.$currency.' 100 | ';
            echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
			echo '<button class="add_to_cart">Add To Cart</button>';
			echo '</div></div>';
            echo '<input type="hidden" name="product_code" value="'.$obj->idProduct.'" />';
            echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            echo '</div>';
			}
      
	  
    
    }
	
	
	
    ?>
    </div>
    
<div class="shopping-cart">
<h2>Your Shopping Cart</h2>
<?php
if(isset($_SESSION["products"]))
{
    $total = 0;
    echo '<ol>';
    foreach ($_SESSION["products"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
        echo '<h3>'.$cart_itm["name"].'</h3>';
        echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
        echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
        echo '<div class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
        echo '</li>';
        $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
        $total = ($total + $subtotal);
    }
    echo '</ol>';
    echo '<span class="check-out-txt"><strong>Total : '.$currency.$total.'</strong> <a href="view_cart.php">Check-out!</a></span>';
	echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';
}else{
    echo 'Your Cart is empty';
}
?>
</div>
    
</div>
</div>

<div class="col-md-3" >
      <?php  include'rightside.php';?>
    </div>
</div>
<?php  include'footer.php';?>