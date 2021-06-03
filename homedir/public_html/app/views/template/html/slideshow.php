<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="APPROOT . '/views/template/css/slideshow.css">
    <title>Document</title>
    <script>
        var slideIndex = 0; 
        var interval = setInterval(autoSlide, 2000);
        function currentSlide(x) {
            var i;
            slideIndex = x
            var slideList = document.getElementsByClassName("mySlides");
            var dotList = document.getElementsByClassName("dot");
            for (i = 0; i < dotList.length; i++) {
                dotList[i].className = dotList[i].className.replace(" active", "");
            }
            for (i = 0; i < slideList.length; i++) {
                slideList[i].style.display = "none";
            }
            slideList[slideIndex-1].style.display = "block";
            dotList[slideIndex-1].className += " active";
            clearInterval(interval);
            interval = setInterval(autoSlide, 2000);
        }

        function autoSlide() {
            var slideList = document.getElementsByClassName("mySlides");
            var dotList = document.getElementsByClassName("dot");
            for (i = 0; i < dotList.length; i++) {
                dotList[i].className = dotList[i].className.replace(" active", "");
            }
            for (i = 0; i < slideList.length; i++) {
                slideList[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slideList.length) {slideIndex = 1;}
            slideList[slideIndex - 1].style.display = "block";
            dotList[slideIndex - 1].className += " active";
        }
    </script>
</head>
<body>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="/img/cho-phu-nu-luon-tron-ven-1920x703-min.jpg" style="width:100%">
        </div>
    
        <div class="mySlides fade">
            <img src="/img/kim-cuong-vien-1920x703.jpg" style="width:100%">
        </div>
    
        <div class="mySlides fade">
            <img src="/img/wedding-land-1920x703.jpg" style="width:100%">
        </div>
        <br>
    
        <div class="dots">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>
</body>
</html>