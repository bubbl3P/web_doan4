
<?php
//form submit
if (!empty($_POST)) {
    foreach ($_POST['number'] as $product_id => $number) {
        cart_update($product_id, $number);
        global $user_nav;
        if (isset($user_nav)) update_cart_user_db();
    }
    header('location:index.php?controller=cart');
}
$title = 'Giỏ hàng - Shop KTPM';
$cart = cart_list();
//load vieư
require('content/views/cart/index.php');
