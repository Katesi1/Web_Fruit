<?php 
  include('controls.php');
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>MIA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Prata&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	
  </head>

<body class="sub_page">
  <!-- Nav -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a style="color:#427D9D" class="navbar-brand" href="index.php">
			<span style="color:#427D9D" class="flaticon-lotus"></span>MIA DAY AH!</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active">
				<a style="color:#3C5B6F" href="index.php" class="nav-link">Home</a>
			</li>
	          <li class="nav-item">
				<a style="color:#3C5B6F" href="about.php" class="nav-link">About</a>
			</li>
	          <li class="nav-item">
				<a style="color:#3C5B6F" href="treatments.php" class="nav-link">My mark</a>
			</li>
	          <li class="nav-item">
				<a style="color:#3C5B6F" href="specialists.php" class="nav-link">Reference</a>
			</li>
	          <li class="nav-item">
				<a style="color:#3C5B6F" href="pricing.php" class="nav-link">Order </a>
			</li>
	          <li class="nav-item">
				<a style="color:#3C5B6F;" href="cart.php" class="nav-link">Cart</a></li>
			</li>
	          <li class="nav-item">
				<a style="color:#3C5B6F;" href="contact.php" class="nav-link">Contact</a>
			</li>
			<li class="nav-item">
				<a style="color:#3C5B6F;" href="login.php" class="nav-link">Login</a>
			</li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="offset-lg-2 col-md-10 offset-md-1">
          <div class="heading_container">
            <hr>
            <h2>
              Cart
            </h2>
          </div>
        </div>
      </div>

      <div class="layout_padding2-top">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-1">
            <form action="" method="POST">
              <div class="contact_form-container">
                <div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tên hàng</th>
                                            <th>Hình ảnh</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sum = 0;
                                            if(!empty($_SESSION["order"])) {
                                                $i = 0;
                                                foreach($_SESSION["order"] as $order) {    
                                                    $sum += $order["product"]["price"] * $order["quantity"];                                                     
                                        ?>
                                                    <tr> 
                                                        <td> 
                                                            <?php echo $order["product"]["name"] ?> 
                                                        </td>
                                                        <td> 
                                                            <img src="images/<?php echo $order["product"]["picture"] ?>" alt="" style="width: 100px;">
                                                        </td>
                                                        <td> 
                                                            <?php echo $order["product"]["price"] ?> 
                                                        </td>
                                                        <td> 
                                                            <div class="form-group">
                                                              <label>Số lượng : </label>
                                                              <input type="number" name="number" style="margin: 0; width: 300px; border-radius: 10px;" value="<?php echo $order["quantity"] ?>">
                                                              <br>

                                                              <button 
                                                                type="button" 
                                                                name="btn_update"
                                                                onclick="
                                                                  if(confirm('Sửa số lượng mua sản phẩm này?')) {
                                                                    let number = document.getElementsByName('number')[<?php echo $i ?>].value;
                                                                    window.location = 'update_order.php?id=<?php echo $i ?>&number=' + number;
                                                                  }"
                                                                >
                                                                Update
                                                              </button> 

                                                              &nbsp;&nbsp;&nbsp;

                                                              <button 
                                                                type="button" 
                                                                name="btn_delete"
                                                                onclick="                                                               
                                                                  if(confirm('Xóa sản phẩm này ra khỏi giỏ hàng?')) {
                                                                    window.location = 'delete_order.php?id=<?php echo $i ?>';
                                                                  }"
                                                                >
                                                                Delete
                                                              </button> 
                                                            </div>                                                          
                                                        </td>
                                                    </tr>
                                        <?php 
                                                    $i += 1;
                                                }
                                            }
                                        ?>
                                        
                                        <tr> 
                                          <td colspan="4" style="text-align: right;"> 
                                            <?php echo "Thành tiền : ". $sum ?>
                                          </td>
                                        </tr>

                                        <tr>
                                            <td style="text-align: right;" colspan="4">
                                              <h5>
                                                <a href="fruit.php" style="float: left; margin-top: 20px;"> 
                                                  << Tiếp tục mua hàng
                                                </a> <br>
                                              </h5>
                                              <button type="submit" name="btn_submit">
                                                Đặt hàng
                                              </button>
                                            </td>
                                        </tr>
                                        <tr>
                                          <td>
                                          <h5>
                                            <a href="order.php" style="float: left; margin-top: 20px;">
                                            << Đơn Hàng
                                            </a>
                                          </h5>
                                          </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  <div>
                  </div>
                </div>
              </div>
            </form>

            <?php
                if(isset($_POST["btn_submit"])) {
                    if(!empty($_SESSION["order"])) {
                        $tbl_user_order = new tbl_user_order();
                        $tbl_user = new tbl_user();
                        $user_id = $tbl_user->select_user($_SESSION["username"])->fetch_assoc()["user_id"];

                        if($tbl_user_order->insert($_SESSION["order"], $user_id, $sum)) {
                            $_SESSION["order"] = array();
                            echo "<script> alert('Đặt hàng thành công') </script>";                           
                            echo "<script> window.location = 'cart.php' </script>";
                        } else {
                            echo "<script> alert('Lỗi') </script>";
                        }
                    }
                }         
            ?>
          </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <section class="ftco-counter img" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="2560">0</strong>
		              	<span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="60">0</strong>
		              	<span>Treatments</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="50">0</strong>
		              	<span>Years of Experience</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="100">0</strong>
		              	<span>Lesson Conducted</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h3 class="subheading">Blog</h3>
            <h2 class="mb-1">Recent Posts</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="d-flex align-items-center pt-2 mb-4">
              		<div class="one">
              			<span class="day">25</span>
              		</div>
              		<div class="two">
              			<span class="yr">2019</span>
              			<span class="mos">September</span>
              		</div>
              	</div>
                <h3 class="heading mt-2"><a href="#">Is wellness the new luxury</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="d-flex align-items-center pt-2 mb-4">
              		<div class="one">
              			<span class="day">25</span>
              		</div>
              		<div class="two">
              			<span class="yr">2019</span>
              			<span class="mos">September</span>
              		</div>
              	</div>
                <h3 class="heading mt-2"><a href="#">Is wellness the new luxury</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="d-flex align-items-center pt-2 mb-4">
              		<div class="one">
              			<span class="day">25</span>
              		</div>
              		<div class="two">
              			<span class="yr">2019</span>
              			<span class="mos">September</span>
              		</div>
              	</div>
                <h3 class="heading mt-2"><a href="#">Is wellness the new luxury</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <section class="ftco-gallery ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h3 class="subheading">Gallery</h3>
            <h2 class="mb-1">See the latest photos</h2>
          </div>
        </div>
    		<div class="row">
					<div class="col-md-3 ftco-animate">
						<a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>



  <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <ul class="ftco-footer-social list-unstyled float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://www.facebook.com/miadangodayne"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/innisfreeofficial/"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Phương Pháp</h2>
              <ul class="list-unstyled">
                <li><a href="#">Trị Liệu Bằng Tinh dầu</a></li>
                <li><a href="#">Chăm Sóc Da</a></li>
                <li><a href="#">Spa Thảo Môc</a></li>
                <li><a href="#">Body Massage</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About MIA</h2>
              <ul class="list-unstyled">
                <li><a href="about.php">About</a></li>
                <li><a href="#">Our Spa</a></li>
                <li><a href="treatments.php">Treatments</a></li>
                <li><a href="specialists.php">Specialists</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">1410 Láng Hạ - Đống Đa - Hà Nội</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+84 983612782</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">Mia14102003@gmail.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p class="mb-0">
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>
                document.write(new Date().getFullYear());

              </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </footer>
    
  

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
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
</body>

</html>