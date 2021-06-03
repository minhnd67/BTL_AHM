<?php
    require_once('db.php');

    class Image_Comment extends DBModel {
        const PATH_STORE = '../upload/img_comment/';
        const PATH_RETURN = '..upload/img_comment';

        // liet ke anh cua 1 comment
        function index($comment_id) {
            $connect = $this->connect();
            $result = $connect->query("select * from image_comment where comment_id = $comment_id"); 
            $imgs = array();
            if ($result->num_rows > 0) {
                while ($img = mysqli_fetch_assoc($result)) {
                    $img['link'] = self::PATH_RETURN.$img['link'];
                    $imgs[] = $img;
                }
            }
            return $imgs;
        }

        // them  anh cho 1 comment
        function store($comment_id, $data, $file) {
            $link = self::PATH_STORE.$data['link'];
            $check_file = $link.$_FILES["fileToUpload"]["name"];
            if(!file_exists($check_file)) {
                move_uploaded_file($file["fileToUpload"]["tmp_name"], $link);
            }
            $connect = $this->connect();
            $query = "insert into image_comment (comment_id, link) value('".
                        $comment_id."','".
                        $data['link']."')";
            $result = $connect->query($query);
            if($result) {
                return "Them anh thanh cong";
            }
            else {
                return "Them anh that bai";
            }
        }

        // xoa anh
        function destroy($id) {
            $connect = $this->connect();
            $find = $connect->query("select * from image_comment where id = $id");
            if($find->num_rows >0) {
                $img = mysqli_fetch_assoc($find);
                // return $img;
                $link = self::PATH_STORE."$img[link]";
                unlink($link);
                $result = $connect->query("delete from image_comment where id = $id");
                if($result) {
                    return "Xoa anh thanh cong";
                }
                else {
                    return "Xoa anh that bai";
                }
            }
        }
    }

    $testImg_Comment = new Image_Comment();
    // test index
    // print_r($testImg_Comment->index(2));
    $data = [
        'link' => $_FILES["fileToUpload"]["name"],
    ];
    // test store
    // print_r($testImg_Comment->store(1, $data, $_FILES));

    //test delete
    print_r($testImg_Comment->destroy(3));
?>