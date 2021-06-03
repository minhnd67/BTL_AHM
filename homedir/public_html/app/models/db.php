<?php 

class DBModel {
    public function connect(){
        // connect to database

        $host_name = 'localhost';
        $user = 'catsecur';
        $pwd = 'Abuabu22080303';
        $database = 'catsecur_ahm2705';
        
        $conn = mysqli_connect($host_name, $user, $pwd, $database);
        mysqli_set_charset($conn, 'utf8');

        if (mysqli_connect_errno()) {
            echo 'Connect error: ' . mysqli_connect_error();
        }
        return $conn;
    }
}
