<?php
    require_once('db.php');

    class order extends DBModel {

        function index($limit, $offset) {
            $connect = $this->connect();
            $result = $connect->query("select * from orders limit $limit offset $offset"); 
            $orders = array();
            if ($result->num_rows > 0) {
                while ($order = mysqli_fetch_assoc($result)) {
                    $orders[] = $order;
                }
            }
            return $orders;
        } 

        function store($data) {
            $connect = $this->connect();
            $query = "insert into orders (user_id, state) value('".
                        $data['user_id']."','".
                        $data['state']."')";
            $result = $connect->query($query);
            if($result) {
                return "Them anh thanh cong";
            }
            else {
                return "Them anh that bai";
            }
        }

        function show($id) {
            $connect = $this->connect();
            $result = $connect->query("select * from orders where id = $id");
            $order = mysqli_fetch_assoc($result);
            return $order;
        }

        function listOrderOfUser($user_id) {
            $connect = $this->connect();
            $result = $connect->query("select * from orders where user_id = $user_id");
            $orders = array();
            if ($result->num_rows > 0) {
                while ($order = mysqli_fetch_assoc($result)) {
                    $orders[] = $order;
                }
            }
            return $orders;
        }

        function update($id, $state) {
            $connect = $this->connect();
            $query = "update orders set state = $state , updated_at = '".date('Y-m-d H:i:s')."' where id = $id";
            $result = $connect->query($query);
            if($result) {
                return "Chinh sua thong tin don hang thanh cong";
            }
            else {
                return "Chinh sua thong tin don hang that bai";
            }
        }
    }

    $testOder = new Order();
    // print_r($testOder->index(5, 1));
    $data = [
        'user_id' => 2,
        'state' => 1,
    ];
    // print_r($testOder->store($data));
    // print_r($testOder->listOrderOfUser(2));
    print_r($testOder->update(3, 2));
?>