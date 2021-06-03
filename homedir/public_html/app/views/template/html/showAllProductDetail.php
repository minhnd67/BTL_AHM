<style>
    <?php
        include APPROOT . '/views/template/css/showAllProductDetail.css';
        echo APPROOT . '/uploads/img_product/';
        if(isset($_SESSION['detail_ahm'])){
            $pro_detail = $_SESSION['detail_ahm'];
            
            unset($_SESSION['detail_ahm']);
            $_SESSION['proDetail_id'] = $pro_detail['pro_id'] ; 
            $pro_detail['imgs'] = str_replace("/home/catsecur/public_html/app/uploads/img_product","/img", $pro_detail['imgs']);
        }
    ?>
</style>
<script src="https://kit.fontawesome.com/2ce63962ec.js" crossorigin="anonymous"></script>
<div class="show-all-product-detail clearfix">
    <div class="container">
        <div class="product-image float-container">
            <img src="<?php echo $pro_detail['imgs']; ?>" alt="image">
        </div>
        <div class="product-detail float-container">
            <div style="padding: 5px"><h2><?php echo $pro_detail['name'] ?></h2></div>
            <div style="padding: 5px"><?php echo $pro_detail['description'] ?></div>
            <div class="rating" style="padding: 5px">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <div style="color: rgb(243, 82, 82);font-size: 1.5rem; padding: 5px;"><?php echo number_format($pro_detail['price']); ?></div>
            <div style="padding: 5px">*Giá có thể thay đổi tùy thuộc vào kích thước và trọng lượng thực tế của sản phẩm.</div>
            <div class="like-product" style="padding: 10px; font-size: 1.5rem; cursor:pointer; transition: 0.5s">
                <i class="far fa-heart"></i>
                <span>Yêu thích</span>
            </div>
            <form method='post' action="<?php echo URLROOT; ?>/carts/add/<?php echo $_SESSION['user_id'] ; ?>/"  class="custom-product-form">
                <div class="custom-product">
                    <div>TÙY CHỈNH SẢN PHẨM THEO</div>
                    <div class="length">
                        <label class="float-left-product" for="length-product">Kích thước (mm)</label>
                        <select id="length-product">
                            <?php 
                                echo '<option>Chọn</option>'.'<option>1</option>'.'<option>2</option>'
                            ?>
                        </select>
                    </div>
                    <div class="amount">
                        <label class="float-left-product" for="amount">Số lượng:</label>
                        <span class="minus" onClick="minus()">-</span>
                        <input id="count" name="ahm_sl" type="text" value="1"/>
                        <span class="plus" onClick="plus()">+</span>
                    </div>
                </div>
                <input type="submit" class="add-cart" value="Thêm vào giỏ hàng">
            </form>
        </div>
    </div>
</div>
<script>
    var count = 1;
    var amountCur = document.getElementById("count");
    function plus() {
        count++;
        amountCur.value = count;
    }
    function minus() {
        count--;
        if (count < 1) count = 1;
        amountCur.value = count;
    }
</script>