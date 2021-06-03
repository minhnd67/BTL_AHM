<style>
    <?php
        include APPROOT . '/views/template/css/formCreateAndUpdateProduct.css';
        $title = "Thêm sản phẩm";
    ?>
</style>
<div class="form-create-and-update">
    <form action="#" method="post">
        <div class="product-title">
            <h2 class="title-name"><?php echo $title; ?></h2>
        </div>
        <table>
            <tr>
                <td class="label-input"><label for="image">*Hình ảnh sản phẩm</label></td>
                <td><input style="border: none" type="file" id="img" name="img" accept="image/*"></td>
            </tr>
            <tr>
                <td class="label-input"><label for="name">*Tên sản phẩm</label></td>
                <td><input type="text" id="name" required></td>
            </tr>
            <tr>
                <td style="vertical-align: top" class="label-input"><label for="desc">Mô tả sản phẩm</label></td>
                <td><textarea name="desc" id="desc" rows="10" required></textarea></td>
            </tr>
            <tr>
                <td class="label-input"><label for="category">*Danh mục </label></td>
                <td>
                    <select name="category" id="category">
                        <?php
                            $categoryName = "kim cương";
                            for ($i = 0; $i < 3; $i++) {
                                if ($i == 2) {
                                    $categoryName = "Ngọc trai";
                                }
                                echo '<option value=\"'.$categoryName.'\">'.$categoryName.'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-input"><label for="brand">*Thương hiệu </label></td>
                <td><input type="text" name="brand" id="brand" required></td>
            </tr>
            <tr>
                <td class="label-input"><label for="material">*Chất liệu </label></td>
                <td><input type="text" name="material" id="material" required  ></td>
            </tr>
            <tr>
                <td class="label-input"><label for="origin">Xuất xứ </label></td>
                <td><input type="text" name="origin" id="origin"></td>
            </tr>
        </table>
        <div class="button-group">
            <a href="#">Xóa</a>
            <button type="submit">Lưu và hiển thị</button>
        </div>
        
    </form>
</div>