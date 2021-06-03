<?php 
    require_once('./model/db.php');
    class postModel extends DBModel {

        public function getPost() {
            $connect = $this->connect();

            $result = $connect->query('SELECT * from image;');

            $posts = array();
            if ($result->num_rows > 0) {
                while ($post = mysqli_fetch_assoc($result)) {
                    $posts[] = $post;
                }
            }

            return $posts;
        }

        public function doAddPost($post) {
            // connect to database
            $connect = $this->connect();
           
            $sql = "insert into";
            $notif = $connect->query($sql);

            
        }
    }
?>