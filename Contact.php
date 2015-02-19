<?php include'header.php';?>
<div class="container wrap">
  <div class="row">
    <div class="col-md-2 ">
      <ul class="nav nav-pills nav-stacked">
        <li role="presentation"  ><a href="#" >Catogery tree</a></li>
      </ul>
    </div>
    <div class="col-md-7">
    <h2>Contact Us</h2>
    <div class="spacer">
              <div class="row">
        <input type="text" class="form-control" placeholder="Full Name">
        <input type="text" class="form-control" placeholder="Email Address">
        <input type="text" class="form-control" placeholder="Contact Number">
        <textarea rows="6" class="form-control" placeholder="Message"></textarea>
        <button type="submit" class="btn btn-success" name="Submit">Send Message</button>
      </div>
      </div>
      </div>
      <!-- # slider -->
      
      <div class="col-md-3" >
        <?php  include'rightside.php';?>
    </div>
  </div>
</div>
<?php  include'footer.php';?>