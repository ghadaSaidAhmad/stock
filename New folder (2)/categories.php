<?php include_once("config/config.php"); ?>


<?php 
$sql = "select * from categories" ; 
$result = $mysqli->query($sql) ;

?>


<select class="form-control">
<?php while($rows = $result->fetch_object()) {?>

<option >           </option>
<option> 
  
    <a href="search.php?catid=<?php echo $rows->idCategory?>" > 
	 
     <?php echo  $rows->description ?>
    
    
    
     </a>
      </option>
  



<?php  } ?>
</select>


