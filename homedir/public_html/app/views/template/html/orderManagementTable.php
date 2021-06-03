<style>
        <?php
            include APPROOT.'/views/template/css/orderManagementTable.css';
            $code = "1";
            $buyer = "quy";
            $allPrice = "1,234,567";
            $status = "i don't know";
        ?>
</style>
<div class="orderManagement">
    <div class="product-title">
        <h2><a class="title-name" href="#">QUẢN LÝ ĐƠN HÀNG</a></h2>
    </div>
    <table>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Người mua</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        <?php
            for ($i = 0; $i < 5; $i++) {
                echo '
                    <tr>
                        <td>'.$code.'</td>
                        <td>'.$buyer.'</td>
                        <td>'.$allPrice.'</td>
                        <td>'.$status.'</td>
                        <td class="order-manipulation">
                            <a href="#">Xác nhận</a>
                            <a href="#">Xóa</a>
                        </td>
                    </tr>';
            }
            
        ?>
        
    </table>
</div>