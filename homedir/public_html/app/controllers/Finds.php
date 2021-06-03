<?php
class Finds extends Controller {
    public function __construct() {
        $this->findModel = $this->model('Find');
        
    }

    public function find_product(){
        
        $name = $this->findModel->findProduct($_POST['search']);
        
        require_once APPROOT. '/views/find/product.php';
        $abu = new findProductView();
        // $abu->nameP($name);
        die($name[0]);
    }
}