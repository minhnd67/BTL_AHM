<?php
class Products extends Controller {
    public function __construct() {
        $this->productModel = $this->model('product');
        $this->imgModel = $this->model('image_product');
    }

    public function show($params){
        $temp = [];
        $pro = $this->productModel->show($params[0]);
        $temp['name'] = $pro['name'];
        $temp['description'] = $pro['description'];
        $temp['material'] = $pro['material'];
        $temp['price'] = $pro['price'];
        $temp['amount'] = $pro['amount'];
        $temp['pro_id'] = $params[0];
        $imgs = $this->imgModel->index($params[0]);
        if (count($imgs) > 0) {
            $img = $imgs[0];
            $temp['imgs'] = $img['link'];       
        }
        require_once APPROOT.'/views/find/proDetail.php';
        $cartv = new proDetView();
        $cartv->show($temp);
        
        $_SESSION['detail_ahm'] = $temp;
    }
}