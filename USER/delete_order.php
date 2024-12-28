<?php
session_start();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Xóa sản phẩm có chỉ số id khỏi giỏ hàng
    if(isset($_SESSION['orders'][$id])) {
        unset($_SESSION['orders'][$id]);
    }

    // Chuyển hướng trở lại trang giỏ hàng
    header("Location: cart.php");
    exit;
} else {
    // Nếu không có id, chuyển hướng người dùng đến trang không tồn tại
    header("Location: error.php");
    exit;
}
?>
