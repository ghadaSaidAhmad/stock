<?php include("header.php");?>
<div class="container wrap">
  <div class="row">
    <div class="col-md-2 ">
      <ul class="nav nav-pills nav-stacked">
        <li role="presentation"  ><a href="#" >Catogery tree</a></li>
      </ul>
    </div>
    <div class="col-md-7">
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
      <br>
      
      <!-- slider -->
      
      <div class="properties-listing spacer"> <a href="buysalerent.php" class="pull-right viewall"> </a>
        <h2>Featured Product</h2>
        <div id="owl-example" class="owl-carousel">
          <div class="properties">
            <div class="image-holder"><img src="images/properties/1.jpg" class="img-responsive" alt="properties"/>
              <div class="status sold">Sold</div>
            </div>
            <h4><a href="property-detail.php">Royal Inn</a></h4>
            <p class="price">Price: $234,900</p>
            <a class="btn btn-primary" href="property-detail.php">View Details</a> </div>
          <div class="properties">
            <div class="image-holder"><img src="images/properties/2.jpg" class="img-responsive" alt="properties"/>
              <div class="status new">New</div>
            </div>
            <h4><a href="property-detail.php">Royal Inn</a></h4>
            <p class="price">Price: $234,900</p>
            <a class="btn btn-primary" href="property-detail.php">View Details</a> </div>
          <div class="properties">
            <div class="image-holder"><img src="images/properties/3.jpg" class="img-responsive" alt="properties"/></div>
            <h4><a href="property-detail.php">Royal Inn</a></h4>
            <p class="price">Price: $234,900</p>
            <a class="btn btn-primary" href="property-detail.php">View Details</a> </div>
          <div class="properties">
            <div class="image-holder"><img src="images/properties/4.jpg" class="img-responsive" alt="properties"/></div>
            <h4><a href="property-detail.php">Royal Inn</a></h4>
            <p class="price">Price: $234,900</p>
            <a class="btn btn-primary" href="property-detail.php">View Details</a> </div>
          <div class="properties">
            <div class="image-holder"><img src="images/properties/2.jpg" class="img-responsive" alt="properties"/>
              <div class="status sold">Sold</div>
            </div>
            <h4><a href="property-detail.php">Royal Inn</a></h4>
            <p class="price">Price: $234,900</p>
            <a class="btn btn-primary" href="property-detail.php">View Details</a> </div>
          <div class="properties">
            <div class="image-holder"><img src="images/properties/1.jpg" class="img-responsive" alt="properties"/></div>
            <h4><a href="property-detail.php">Royal Inn</a></h4>
            <p class="price">Price: $234,900</p>
            <a class="btn btn-primary" href="property-detail.php">View Details</a> </div>
        </div>
      </div>
      <!-- # slider --> 
    </div>
    <div class="col-md-3" >
      <?php  include'rightside.php';?>
    </div>
  </div>
</div>
</div>
<?php  include'footer.php';?>