<?php
    require_once('db.php');

    class Find extends DBModel {
        // tim kiem user
        function findUser($str) {
            $users = [];
            $connect = $this->connect();
            // tim theo ten
            $query1 = "select * from users where name like '%".$str."%'";
            $result1 = $connect->query($query1);
            if ($result1->num_rows > 0) {
                while ($find1 = mysqli_fetch_assoc($result1)) {
                    $users[] = $find1;
                }
            }
            // tim theo email 
            $query2 = "select * from users where email like '%".$str."%'";
            $result2 = $connect->query($query2);
            if ($result2->num_rows > 0) {
                while ($find2 = mysqli_fetch_assoc($result2)) {
                    $users[] = $find2;
                }
            }
            // tim theo dia chi
            $query3 = "select * from users where address like '%".$str."%'";
            $result3 = $connect->query($query3);
            if ($result3->num_rows > 0) {
                while ($find3 = mysqli_fetch_assoc($result3)) {
                    $users[] = $find3;
                }
            }
            // tim theo sdt
            $query4 = "select * from users where phone like '%".$str."%'";
            $result4 = $connect->query($query4);
            if ($result4->num_rows > 0) {
                while ($find4 = mysqli_fetch_assoc($result4)) {
                    $users[] = $find4;
                }
            }
            return $users;
        }

        // Tim kiem san pham theo Danh muc san pham    =    Liet theo danh muc san pham
        function findProductByCategory($category_id) {
            $connect = $this->connect();
            $result = $connect->query("select * from products where category_id = $category_id");
            $products = array();
            if($result->num_rows > 0) {
                while($product = mysqli_fetch_assoc($result)) {
                    $products[] = $product;
                }
            }
            return $products;
        }

        // Tim kiem san pham
        function findProduct($str) {
            $products = array();
            $connect = $this->connect();
            // tim kiem theo ten
            $query1 = "select * from products where name like '%".$str."%'";
            $result1 = $connect->query($query1);
            if ($result1->num_rows > 0) {
                while ($find1 = mysqli_fetch_assoc($result1)) {
                    $products[] = $find1;
                }
            }
            // tim kiem theo chat lieu
            $query2 = "select * from products where material like '%".$str."%'";
            $result2 = $connect->query($query2);
            if ($result2->num_rows > 0) {
                while ($find2 = mysqli_fetch_assoc($result2)) {
                    $products[] = $find2;
                }
            }
            return $products;
        }


    }


?>