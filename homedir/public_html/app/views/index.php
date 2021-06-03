
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <style>
        *:focus {
            outline: none;
        }

        * {
            font-size: 16px;
            font-family: sans-serif, Verdana, arial;
        }

        body {
            width: 100%;
            box-sizing: border-box;
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
    </style>
</head>
<body>
    <div class="main-container">
        <?php
        if(isset($_SESSION['role_id'])){
            if($_SESSION['role_id'] == 1)
                require APPROOT . '/views/template/page/mainAdmin.php';
            else
                require APPROOT . '/views/template/page/main.php';
            
        }
        else
            require APPROOT . '/views/template/page/main.php';  

        ?>
    </div>
    <script>
        window.onscroll = function() {scrollFunction()};

        var navigationBar = document.getElementById("navbar");
        var logo = document.getElementById("logo-nav");
        var stickyPosition = navigationBar.offsetTop;

        function scrollFunction() {
            if (window.pageYOffset >= stickyPosition) {
                navigationBar.classList.add("sticky")
                logo.style.display = "block"
            } else {
                navigationBar.classList.remove("sticky");
                logo.style.display = "none"
            }
        }
    </script>
</body>
</html>
