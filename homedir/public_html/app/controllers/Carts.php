<?php
class Carts extends Controller {
    public function __construct() {
        $this->cartModel = $this->model('cart');
        $this->proModel = $this->model('product');
        $this->imgModel = $this->model('image_product');
    }

    public function add($params){
        
        // $userID = $params[0];
        // $proID = $parmas[1];
        // $amount = $_POST['ahm_sl'];
        if(isset($_SESSION['user_id'])){
            $data = [
                'user_id'   => $params[0],
                'product_id'=> $_SESSION['proDetail_id'],
                'amount'    => $_POST['ahm_sl']
            ];
            unset($_SESSION['proDetail_id']);
            $a = $this->cartModel->store($data);
            return die($a);
        }

    }
    
    public function delete($params){
        if(isset($_SESSION['user_id'])){
            
            $a = $this->cartModel->destroy($params[0]);
            return die($a);
        }
    }
    

    public function showCart(){
        if(isset($_SESSION['user_id'])){
            $product_ids = $this->cartModel->index($_SESSION['user_id']);
        // var_dump($product_ids);
            $cart = [];
            foreach($product_ids as $value) {
                $temp = [];
                
                $product =  $this->proModel->show($value['product_id']);
                $temp['name'] = $product['name'];
                $temp['description'] = $product['description'];
                $temp['material'] = $product['material'];
                $temp['price'] = $product['price'];
                $temp['amount'] = $value['amount'];
                // var_dump($product);
                $imgs = $this->imgModel->index($value['product_id']);
                if (count($imgs) > 0) {
                    $img = $imgs[0];
                    $temp['imgs'] = $img['link'];
                }
                $temp['id'] = $value['id'];
                // var_dump($imgs);
                // var_dump($temp);
                $cart[] = $temp;
            }
            require_once APPROOT.'/views/find/cart.php';
            $cartv = new cartView();
            $cartv->showCart($cart);
            
            $_SESSION['sl'] = 0;
            foreach($cart as $sp) {
                $_SESSION['sl'] = $_SESSION['sl'] + 1;
                $_SESSION['sp'.$_SESSION['sl']] = $sp;
            }
        }
        else{
            echo '<script>alert("Bạn chưa đăng nhập")</script>';
            header('location:' . URLROOT );
            
        }
    }
    
}
