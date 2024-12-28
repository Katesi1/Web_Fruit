<?php 
    include("connect.php");

    class tbl_user {
        public function insert($username, $password, $gender, $address, $hobby, $avatar_path, $email) {
            global $conn;

            $sql = "INSERT INTO user(username, password, gender, address, hobby, avatar_path, email) 
                    VALUES('$username','$password','$gender','$address','$hobby','$avatar_path','$email')";

            return mysqli_query($conn, $sql);
        }

        public function select_user($username) {
            global $conn;

            $sql = "SELECT * FROM user WHERE username='$username'";

            return mysqli_query($conn, $sql);
        }
        public function select_user_name($username)
        {
            global $conn;
            $sql = "select * from user where username='$username'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
    }
    class tbl_contact{
        public function insert_contact($Full_name, $Email, $Phone, $Message) {
            global $conn;
            $sql = "INSERT INTO user_contact(Full_name, Email, Phone, Message) 
                    VALUES('$Full_name','$Email','$Phone','$Message')";

            return mysqli_query($conn, $sql);
        }
        public function select_all() {
            global $conn;

            $sql = "SELECT * FROM user_contact";
            return mysqli_query($conn, $sql);
        }
        public function delete($user_contact_id) {
            global $conn;

            $sql = "DELETE FROM user_contact WHERE user_contact_id=$user_contact_id";
            return mysqli_query($conn, $sql);
        }
    }
    class tbl_product {
        public function insert_product($name, $number, $picture_path, $category, $date, $price, $des) {
            global $conn;

            $sql = "INSERT INTO product(name, number, Picture, category, date, price, description) 
                    VALUES('$name','$number','$picture_path','$category','$date','$price','$des')";
            return mysqli_query($conn, $sql);
        }
        public function select_all() {
            global $conn;

            $sql = "SELECT * FROM product";
            return mysqli_query($conn, $sql);
        }
        public function select_product($product_id) {
            global $conn;

            $sql = "SELECT * FROM product WHERE product_id='$product_id'";

            return mysqli_query($conn, $sql);
        }
        public function delete($id) {
            global $conn;

            $sql = "DELETE FROM product WHERE product_id=$id";
            return mysqli_query($conn, $sql);
        }
        public function update1($id,$name, $number, $picture_path, $category, $date, $price, $des) {
            global $conn;

            $sql = "UPDATE product(name, number, Picture, category, date, price, description) 
                    SET('$name','$number','$picture_path','$category','$date','$price','$des') WHERE product_id=$id ";
            return mysqli_query($conn, $sql);
        }
        public function update($product_id,$name, $number, $picture_path, $category, $date, $price, $des) {
            global $conn;

            $sql = "UPDATE product 
                    SET name = '$name', 
                        number     = $number, 
                        Picture      = '$picture_path', 
                        category     = '$category', 
                        date         = '$date', 
                        price        = $price, 
                        description  = '$des' 
                    WHERE product_id = '$product_id'";

            return mysqli_query($conn, $sql);
        }
        
        public function delete_by_category($name_cate) {
            global $conn;

            $sql = "DELETE FROM product WHERE category = '$name_cate'";

            return mysqli_query($conn, $sql);
        }
    }
    class tbl_category{
        public function insert_cate($name, $mota) {
            global $conn;

            $sql = "INSERT INTO category(Name_cate, Mota) 
                    VALUES('$name','$mota')";
            return mysqli_query($conn, $sql);
        }
        public function select_all() {
            global $conn;

            $sql = "SELECT * FROM category";
            return mysqli_query($conn, $sql);
        }
        public function select_category($id) {
            global $conn;

            $sql = "SELECT * FROM category WHERE ID_category = '$id'";

            return mysqli_query($conn, $sql);
        }
        
        public function delete($id) {
            global $conn;

            $sql = "DELETE FROM category WHERE ID_category = '$id'";

            return mysqli_query($conn, $sql);
        }

        public function update($id, $name_cate, $mota) {
            global $conn;

            $sql = "UPDATE category  
                    SET Name_cate = '$name_cate', 
                        Mota = '$mota' 
                    WHERE ID_category = '$id'";

            return mysqli_query($conn, $sql);
        }
    }
    class tbl_user_order {
        public function select_last_order() {
            global $conn;

            $sql = "SELECT * FROM user_order ORDER BY order_id DESC LIMIT 1";

            return mysqli_query($conn, $sql);
        }
        public function select_total_into_money() {
            global $conn;
        
            $sql = "SELECT *, (SELECT SUM(into_money) 
                    FROM user_order uo 
                    WHERE uo.order_id IN (SELECT DISTINCT order_id FROM order_detail)) AS total_into_money   
                    FROM user_order 
                    ORDER BY order_id DESC 
                    LIMIT 1";
            return mysqli_query($conn, $sql);
        }
        public function select_all() {
            global $conn;

            $sql = "SELECT order_id, username, order_date, into_money, status FROM user_order INNER JOIN user ON user_order.user_id = user.user_id";

            return mysqli_query($conn, $sql);
        }
        public function insert($orders, $user_id, $into_money) {
            global $conn;

            $today_date = date("Y-m-d");
            $sql = "INSERT INTO user_order(user_id, order_date, into_money,status) VALUES('$user_id', '$today_date', '$into_money','Chờ xác nhận')";

            if(mysqli_query($conn, $sql)) {
                $sql = "SELECT order_id FROM user_order ORDER BY order_id DESC LIMIT 1";
                $order_id = mysqli_query($conn, $sql)->fetch_assoc()["order_id"];

                foreach($orders as $order) {
                    try {
                        $product_id = $order["product"]["product_id"];
                        $number = $order["product"]["number"];
                        $number_buy = $order["number_buy"];
                        $sql = "INSERT INTO order_detail VALUES ('$order_id','$product_id','$number_buy')";

                        mysqli_query($conn, $sql);

                        $sql = "UPDATE product SET number = $number - $number_buy WHERE product_id = '$product_id'";

                        mysqli_query($conn, $sql);
                    }
                    catch(Exception $e) {
                        echo $e->getMessage();
                        return false;
                    }
                }

                return true;
            }

            return false;
        }
        public function delete($order_id){
            global $conn;

            $sql = "DELETE FROM user_order WHERE order_id =$order_id";
            return mysqli_query($conn, $sql);
        }
        public function select_order_products($order_id) {
            global $conn;

            $sql = "SELECT product.*, order_detail.number_buy FROM product INNER JOIN order_detail ON product.product_id = order_detail.product_id
            WHERE order_id = $order_id";
            return mysqli_query($conn, $sql);
        }
        public function select_order_user_product($order_id) {
            global $conn;

            $sql = "SELECT product.*, order_detail.* FROM product INNER JOIN order_detail ON product.product_id = order_detail.product_id
             WHERE order_id = $order_id";
            return mysqli_query($conn, $sql);
        }
        public function revenue_date($from, $to) {
            global $conn;

            $sql = "SELECT SUM(into_money) AS revenue FROM user_order WHERE order_date BETWEEN '$from' AND '$to'";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) != 0) {
                return $result->fetch_assoc()["revenue"];
            }
            return 0;
        }
        public function select_order($id) {
            global $conn;

            $sql = "SELECT order_id, username, order_date, into_money, status FROM user_order INNER JOIN user ON user_order.user_id = user.user_id WHERE order_id = '$id'";

            return mysqli_query($conn, $sql);
        }

        public function update_status($id, $status) {
            global $conn;

            $sql = "UPDATE user_order SET status = '$status' WHERE order_id = '$id'";

            return mysqli_query($conn, $sql);
        }
       
    }
    class tbl_revenue{
        public function select() {
            global $conn;

            $sql = "SELECT product.name AS Product_Name, SUM(order_detail.number_buy) AS Total_Quantity
            FROM order_detail
            INNER JOIN product ON order_detail.product_id = product.product_id
            GROUP BY order_detail.product_id;";

            return mysqli_query($conn, $sql);
        }
        }
?>