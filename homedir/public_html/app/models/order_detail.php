<?php 
    require_once('db.php');

    class Order_Detail extends DBModel {
        function index($order_id) {
            $connect = $this->connect();
            $result = $connect->query("select * from order_detail where order_id = $order_id");
            $products = array();
            if ($result->num_rows > 0) {
                while ($product = mysqli_fetch_assoc($result)) {
                    $products[] = $product;
                }
            }
            return $products;
        }

        function store($data) {
            $connect = $this->connect();
            $query = "insert into order_detail (order_id, product_id, amount) value(".
                        $data['order_id'].",".
                        $data['product_id'].",".
                        $data['amount'].")";
            $result = $connect->query($query);
            if($result) {
                return "Them san pham vao don hang thanh cong";
            }
            else {
                return "Them san pham vao don hang that bai";
            }
        }

        
    }

    $testOrder_Detail = new Order_Detail();
    // print_r($testOrder_Detail->index(1));
    $data = [
        'product_id' => 2,
        'amount' => 5,
    ];
    // print_r($testOrder_Detail->store(1, $data));

?>