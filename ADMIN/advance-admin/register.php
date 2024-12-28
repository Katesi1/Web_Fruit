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
                <a class="navbar-brand" href="index.html">COMPANY NAME</a>
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
                        <h1 class="page-head-line">Basic Forms</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-24">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           BASIC FORM
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Enter Username</label>
                                            <input class="form-control" type="text" name="txt_username">
                                            <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Password</label>
                                            <input class="form-control" type="password" name="txt_password">
                                            <p class="help-block">Help password here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Retype Password</label>
                                            <input class="form-control" type="password">
                                            <p class="help-block">Help password here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Choose Gender</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="txt_gender" id="gender_male" value="male" checked=""> Male
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="txt_gender" id="gender_female" value="female"> Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Choose Address</label>
                                            <select class="form-control" name="txt_address">
                                                <option value="Hà Nội">Hà Nội</option>
                                                <option value="TP.Hồ Chí Minh">TP.Hồ Chí Minh</option>
                                                <option value="Đà Nẵng">Đà Nẵng</option>
                                                <option value="Điện Biên">Điện Biên</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Choose Hobby</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="txt_hobby[]" value="Football">Football
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="txt_hobby[]" value="Code">Code
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="txt_hobby[]" value="Shopping">Shopping
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Avatar</label>
                                            <input class="form-control" type="file" name="txt_avatar">
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Email</label>
                                            <input class="form-control" type="text" name="txt_email">
                                            </div>
                                        </div>    
                                        <div class="panel-body">                   
                                        <button type="submit" class="btn btn-info" name="btn_submit">Send Message </button>
                                    </form>

                                    <?php 
                                        include("controls.php");

                                        if(isset($_POST["btn_submit"])) {
                                            move_uploaded_file($_FILES["txt_avatar"]["tmp_name"], "../../UPLOAD/" . $_FILES["txt_avatar"]["name"]);

                                            $username = $_POST["txt_username"];
                                            $password = $_POST["txt_password"];
                                            $gender = $_POST["txt_gender"];
                                            $address = $_POST["txt_address"];
                                            $hobbies = $_POST["txt_hobby"];
                                            $avatar_path = $_FILES["txt_avatar"]["name"];
                                            $email = $_POST["txt_email"];

                                            $hobby_str = "";
                                            
                                            if(isset($hobbies)) {
                                                foreach($hobbies as $hobby) {
                                                    $hobby_str .= ($hobby . " ");
                                                }                                                
                                            }
                                            
                                            $tbl_user = new tbl_user();
                                            if($tbl_user->insert($username, $password, $gender, $address, $hobby_str, $avatar_path, $email)) {
                                                echo "<script> alert('đăng ký thành công') </script>";
                                            } else {
                                                echo "<script> alert('đăng ký thất bại') </script>";
                                            }
                                        }
                                    ?>
                            </div>
                        </div>
                            </div>
<!-- <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           SINGUP FORM
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                        
                                 <div class="form-group">
                                            <label>Enter Email</label>
                                            <input class="form-control" type="text">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                            <div class="form-group">
                                            <label>Enter Password</label>
                                            <input class="form-control" type="password">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                <div class="form-group">
                                            <label>Re Type Password </label>
                                            <input class="form-control" type="password">
                                     <p class="help-block">Help text here.</p>
                                        </div>
                                 
                                        <button type="submit" class="btn btn-danger">Register Now </button>

                                    </form>
                            </div>
                        </div>
                            </div>
        </div>  -->
             <!--/.ROW-->
             <!-- <div class="row">
                 <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-primary">
                        <div class="panel-heading">
                           FORM ELEMENTS
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                            <label>Select Example</label>
                                            <select class="form-control">
                                                <option>One Vale</option>
                                                <option>Two Vale</option>
                                                <option>Three Vale</option>
                                                <option>Four Vale</option>
                                            </select>
                                        </div>
                            <hr>
                            <div class="form-group">
                                            <label>Multiple Select Example</label>
                                            <select multiple="" class="form-control">
                                                <option>One Vale</option>
                                                <option>Two Vale</option>
                                                <option>Three Vale</option>
                                                <option>Four Vale</option>
                                            </select>
                                        </div>
                            <hr>
                            <div class="form-group">
                                            <label>Checkboxes</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox Example One
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox Example Two
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox Example Three
                                                </label>
                                            </div>
                                  <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox Example Four
                                                </label>
                                            </div>
                                        </div>
                            <hr>
                            <div class="form-group">
                                            <label>Radio Button Examples</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Radio Example One
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio Example Two
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Example Three
                                                </label>
                                            </div>
                                        </div>
                            </div>
                        </div>
                            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-default">
                        <div class="panel-heading">
                           OTHER ELEMENTS FOR FORM
                        </div>
                        <div class="panel-body">
                            
                            <form role="form">
                                Some Message Examples
                                <br />
                                        <div class="form-group has-success">
                                            <label class="control-label" for="success">SUCCESS EXAMPLE</label>
                                            <input type="text" class="form-control" id="success" />
                                        </div>
                                        <div class="form-group has-warning">
                                            <label class="control-label" for="warning">WARNING EXAMPLE</label>
                                            <input type="text" class="form-control" id="warning" />
                                        </div>
                                        <div class="form-group has-error">
                                            <label class="control-label" for="error">ERROR EXAMPLE</label>
                                            <input type="text" class="form-control" id="error" />
                                        </div>
                                    </form>
                            <hr>
                            Other Group Examples
                            <br>
                            <form role="form">
                                  <div class="input-group">
      <span class="form-group input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
      <input type="text" class="form-control" />
    </div>
<br />
                                           <div class="input-group">
     
      <input type="text" class="form-control" />
                                                <span class="form-group input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
                                         </form>
                            <hr>
                            <form role="form">
                                            <div class="form-group">
                                                <label for="disabledInput">Disabled input</label>
                                                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled="">
                                            </div>
                                            
                                            
                                    </form>
                            <hr />
                            For more customization for this template or its components please visit official bootstrap website i.e getbootstrap.com or
                            <a href="http://getbootstrap.com/components/" target="_blank">click here</a> 
                            </div> -->
                        </div>
                            </div>

        </div>

            </div>
            <!-- /. PAGE INNER -->
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
