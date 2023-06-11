<?php
$title = 'Đơn hàng - Shop KTPM';
$cart = cart_list();
if (empty($cart)) {
    header('location:.');
}

global $user_nav;
if (isset($user_nav)) $user_login = get_a_record('users', $user_nav);
$option_get_cart = array(
    'where' => 'user_id=' . $user_nav,
    'select' => '*',

);
$get_cart = get_all('orders', $option_get_cart);

//load view
require('content/views/vnpay/vnpay_return.php');