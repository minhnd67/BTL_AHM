<?php
    require_once('db.php');

    class Product extends DBModel {
        // Liet ke danh sach san pham
        function index() {
            $connect = $this->connect();
            $result = $connect->query('select * from products'); 
            $products = array();
            if ($result->num_rows > 0) {
                while ($product = mysqli_fetch_assoc($result)) {
                    $products[] = $product;
                }
            }
            return $products;
        }
        // Them san pham moi
        function store($data) {
            $connect = $this->connect();
            $query = "insert into products (category_id, name, description, material, price, amount, state) value('".
                        $data['category_id']."','".
                        $data['name']."','".
                        $data['description']."','".
                        $data['material']."','".
                        $data['price']."','".
                        $data['amount']."','".
                        $data['state']."')";
            $result = $connect->query($query);
            if($result) {
                return "Them san pham thanh cong";
            }
            else {
                return "Them san pham that bai";
            }

        }
        // Xem chi tiet san pham
        function show($id) {
            $connect = $this->connect();
            $result = $connect->query("select * from products where id = $id");
            $product = mysqli_fetch_assoc($result);
            return $product;
        }
        // Chinh sua san pham
        function update($id, $data) {
            $connect = $this->connect();
            $query = "update products set ".
                        "category_id = '".$data['category_id']."',".
                        "name = '".$data['name']."',".
                        "description = '".$data['description']."',".
                        "material = '".$data['material']."',".
                        "price = '".$data['price']."',".
                        "amount = '".$data['amount']."',".
                        "state = '".$data['state']."',".
                        "updated_at = '".date('Y-m-d H:i:s')."' where id = $id";
            $result = $connect->query($query);
            if($result) {
                return "Chinh sua san pham thanh cong";
            }
            else {
                return "Chinh sua san pham that bai";
            }
        }
        // Xoa san pham
        function destroy($id) {
            $connect = $this->connect();
            $result = $connect->query("delete from products where id = $id");
            if($result) {
                return "Xoa san pham thanh cong";
            }
            else {
                return "Xoa san pham that bai";
            }
        }
    }

    // $testProduct = new Product();
    //test index
    // print_r($testProduct->index());

    $data = [
        'category_id' => '1',
        'name' => 'Kim cuong xin vkl llldsfl',
        'description' => 'kim cuong xin nen d mo ta nhieu',
        'material' => 'kim cuong 100%',
        'price'  => 1999999,
        'amount' => 100,
        'state' => 1,
    ];

    // test store
    // print_r($testProduct->store($data));

    //test show
    // print_r($testProduct->show(1));

    // test update
    // print_r($testProduct->update(26, $data));
    // echo date('Y-m-d H:i:s').'.000000';
    // test delete
    // print_r($testProduct->destroy(18));

    // if(isset($_POST['submit'])) {
    //     echo $_FILES["fileToUpload"]["name"];
    //     $target_file = "../upload/img_product/".$_FILES["fileToUpload"]["name"];
    //     move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    // }

?>

