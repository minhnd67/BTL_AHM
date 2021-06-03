<style>
    <?php
        include APPROOT . '/views/template/css/productInCart.css';
        
        if($_SESSION['sl'] > 0){
            var_dump($_SESSION['sp'.$_SESSION['sl']]);
            $proInCart = $_SESSION['sp'.$_SESSION['sl']];
            $namePro = $proInCart['name'];
            $amount = $proInCart['amount'];
            $price = number_format($proInCart['price']);
            $link_img = $proInCart['imgs'];
            $link_img = str_replace("/home/catsecur/public_html/app/uploads/img_product","/img", $link_img);
            $_SESSION['sl'] = $_SESSION['sl'] -1;
        }
        else
            unset($_SESSION['sl']);
        
        $splitPrice = explode(",", $price);
        $allPrice = (int)implode("", $splitPrice)*$amount;
        $allPriceString = (string) $allPrice;
        $count = 0;
        for ($i = strlen($allPrice) - 1; $i != 0 ; $i--) {
            $count++;
            if ($count % 3 == 0) {
                $allPriceString = substr_replace((string)$allPriceString, ",", $i, 0);
            }
        }
        

        
        
    ?>
</style>
<div class="product-in-cart">
    <div class="item-in-cart clearfix">
        <img src="<?php echo $link_img ?>" alt="image">
        <div class="info-item-in-cart">
            <h2><?php echo $namePro; ?></h2>
            
            <div class="price">
                <div><b>Số lượng: </b><?php echo '<p class="red">'.$amount.'</p>'; ?></div>
                <div><b>Giá tiền: </b><?php echo '<p class="red">'.$price.' VNĐ </p>'; ?></div>
                <div><b>Thành tiền: </b><?php echo '<p class="red">'.$allPriceString.' VNĐ </p>'; ?></div>
            </div>
            <div class="delete-product"><a href="/carts/delete/<?php echo $proInCart['id']?>">Xóa</a></div>
        </div>
    </div>
</div>