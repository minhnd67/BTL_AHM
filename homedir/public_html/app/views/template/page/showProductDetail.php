<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <style>
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
            height: 13px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgb(243, 82, 82);
        }
    </style>
    <div>
        <?php 
            include APPROOT . '/views/template/html/header.php';
            include APPROOT . '/views/template/html/showAllProductDetail.php';
            include APPROOT . '/views/template/html/mainFooter.php';
        ?>
    </div>
</body>
</html>