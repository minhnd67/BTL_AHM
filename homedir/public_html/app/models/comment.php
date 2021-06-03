<?php 
    require_once('db.php');

    class Comment extends DBModel {
        function index($product_id) {
            $connect = $this->connect();
            $result = $connect->query("select * from comments where product_id = $product_id");
            $comments = array();
            if ($result->num_rows > 0) {
                while ($comment = mysqli_fetch_assoc($result)) {
                    $comments[] = $comment;
                }
            }
            return $comments;
        }

        function store($data) {
            $connect = $this->connect();
            $query = "insert into comments (user_id, product_id, content) value('".
                        $data['user_id']."','".
                        $data['product_id']."','".
                        $data['content']."')";
            $result = $connect->query($query);
            if($result) {
                return "Them binh luan thanh cong";
            }
            else {
                return "Them binh luan that bai";
            }
        }

        function update($id, $data) {
            $connect = $this->connect();
            $query = "update comments set content = '".$data['content']."', updated_at = '".date('Y-m-d H:i:s')."' where id = $id";
            $result = $connect->query($query);
            if($result) {
                return "Chinh sua binh luan thanh cong";
            }
            else {
                return "Chinh sua binh luan that bai";
            }
        }

        function destroy($id) {
            $connect = $this->connect();
            $result = $connect->query("delete from comments where id = $id");
            if($result) {
                return "Xoa binh luan thanh cong";
            }
            else {
                return "Xoa binh luan that bai";
            }
        }
    }

    $testComment = new Comment();
    // print_r($testComment->index(1));
    $data = [
        'user_id' => 1,
        'product_id' => 1,
        'content' => 'san pham cuc ki dep pppp',
    ];
    // print_r($testComment->store($data));
    print_r($testComment->update(6, $data));
    // print_r($testComment->destroy(5))
?>