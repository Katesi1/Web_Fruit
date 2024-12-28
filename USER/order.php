<?php 
  include('../ADMIN/advance-admin/controls.php');
  session_start();
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
          K.A.T.E.S.I
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
                  <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item">
                  <?php 
                    if(!empty($_SESSION["username"])) {
                      echo "<p style='color: white; margin: 0;'> " . $_SESSION["username"] . "</p>";
                      echo "<a class='nav-link' href='logout.php'>Logout</a>";
                    } else {
                      echo "<a class='nav-link' href='login.php'>Login</a>";
                    }
                  ?>                 
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
              Order
            </h2>
          </div>
        </div>
      </div>

      <div class="layout_padding2-top">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-1">
            <div class="panel panel-default">
              <div class="panel-body">
                <?php 
                  $tbl_user = new tbl_user();
                  $tbl_user_order = new tbl_user_order();

                  $user = $tbl_user->select_user($_SESSION["username"])->fetch_assoc(); 
                  $order = $tbl_user_order->select_last_order()->fetch_assoc();
                  $order1 = $tbl_user_order->select_total_into_money()->fetch_assoc();
                ?>

                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr> 
                        <td> Tên khách hàng </td>
                        <td> <?php echo $user["username"] ?> </td>
                      </tr>

                      <tr> 
                        <td> Địa chỉ </td>
                        <td> <?php echo $user["address"] ?> </td>
                      </tr>

                      <tr> 
                        <td> Ngày đặt </td>
                        <td> <?php echo $order["order_date"] ?> </td>
                      </tr>
                      <tr>
                        <td colspan="2" style="text-align: left; font-weight : bold;"> Danh sách sản phẩm </td>
                      </tr>

                      <tr>
                        <table class="table">
                          <tr>
                            <th>Tên hàng</th>
                            <th>Hình ảnh</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Trạng Thái</th>
                          </tr>

                          <?php 
                            $order_products = $tbl_user_order->select_order_products($order["order_id"]);
                            foreach($order_products as $product) {
                          ?>
                          <tr> 
                            <td> <?php echo $product["name"] ?> </td>
                            <td> 
                              <img src="../UPLOAD/<?php echo $product["Picture"] ?>" alt="" style="width: 80px;">
                            </td>
                            <td> <?php echo $product["price"] ?> </td>
                            <td> <?php echo $product["number_buy"] ?> </td>
                            <td> <?php echo $order["status"]?></td>
                          </tr>                  
                          <?php 
                            }
                          ?>
                          <tr>
                            <td>
                              <td colspan="5" style="text-align: right;"> 
                                <?php echo "Thành tiền : ". $order1["into_money"] ?>
                              </td>
                            </td>
                          </tr>   
                        </table>
                      <tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
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
          K.A.T.E.S.I
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