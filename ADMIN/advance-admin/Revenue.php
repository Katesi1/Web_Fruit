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
    <?php
        include("controls.php");
    ?>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">K.A.T.E.S.I</a>
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
                        <h1 class="page-head-line">Revenue</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="col-md-12">
                     <!--   Basic Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        
                        </div>
                        <div class="panel-body">
                            <form method="POST">
                                <table class="table">
                                    <tr>
                                        <td style="width: 500px;">
                                            <div class="form-group"> 
                                                <label> Doanh thu từ </label> 
                                                <input class="form-control" type="date" name="txt_begin_date">
                                                <label> đến </label> 
                                                <input class="form-control" type="date" name="txt_end_date" value="<?php echo date("Y-m-d") ?>">
                                            </div> 
                                        </td> 
                                        <td  style ="border-left: 2px solid; vertical-align: middle; text-align: center;">
                                            <div class="form-group">                                            
                                                <h1> 
                                                    <?php 
                                                        if(isset($_POST["btn_revenue_date"])) {
                                                            $tbl_user_order = new tbl_user_order();
                                                            
                                                            if(empty($_POST["txt_begin_date"]) || empty($_POST["txt_end_date"])) {
                                                                echo 0;
                                                            }
                                                            else {
                                                                $revenue_date = $tbl_user_order->revenue_date($_POST["txt_begin_date"], $_POST["txt_end_date"]);
                                                                echo $revenue_date; 
                                                            }                                                          
                                                        }
                                                    ?>
                                                </h1> 
                                                VNĐ                                           
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 
                                            <button type="submit" class="btn btn-info" name="btn_revenue_date"> Tính doanh thu </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <?php
                                                $tbl_revenue = new tbl_revenue();
                                                $result = $tbl_revenue->select(); 
                                                $data = [];
                                                while($row = mysqli_fetch_array($result)){
                                                    $data[] = $row;
                                                }
                                            ?>
                                        <html>
                                                <head>
                                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                                    <script type="text/javascript">
                                                    google.charts.load("current", {packages:["corechart"]});
                                                    google.charts.setOnLoadCallback(drawChart);
                                                    function drawChart() {
                                                        var data = google.visualization.arrayToDataTable([
                                                        ['Product_Name', 'Total_Quantity'],
                                                        <?php
                                                                foreach($data as $key){
                                                                echo "['" . $key['Product_Name'] . "' , " . $key['Total_Quantity'] . "],";       
                                                            }
                                                        ?>
                                                        ]);

                                                        var options = {
                                                        title: 'Biểu Đồ sản phẩm bán ra',
                                                        is3D: true,
                                                        };

                                                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                                                        chart.draw(data, options);
                                                    }
                                                    </script>
                                                </head>
                                                <body>
                                                    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                                                </body>
                                                </html>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
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
