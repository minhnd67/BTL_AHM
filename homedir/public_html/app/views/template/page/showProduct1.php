<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        <?php 
            include APPROOT . '/views/template/css/showProduct1.css'
        ?>
    </style>
</head>
<body>
<div class="show-product-1">
    <div class="show-product-1-container">
        <?php
            include APPROOT . '/views/template/html/header.php'
        ?>
        <img src="img/ngoc-trai-1920x703-copy1.jpg" alt="banner" width="100%">
        <?php
            include APPROOT . '/views/template/html/show-list-product.php';
            include APPROOT . '/views/template/html/mainFooter.php'
        ?>
    </div>
</div>
</body>
</html>
