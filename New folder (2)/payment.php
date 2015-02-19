<?php $amount = $_POST["money"]?>
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

<h2>Credit Card</h2>
<form action="creditaction.php" method="post">
	<div>
		Name on Credit
	</div>
	<div>
		<input type="text" name= "nameoncard">
	</div>
	<div>
		Credit Number 
	</div>
	<div>
		<input type="text" name= "ccnumber">
	</div>
	<div>
		Expires 
	</div>
	<div>
		<select name="month">
			<option value="01">1</option>
			<option value="02">2</option>
			<option value="03">3</option>
			<option value="04">4</option>
			<option value="05">5</option>
			<option value="06">6</option>
			<option value="07">7</option>
			<option value="08">8</option>
			<option value="09">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
		</select>
		<input type="text" name="year" maxlength="2" />
	</div>
	<div>
		CVV
	</div>
	<div>
		<input type="text" name= "cvv">
	</div>
	<div>
		Amount $<?php echo $amount ?>
	</div>
	<div>
		<input type="hidden" name= "amount" value="<?php echo $amount ?>" >
	</div>
	<div>
		<input type="submit" name= "Send" value="verify">
	</div>
</form>
<hr/>
<h2>Bank Check</h2>
<form action="bankaction.php" method="post">
	<div>
		Name
	</div>
	<div>
		<input type="text" name= "name">
	</div>
	<div>
		Amount $<?php echo $amount ?>
	</div>
	<div>
		<input type="hidden" name= "amount" value="<?php echo $amount ?>">
	</div>
	<div>
		Check Number
	</div>
	<div>
		<input type="text" name= "checknumber">
	</div>
	<div>
		Check Type 
	</div>
	<div>
		<select name="checktype">
			<option value="P">Personal</option>
			<option value="C">Company</option>
		</select>
		

	</div>
	<div>
		ABA/Bank Routing Number
	</div>
	<div>
		<input type="text" name= "routingnumber">
	</div>
	
	<div>
		Bank Account Number
	</div>
	<div>
		<input type="text" name= "accountnumber">
	</div>
	
	<div>
		Driver License
	</div>
	<div>
		<input type="text" name= "driverlicense">
	</div>
	
	<div>
		<input type="submit" name= "Send" value="Process">
	</div>
</form>
      
    
    
      
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