<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <style>
        <?php
            include APPROOT . '/views/template/css/mainIndex1.css';
        ?>
        *:focus {
            outline: none;
        }

        * {
            box-sizing: border-box;
            font-size: 16px;
            font-family: sans-serif, Verdana, arial;
        }

        body {
            width: 100%;
            margin: 0 auto;
            padding-top: 20px;
        }

        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgb(243, 82, 82);
        }
        .cartLeft {
            float: left;
            width: 70%;
        }

        .cartRight {
            float: right;
            width: 30%
        }

        .container {
            width: 90%;
            margin: auto;
            margin-top: 20px;
            margin-bottom: 30px
        }
    </style>
</head>
<body>
    <div class="cart">
        <?php
            include APPROOT . '/views/template/html/header.php';
        ?>
        <div class="container clearfix">
            <div class="cartLeft clearfix">
                <div class="product-title">
                    <h2><b class="title-name">GIỎ HÀNG</b></h2>
                </div>
                <?php
                    $payment = 0;
                    for ($j = 0; $j < count($cart); $j++) {
                        include APPROOT . '/views/template/html/productInCart.php';
                        $payment += $allPrice;
                    }
                ?>
            </div>
            <div class="cartRight">
                <?php
                    $count = 0;
                    for ($i = strlen($payment) - 1; $i != 0 ; $i--) {
                        $count++;
                        if ($count % 3 == 0) {
                            $payment = substr_replace((string)$payment, ",", $i, 0);
                        }
                    }
                    include APPROOT . '/views/template/html/paymentform.php';
                ?>
            </div>
        </div>
        <?php
            include APPROOT . '/views/template/html/mainFooter.php';
        ?>
    </div>
</body>
</html>