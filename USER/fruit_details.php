<?php 
  include('../ADMIN/advance-admin/controls.php');
    session_start();

  $tbl_product = new tbl_product();
  $product = ($tbl_product->select_product($_GET["id"]))->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Ninom</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <div class="brand_box">
      <a class="navbar-brand" href="index.html">
        <span>
          Ninom
        </span>
      </a>
    </div>
    <!-- end header section -->
  </div>

  <!-- nav section -->

  <section class="nav_section">
    <div class="container">
      <div class="custom_nav2">
        <nav class="navbar navbar-expand custom_nav-container ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="fruit.php">Our Fruit </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="testimonial.php">Testimonial</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                  <?php 
                    if(!empty($_SESSION["username"])) {
                      echo "<p style='color: white; margin: 0;'>" . $_SESSION["username"] . "</p>";
                      echo "<a class='nav-link' href='logout.php'>Logout</a>";
                    } else {
                      echo "<a class='nav-link' href='login.php'>Login</a>";
                    }
                  ?>                 
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cart.php">Cart</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </section>

  <!-- end nav section -->


  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="offset-lg-2 col-md-10 offset-md-1">
          <div class="heading_container">
            <hr>
            <h2>
              <?php echo $product["name"] ?>
            </h2>
          </div>
        </div>
      </div>

      <div class="layout_padding2-top">
        <div class="row">
            <div class="col-lg-4 offset-lg-2 col-md-5 offset-md-1">          
              <img src="../UPLOAD/<?php echo $product['Picture'] ?>" alt="" style="width: 465px;">
            </div>
            <form method="POST">
              <div class="contact_form-container">
                <div class="col-md-6 px-0">
                <table>
                  <tr> 
                    <td style="width: 300px;"> Đơn giá </td>
                    <td> <?php echo $product['price'] ?> </td>
                  </tr>
                  <tr> 
                      <td> Loại </td>
                      <td> <?php echo $product['category'] ?> </td>
                  </tr>
                  <tr> 
                      <td> Số lượng tồn kho </td>
                      <td> <?php echo $product['number'] ?> </td>
                  </tr>
                </table>
                <br>
                <br>
                <br>                  
                <div class="form-group">
                  <label>Số lượng : </label>
                  <input class="form-control" type="number" name="txt_number" style="width: 500px;" value="1">
                </div>
                <br>
                <br> 
                <button type="submit" name="btn_submit"> Mua ngay </button>
                <a href="fruit.php" style="float: left; margin-top: 20px;"> 
                  << Tiếp tục mua hàng
                </a> 
              </div>
            </form>

            <?php 
              if(isset($_POST["btn_submit"])) {
                if(!empty($_SESSION["username"])) {
                  if($_POST["txt_number"] <= $product['number']) {
                    if(empty($_SESSION["orders"])) {
                      $_SESSION["orders"] = array(array("product" => $product, "number_buy" => $_POST["txt_number"]));
                    } else {
                      array_push($_SESSION["orders"], array("product" => $product, "number_buy" => $_POST["txt_number"]));
                    }
                    echo "
                      <script>
                        if(confirm('Thêm vào giỏ hàng thành công, chuyển đến giỏ hàng?')) {
                          window.location = 'cart.php';
                        }  
                      </script>
                      ";
                  } else {
                    echo "<script> alert('Không thể mua quá số lượng tồn kho') </script>";
                  }
                } else {
                  echo "<script> window.location = 'login.php' </script>";
                }
              }
            ?>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->


  <!-- info section -->
  <section class="info_section layout_padding">
    <div class="container">
      <div class="info_logo">
        <h2>
          NiNom
        </h2>
      </div>
      <div class="info_contact">
        <div class="row">
          <div class="col-md-4">
            <a href="">
              <img src="images/location.png" alt="">
              <span>
                Passages of Lorem Ipsum available
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/call.png" alt="">
              <span>
                Call : +012334567890
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/mail.png" alt="">
              <span>
                demo@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
            <form action="">
              <input type="text" placeholder="Enter your email">
              <button>
                subscribe
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="info_social">
            <div>
              <a href="">
                <img src="images/facebook-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/twitter-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>

</body>

</html>