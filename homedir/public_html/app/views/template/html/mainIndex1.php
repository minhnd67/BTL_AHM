<style>
    <?php 
        include APPROOT . '/views/template/css/mainIndex1.css'
    ?>
</style>
<div class="main-index-1">
    <div class="container">
        <div class="product-title">
            <h2><a class="title-name" href="#">SẢN PHẨM NỔI BẬT</a></h2>
        </div>
        <div class="item-main-index-1">
            <?php 
                for($i = 0; $i < 7; $i++) {
                    if ($i != 2) {
                        include APPROOT . '/views/template/html/productDetail.php';
                    }
                    else {
                        echo '<a class="item-3-1" href="#"><img src="/img/tskc-ray-of-light-454x232-dXBsb2FkYmFubmVyYmFubmVyLW1lbnUyMDIwMDgxMA==-medium.jpg" alt="image"></a>';
                    }
                }
            ?>
        </div>
    </div>

</div> 