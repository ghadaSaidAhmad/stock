<?php
session_start();
include_once("config/config.php");
?>
<?php include'header.php';?>

<div class="container wrap">
  <div class="row">
    <div class="col-md-2 ">
      <ul class="nav nav-pills nav-stacked">
        <li role="presentation"  ><a href="#" >Catogery tree</a></li>
      
      </ul>
    </div>
	
    <div class="col-md-7">
	<div class="row">
     <div id="products-wrapper">
 <h1>View Cart</h1>
 <div class="view-cart">
 	<?php
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["products"]))
    {
	    $total = 0;
		echo '<form method="post" action="payment.php">';
		echo '<ul>';
		$cart_items = 0;
		foreach ($_SESSION["products"] as $cart_itm)
        {
           $product_code = $cart_itm["code"];
		   $results = $mysqli->query("SELECT productName,description FROM product WHERE idproduct='$product_code' LIMIT 1");
		   $obj = $results->fetch_object();
		   
		    echo '<li class="cart-itm">';
			echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
 			echo '<div class="p-price">'.$currency.'100</div>';
            echo '<div class="product-info">';
			echo '<h3>'.$obj->productName.' (Code :'.$product_code.')</h3> ';
            echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
            echo '<div>'.$obj->description.'</div>';
			echo '</div>';
            echo '</li>';
			$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			$total = ($total + $subtotal);

			echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->productName.'" />';
			echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
			echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->description.'" />';
			echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
			$cart_items ++;
			
        }
    	echo '</ul>';
		echo '<span class="check-out-txt">';
		echo '<strong>Total : '.$currency.$total.'</strong>  ';
		echo '<input type="hidden" value='.$total.' name="money">' ;
		echo '</span>';
		echo '<br/><br/>';
		echo '<span class="check-out-txt"><input type="submit" value="Check out" name="checkout"></span>' ;
		echo '</form>';
		
    }else{
		echo 'Your Cart is empty';
	}
	
    ?>
    </div>
</div>
      
    
    
      
    </div>
  </div>
     <!-- # slider -->
   
    <div class="col-md-3" >
     
     <!--#col_md_3 -->
    </div>
  </div>
</div>
</div>
<?php  include'footer.php';?>