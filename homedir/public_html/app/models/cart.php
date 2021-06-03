<?php 
    require_once('db.php');

    class Cart extends DBModel {
        function index($user_id) {
            $connect = $this->connect();
            $result = $connect->query("select * from carts where user_id = $user_id");
            $products = array();
            if ($result->num_rows > 0) {
                while ($product = mysqli_fetch_assoc($result)) {
                    $products[] = $product;
                }
            }
            return $products;
        }

        function store($data) {
            var_dump($data);
            $connect = $this->connect();
            $query = "insert into carts (user_id, product_id, amount) value('".
                        $data['user_id']."','".
                        $data['product_id']."','".
                        $data['amount']."')";
            $result = $connect->query($query);
            if($result) {
                return "Them san pham thanh cong";
            }
            else {
                return "Them san pham that bai";
            }
        }

        function update($id, $amount) {
            $connect = $this->connect();
            $result = $connect->query("update carts set amount = $amount where id = $id");
            if($result) {
                return "Chinh sua so luong thanh cong";
            }
            else {
                return "Chinh sua so luong that bai";
            }
        }

        function destroy($id) {
            $connect = $this->connect();
            $result = $connect->query("delete from carts where id = $id");
            if($result) {
                return "Xoa san pham thanh cong";
            }
            else {
                return "Xoa san pham that bai";
            }
        }
    }


?>