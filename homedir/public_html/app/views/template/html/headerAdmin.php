<style>
    <?php include APPROOT.'/views/template/css/header.css'; ?>
</style>
<script src="https://kit.fontawesome.com/2ce63962ec.js" crossorigin="anonymous"></script>
<div class="header">
    <div class="hd-top">
        <div class="hd-left">
            <a href="#"><i class="fas fa-building"></i>Về trang sức doji</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i>Hệ thống phân phối</a>
            <a href="#"><i class="fas fa-phone"></i>0345613201</a>
        </div>
        <div class="hd-mid">
            <a href="https://catsecure.vn"><img src="/img/logo-t.png" alt="logo ahm"></a>
        </div>
        <div class="hd-right">
            <div id="userid" class="user" style="display: inline-block; margin-right: 50px;">
                <span class="user-title"><i class="fas fa-user-circle"></i>Tài khoản</span>
                <div class="user-setting">
                    <a href="#">Thông tin tài khoản</a>
                    <a href="#">Đổi mật khẩu</a>
                    <a href="<?php echo URLROOT; ?>/logins/logout">Đăng xuất</a>
                </div>
            </div>
            <div class="search">
                <form action="#">
                    <input id="search-field" type="text" required placeholder="Tìm kiếm sản phẩm" onfocus="focusSearchField(this)" onblur="blurSearchField(this)">
                    <button class="search-button"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="hd-navigation-collection" id="navbar">
    <ul>
        <li id="logo-nav"><a href="https://catsecure.vn"><img src="/img/logo-t.png" alt="logo"></a></li>
        <li class="nav-item"><h1><a href="#">Thêm sản phẩm</a></h1></li>
        <li class="nav-item"><h1><a href="#">Quản lý đơn hàng</a></h1></li>
    </ul>
</div>
<script>
    function focusSearchField(x) {
        x.parentNode.style.borderColor = "rgb(241, 110, 110)";
    }
    function blurSearchField(x) {
        x.parentNode.style.borderColor = "rgba(122, 120, 120, 0.151)";
    }

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