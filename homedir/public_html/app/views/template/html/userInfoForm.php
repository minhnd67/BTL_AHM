<style>
    <?php
        include APPROOT.'/views/template/css/formCreateAccount.css';
        $name = "Phạm Đức Quý";
        $email = "quyhot1@gmail.com";
        $phone = "123456";
        $gender = 1;
        $birth = "2000-12-31";
        $address = "Khu 2 hoàng thương thanh ba phú thọ";
    ?>
</style>
<div class="form-create-account" id="register-form">
    <form action="#" method="post">
        <h2>THÔNG TIN TÀI KHOẢN</h2>
        <table>
            <tr>
                <td class="label-input"><label for="name"><b>Họ tên</b><span style="color: red">*</span></label></td>
                <td><input type="text" id="name" name="name" <?php echo 'value="'.$name.'"' ?> required></td>
            </tr>
            <tr>
                <td class="label-input"><label for="email"><b>Email</b><span style="color: red">*</span></label></td>
                <td><input type="email" id="name" name="name" <?php echo 'value="'.$email.'"' ?> required></td>
            </tr>
            <tr>
                <td class="label-input"><label for="phone"><b>Số điện thoại</b><span style="color: red">*</span></label></td>
                <td><input type="text" id="phone" name="phone"  <?php echo 'value="'.$phone.'"' ?> required></td>
            </tr>
            <tr>
                <td class="label-input"><label for="gender"><b>Giới tính</b><span style="color: red">*</span></label></td>
                <td>
                    <input type="radio" name="gender" id="male" <?php if($gender == 1) echo "checked"; ?>>
                    <label for="male">Nam</label>
                    <input type="radio" name="gender" id="female" <?php if($gender == 0) echo "checked"; ?>>
                    <label for="female">Nữ</label>
                </td>
            </tr>
            <tr>
                <td class="label-input"><label for="birth"><b>Ngày sinh</b><span style="color: red">*</span></label></td>
                <td><input type="date" id="birth" name="birth" <?php echo 'value="'.$birth.'"' ?> required></td>
            </tr>
            <tr>
                <td class="label-input"><label for="address"><b>Địa chỉ</b></label></td>
                <td><input type="text" id="address" name="address"  <?php echo 'value="'.$address.'"' ?> required></td>
            </tr>
            <tr>
                <td class="label-input"><label for="pass"><b>Mật khẩu</b><span style="color: red">*</span></label></td>
                <td><input type="password" id="pass" name="pass" required></td>
            </tr>
            <tr>
                <td class="label-input"><label for="pass"><b>Xác nhận mật khẩu</b><span style="color: red">*</span></label></td>
                <td><input type="password" id="pass" name="pass" required></td>
            </tr>
            <tr>
                <td class="label-input"></td>
                <td><button>LƯU</button></td>
            </tr>
        </table>
    </form>
</div>