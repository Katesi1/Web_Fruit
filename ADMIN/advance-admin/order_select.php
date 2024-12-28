<?php 
    include("controls.php");
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">K.A.T.E.SI</a>
            </div>

            <div class="header-right">

              <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


             </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                    <div class="user-img-div">
                            <img src="../../UPLOAD/meomeo.jpg" class="img-thumbnail" />

                            <div class="inner-text">
                                Katesi
                            <br />
                                <small>Xin chào</small>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-yelp"></i> Category <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="category_select.php"><i class="fa fa-eye"></i>Category list</a>
                            </li>
                            <li>
                                <a href="category_register.php"><i class="fa fa-plus "></i>Add new category</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-yelp"></i> Product <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="product_select.php"><i class="fa fa-eye"></i>Product list</a>
                            </li>
                            <li>
                                <a href="product.php"><i class="fa fa-plus "></i>Add new Product</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="order_select.php"><i class="fa fa-yelp "></i>Orders</a>
                    </li>
                    <li>
                        <a href="contact_select.php"><i class="fa fa-yelp "></i>Contacts</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-yelp "></i> Report <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="Warehouses.php"><i class="fa fa-eye"></i>Warehouses</a>
                            </li>
                            <li>
                                <a href="Revenue.php"><i class="fa fa-eye"></i>Revenue</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="login.php"><i class="fa fa-sign-in "></i>Login</a>
                    </li>
                    <li>
                        <a href="register.php"><i class="fa fa-sign-in "></i>Register</a>
                    </li>

                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Data Table</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
               
                <div class="col-md-12">
                     <!--   Basic Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Orders
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Order date</th>
                                            <th>Into money</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $tbl_user_order = new tbl_user_order();
                                            $orders = $tbl_user_order->select_all();
                                            
                                            foreach($orders as $order) {                                                                                       
                                        ?>

                                        <tr> 
                                            <td> <?php echo $order["order_id"] ?> </td>
                                            <td> <?php echo $order["username"] ?> </td>
                                            <td> <?php echo $order["order_date"] ?> </td>
                                            <td> <?php echo $order["into_money"] ?> </td>
                                            <td> 
                                                <select id="status_opt_<?php echo $order["order_id"] ?>"> 
                                                    <option> <?php echo $order["status"] ?> </option>
                                                    <option> --------------- </option>
                                                    <option value="Chờ xác nhận"> Chờ xác nhận </option>
                                                    <option value="Đang vận chuyển"> Đang vận chuyển </option>
                                                    <option value="Giao thành công"> Giao thành công </option>
                                                    <option value="Đã hủy"> Đã hủy </option>
                                                </select>    
                                                
                                                <button 
                                                    onclick="
                                                        let status = document.getElementById('status_opt_<?php echo $order['order_id'] ?>').value;
                                                        window.location = 'order_status_update.php?id=<?php echo $order['order_id'] ?>&stt=' + status;
                                                    "
                                                >Cập nhật trạng thái
                                                </button>
                                            </td>
                                            <td> <a href="order_details.php?id=<?php echo $order['order_id'] ?>">Xem chi tiết</a> </td>
                                        </tr>

                                        <?php 
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  -->
                </div>
            </div>
            
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
