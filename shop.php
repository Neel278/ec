<?php
include('nav.php');
$_SESSION['user']=$email[0];
?>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Collection Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
    					<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    					<?php
    					$sql="SELECT * FROM `product_details` ";
    					$result=mysqli_query($conn,$sql);
    					if($result->num_rows > 0){
    						while($row=mysqli_fetch_assoc($result)){
    					?>
		    			<div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
		    				<div class="product">
		    					<a href="product-single.php?id=<?= $row['id']; ?>" class="img-prod"><img class="img-fluid" src="images/product-<?= $row['id']; ?>.jpg" alt="Colorlib Template">
		    						<span class="status"><?=$row['discount']?></span>
		    						<div class="overlay"></div>
		    					</a>
		    					<div class="text py-3 px-3">
		    						<h3><a href="#"><?=$row['product_name']?></a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
				    						<p class="price"><span class="mr-2 price-dc"><?= $row['old_price'] ?></span><span class="price-sale"><?= $row['new_price'] ?></span></p>
				    						<?php $_SESSION['price']=$row['new_price']; ?>
				    					</div>
				    					<div class="rating">
			    							<p class="text-right">
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    								<a href="#"><span class="ion-ios-star-outline"></span></a>
			    							</p>
			    						</div>
			    					</div>
			    					<p class="bottom-area d-flex px-3">
		    							<a href="cart_add.php?id=<?= $row['id'] ?>" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
		    							<a href="checkout.php?id=<?= $row['id'] ?>" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
		    			<?php
		    				}
		    			}	
		    			?>
		    			<!-- ======================================================================= -->
		    		</div>
		    		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
		    	</div>

		    	<div class="col-md-4 col-lg-2 sidebar">
		    		<div class="sidebar-box-2">
		    			<h2 class="heading mb-4"><a href="shop.php">Clothing</a></h2>
		    			<ul>
		    				<li><a href="product.php?id=shirts-tops">Shirts &amp; Tops</a></li>
								<li><a href="product.php?id=dresses">Dresses</a></li>
								<li><a href="product.php?id=shorts-skirts">Shorts &amp; Skirts</a></li>
								<li><a href="product.php?id=jackets">Jackets</a></li>
								<li><a href="product.php?id=coats">Coats</a></li>
								<li><a href="product.php?id=sleeveless">Sleeveless</a></li>
								<li><a href="#">Trousers</a></li>
								<li><a href="#">Winter Coats</a></li>
								<li><a href="#">Jumpsuits</a></li>
		    			</ul>
		    		</div>
		    		<div class="sidebar-box-2">
		    			<h2 class="heading mb-4"><a href="#">Jeans</a></h2>
		    			<ul>
		    				<li><a href="#">Shirts &amp; Tops</a></li>
								<li><a href="#">Dresses</a></li>
								<li><a href="#">Shorts &amp; Skirts</a></li>
								<li><a href="#">Jackets</a></li>
								<li><a href="#">Coats</a></li>
								<li><a href="#">Jeans</a></li>
								<li><a href="#">Sleeveless</a></li>
								<li><a href="#">Trousers</a></li>
								<li><a href="#">Winter Coats</a></li>
								<li><a href="#">Jumpsuits</a></li>
		    			</ul>
		    		</div>
		    		<div class="sidebar-box-2">
		    			<h2 class="heading mb-2"><a href="#">Bags</a></h2>
		    			<h2 class="heading mb-2"><a href="#">Accessories</a></h2>
		    		</div>
						<div class="sidebar-box-2">
		    			<h2 class="heading mb-4"><a href="#">Shoes</a></h2>
		    			<ul>
		    				<li><a href="#">Nike</a></li>
								<li><a href="#">Addidas</a></li>
								<li><a href="#">Skechers</a></li>
								<li><a href="#">Jackets</a></li>
								<li><a href="#">Coats</a></li>
								<li><a href="#">Jeans</a></li>
		    			</ul>
		    		</div>
    			</div>
    		</div>
    	</div>
    </section>

 <?php include('footer.php') ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>