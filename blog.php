<?php
include('nav.php');
?>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blog</span></p>
            <h1 class="mb-0 bread">Blog</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
						<div class="row">
              <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
              <?php
              $sql='SELECT * FROM `blogs` ORDER BY `comments` DESC';
              $result=mysqli_query($conn,$sql);
              if($result->num_rows > 0){
                while($row=mysqli_fetch_assoc($result)){
              ?>
							<div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_<?= $row['id'] ?>.jpg');">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#"><?= $row['date'] ?></a></div>
		                  <div><a href="#"><?= $row['name'] ?></a></div>
		                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> <?= $row['comments'] ?></a></div>
		                </div>
		                <h3 class="heading"><a href="#"><?= $row['heading'] ?></a></h3>
		                <p><?= $row['text'] ?></p>
		                <p><a href="blog-single.php" class="btn btn-primary py-2 px-3">Read more</a></p>
		              </div>
		            </div>
		          </div>
              <?php
                   }
                }
              ?>
              <!-- ============================================================== -->
						</div>
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon ion-ios-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
            	<h3 CLASS="heading">Categories</h3>
              <ul class="categories">
                <li><a href="#">Bags <span>(12)</span></a></li>
                <li><a href="#">Shoes <span>(22)</span></a></li>
                <li><a href="#">Dress <span>(37)</span></a></li>
                <li><a href="#">Accessories <span>(42)</span></a></li>
                <li><a href="#">Makeup <span>(14)</span></a></li>
                <li><a href="#">Beauty <span>(140)</span></a></li>
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 CLASS="heading">Recent Blog</h3>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 CLASS="heading">Tag Cloud</h3>
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">shop</a>
                <a href="#" class="tag-cloud-link">products</a>
                <a href="#" class="tag-cloud-link">shirt</a>
                <a href="#" class="tag-cloud-link">jeans</a>
                <a href="#" class="tag-cloud-link">shoes</a>
                <a href="#" class="tag-cloud-link">dress</a>
                <a href="#" class="tag-cloud-link">coats</a>
                <a href="#" class="tag-cloud-link">jumpsuits</a>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading">Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->

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