<?php 
    require_once('db.php');

    class userahm extends DBModel {
        // Liet ke dnah sach tai khoan
        function index() {
            $connect = $this->connect();
            $result = $connect->query('select * from users'); 
            $users = array();
            if ($result->num_rows > 0) {
                while ($user = mysqli_fetch_assoc($result)) {
                    $users[] = $user;
                }
            }
            return $users;
        }
        // Them tai khoan moi
        function store($data) {
            $connect = $this->connect();
            $query = "insert into users (name, email, password, phone, gender, birthday, address, role, state) 
            VALUE ('".$data['name']."','"
                    .$data['email']."','"
                    .$data['password']."','"
                    .$data['phone']."','"
                    .$data['gender']."','"
                    .$data['birthday']."','"
                    .$data['address']."','"
                    .$data['role']."','"
                    .$data['state']."')";
            $result = $connect->query($query);
            if($result) {
                return "Tao tai khoan thanh cong";
            }
            else {
                return "Tao tai khoan that bai";
            }
        }
        // Xem chi tiet tai khoan
        function show($id) {
            $connect = $this->connect();
            $query = "select * from users where id = $id";
            $result = $connect->query($query);
            $user = mysqli_fetch_assoc($result);
            return $user;
        }
        // Chinh sua tai khoan
        function update($id, $data) {
            $time = date("Y-m-d H:i:s");
            $connect = $this->connect();
            $query = "update users set ".
                        "name = '".$data['name']."',".
                        "email = '".$data['email']."',".
                        "password = '".$data['password']."',".
                        "phone = '".$data['phone']."',".
                        "gender = '".$data['gender']."',".
                        "birthday = '".$data['birthday']."',".
                        "address = '".$data['address']."',".
                        "role = '".$data['role']."',".
                        "state = '".$data['state']."',".
                        "updated_at = '".date('Y-m-d H:i:s')."' where id = $id";
            $result = $connect->query($query);
            if($result) {
                return "Chinh sua thong tin tai khoan thanh cong";
            }
            else {
                return "Chinh sua thong tin tai khoan that bai";
            }
        }
        public function findUserByEmail($email) {
            $connect = $this->connect();
            
            $query = "select * from users where email = '$email'";
            $result = $connect->query($query);
            
            //Check if email is already registered
            if(mysqli_num_rows($result) > 0) {
                return 1;
            } else {
                return 0;
        }
    }
    }


?>