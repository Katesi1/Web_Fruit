﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UPDATE dữ liệu với FORM</title>
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
                                <a href="revenue_report.php"><i class="fa fa-eye"></i>Revenue</a>
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
    <div id="wrapper">
    <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">PRODUCT Forms</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-24">
    <div class="panel panel-info">
            <div class="panel-heading">
                UPDATE PRODUCT
            </div>
            <div class="panel-body">
            <?php 
                $tbl_product = new tbl_product();
                $product_id = $_GET["id"];
                $product = ($tbl_product->select_product($product_id))->fetch_assoc();
            ?>
    <form role="form" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="txt_name"value="<?php echo $product['name'];?>">
            </div>
            <div class="form-group">
                <label>Number</label>
                <input class="form-control" type="text" name="txt_number"value="<?php echo $product['number']; ?>">
            </div>
            <div class="form-group">
                <label>Picture</label><br>
                <img src="../../UPLOAD/<?php echo $product['Picture']; ?>" style="width:150px"> 
                <input class="form-control" type="file" name="txt_picture" value="<?php echo $product['Picture']; ?>">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="txt_Category">
                <option value="<?php echo $product['category']; ?>"> <?php echo $product['category']; ?> </option>
                   <?php 
                   $tbl_category = new tbl_category();
                   $category = $tbl_category->select_all();
                   foreach($category as $category){
                       echo "<option value='". $category["Name_cate"]."'>" . $category["Name_cate"]."</option>";
                   }
                   ?>
                </select>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" name="txt_date" value="<?php echo $product['date']; ?>">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" type="number" name="txt_Price" value="<?php echo $product['price']; ?>">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="txt_Des"> <?php echo $product['description']; ?> </textarea>
            </div>      
                 <input type="submit" name="btnSave" id="btnSave" value="Lưu dữ liệu" />
        </form>
    <?php
    if(isset($_POST['btnSave'])) {
        move_uploaded_file($_FILES["txt_picture"]["tmp_name"], "../../UPLOAD/" . $_FILES["txt_picture"]["name"]);
            // $product_id,
            // $name = $_POST["txt_name"];
            // $number = $_POST["txt_number"];
            // $category = $_POST["txt_Category"];
            // $date = $_POST["txt_date"];
            // $price = $_POST["txt_Price"];
            // $picture_path = $_FILES["txt_picture"]["name"];
            // $des = $_POST["txt_Des"];

            // $tbl_product = new tbl_product();
            // if($tbl_product->update($product_id,$name, $number, $picture_path, $category, $date, $price, $des)) {
            //     echo "<script> alert('Sửa thành công') </script>";
            //     header('location:select_product.php');
            // } else {
            //     echo "<script> alert('Sửa thất bại') </script>";
            // }
            if($tbl_product->update(
                $product_id,
                $_POST["txt_name"],
                $_POST["txt_number"],
                $_FILES["txt_picture"]["name"],
                $_POST["txt_Category"],
                $_POST["txt_date"],
                $_POST["txt_Price"],
                $_POST["txt_Des"]
            )) {
                echo "<script> alert('Sửa sản phẩm thành công'); window.location = 'product_select.php'</script>";
            }
    }
    ?>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
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