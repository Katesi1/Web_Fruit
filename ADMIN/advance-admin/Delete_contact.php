<?php
    include("controls.php");
    $tbl_contact = new tbl_contact();
    if($tbl_contact->delete($_GET["id"])){
        echo"<script> alert('Xóa thành công')</script>";
        header('location:contact_select.php');
    }else{
        echo"<script> alert('Xóa kh thành công')</script>";
    }
?>