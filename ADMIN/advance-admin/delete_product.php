<?php
    include("controls.php");
    $tbl_product = new tbl_product();
    if($tbl_product->delete($_GET["id"])){
        echo"<script> alert('Xóa sản phẩm thành công')</script>";
        header('location:product_select.php');
    }else{
        echo"<script> alert('Xóa sản phẩm kh thành công')</script>";
    }
?>