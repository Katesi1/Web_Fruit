<?php

include ("PHPMailer/src/Exception.php");
include("PHPMailer/src/OAuth.php");
include ("PHPMailer/src/POP3.php");
include ("PHPMailer/src/PHPMailer.php");
include ("PHPMailer/src/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.png" />
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form" method="POST">
                                    <hr />
                                    <h5>Forgot Pass</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="txt_username" class="form-control" placeholder="Your Username " />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="email" name="txt_email" class="form-control"  placeholder="Your Email" />
                                        </div>
                                     <button type="submit" name="btn_submit" class="btn btn-primary">Find Now</button>
                                    <hr />
                                    Not register ? <a href="index.html" >click here </a> or go to <a href="index.html">Home</a> 
                                </form>

                                <?php

                                    include('controls.php');
                                    $get_data = new tbl_user();
                                    //$se_user = $get_data->select_user_name($_POST['txt_username']);
                                    if(isset($_POST["btn_submit"])) {
                                        if(isset($_POST["txt_username"]) && isset($_POST["txt_email"])) {
                                            $se_user = $get_data->select_user_name($_POST['txt_username']);
                                        if(empty($_POST["txt_username"])|| empty($_POST["txt_email"])){
                                                echo "<script>alert('Bạn chưa nhập đủ dữ liệu')</script>";
                                        }else{
                                                if(mysqli_num_rows($se_user) ==1)
                                                    {
                                                        foreach($se_user as $i_user)
                                                        {
                                                            // $pass = $i_user['password'];
                                                            // echo $pass;
                                                            $txt_email = $_POST["txt_email"];
                                                            echo "<script>alert('Mật Khẩu sẽ được gửi đến Email " . $txt_email . "')</script>";
                                                        }
                                                        $email = new PHPMailer(true);
                                                        try {
                                                            $email->SMTPDebug = 2;               
                                                            $email->isSMTP(); // SetMailer để sử dụng SMTP
                                                            $email->Host = 'smtp.gmail.com';  // Máy chủ gửi mail
                                                            $email->SMTPAuth = true;                
                                                            $email->Username = 'trungnguyen7358@gmail.com';                 
                                                            $email->Password = 'jvir neni pope oagg';    
                                                            $email->SMTPSecure = 'tls';                   
                                                            $email->Port = 587;                      
                                                            $email->CharSet='UTF-8';
                                                            $email->setFrom('trungnguyen7358@gmail.com');
                                                            $email->addAddress('vannt2368@gmail.com', 'Van');    
                                                            $email->isHTML(true);    
                                                            $email->Subject = '521100181';
                                                            $email->Body    = 'Dao Quang Trung';
                                                            $email->send();
                                                        echo 'Message has been sent';
                                                        } catch (Exception $e) {
                                                            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                                                        }
                                                    }
                                                else{
                                                    echo "<script>alert('Sai tên đăng nhập')</script>";
                                                }
                                            }
                                        }
                                        else{
                                            echo "<script>alert('Dữ liệu không hợp lệ')</script>";
                                        }
                                    }
                                ?>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
