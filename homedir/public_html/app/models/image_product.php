<?php
    require_once('db.php');

    class Image_Product extends DBModel {
        const PATH_STORE = APPROOT . '/uploads/img_product/';
        const PATH_RETURN = APPROOT . '/uploads/img_product/';

        // liet ke danh sach anh cua san pham
        function index($product_id) {
            $connect = $this->connect();
            $result = $connect->query("select * from image_product where product_id = $product_id"); 
            $imgs = array();
            if ($result->num_rows > 0) {
                while ($img = mysqli_fetch_assoc($result)) {
                    $img['link'] = self::PATH_RETURN.$img['link'];
                    $imgs[] = $img;
                }
            }
            return $imgs;
        }
        // Them anh cho san pham
        function store($product_id, $data, $file) {
            $link = self::PATH_STORE.$data['link'];
            $check_file = $link.$_FILES["fileToUpload"]["name"];
            if(!file_exists($check_file)) {
                move_uploaded_file($file["fileToUpload"]["tmp_name"], $link);
            }
            $connect = $this->connect();
            $query = "insert into image_product (product_id, link, state) value('".
                        $product_id."','".
                        $data['link']."','". 
                        $data['state']."')";
            $result = $connect->query($query);
            if($result) {
                return "Them anh thanh cong";
            }
            else {
                return "Them anh that bai";
            }
        }
        // Xoa anh
        function destroy($id) {
            $connect = $this->connect();
            $find = $connect->query("select * from image_product where id = $id");
            if($find->num_rows >0) {
                $img = mysqli_fetch_assoc($find);
                // return $img;
                $link = self::PATH_STORE."$img[link]";
                unlink($link);
                $result = $connect->query("delete from image_product where id = $id");
                if($result) {
                    return "Xoa anh thanh cong";
                }
                else {
                    return "Xoa anh that bai";
                }
            }
        }
    }


?>