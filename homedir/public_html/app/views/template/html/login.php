<style>
    <?php 
        include APPROOT . '/views/template/css/login.css'
    ?>
</style>
<div class="login" id="loginid-form">
    <div class="header-login">Đăng nhập</div>
    <div class="login-form">
        <form action="<?php echo URLROOT; ?>/logins/login" method="post">
            <table>
                <tr>
                    <td class="label"><label for="user">Tài khoản</label><span style="color: red;">*</span></td>
                    <td><input type="text" id="email" name="email" required> </td>
                </tr>
                <tr>
                    <td class="label"><label for="pass">Mật khẩu</label><span style="color: red;">*</span></td>
                    <td><input type="password" id="password" name="password" required> </td>                        
                </tr>
            </table>
            <div class="forgot-password">
                <a href= "#" >Quên mật khẩu?</a>
            </div>
            <button name = "submit" id = "submit" value = "submit">Đăng nhập</button>        
        </form>
        <div class="register">
            <span>Bạn chưa có tài khoản? </span>
            <a href="#">Đăng ký</a>
            <span>ngay tại đây</span>
        </div>   
    </div> 
</div>
