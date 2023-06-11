<?php
require('admin/views/shared/header.php');
require 'vendor/autoload.php';
include 'lib/config/sendmail_order.php';
$code_order = rand(0,9999);
if (!empty($_POST)) {
    $_SESSION['code_order'] = $code_order;
    $order = array(
        'id' => 0,
        'customer' => escape($_POST['name']),
        'province' => escape($_POST['province']),
        'address' => escape($_POST['address']),
        'phone' => escape($_POST['phone']),
        'cart_total' => $_POST['cart_total'],
        'createtime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'message' => escape($_POST['message']),
        'user_id' => intval($_POST['user_id']),
        'type' => escape($_POST['type']),
        'code_order' => $code_order,

    );
    $order_id = save('orders', $order);

    $cart = cart_list();
    //lấy sản phẩm trong session cart
    foreach ($cart as $product) {
        $order_detail = array(
            'id' => 0,
            'order_id' => $order_id,
            'product_id' => $product['id'],
            'quantity' => $product['number'],
            'price' => $product['price'],
            'type' => escape($_POST['type'])
        );
        save('order_detail', $order_detail);
    }
    cart_destroy(); //xoá cart sau khi save order db
    global $user_nav;
    if (isset($user_nav)) detroy_cart_user_db(); //xóa đồng bộ cart trên db sau khi đặt hàng
    $title = 'Đặt hàng thành công - Shop KTPM';
//
    $option_cart = array(
        'select' => '*',
        'where' => 'code_order=' . $code_order
    );
    $get_cart_to_email = get_alls('users', 'orders', 'order_detail', 'products', $option_cart);
    $data = array();
    foreach ($get_cart_to_email as $row) {
        $data[] = $row;
    }
    SendMail_Order($data);
    header("refresh:15;url=" . PATH_URL . "home");
    echo '<div style="text-align: center;padding: 20px 10px;">Đã đặt hàng thành công</div><div style="text-align: center;padding: 20px 10px;">Cảm ơn bạn đã đặt hàng của shop. Thông tin đơn hàng đã được gửi vào email bạn đã đăng ký. Vui lòng kiểm tra email để biết thêm thôg tin đơn hàng.<br>
                    Trình duyệt sẽ tự động chuyển về trang chủ sau 15s, hoặc bạn có thể click <a href="' . PATH_URL . 'home">vào đây</a>.</div>';
} else {
    header('location:.');
}
