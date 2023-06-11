
<?php
$title = 'Đơn hàng - Shop KTPM';
$cart = cart_list();
if (empty($cart)) {
	header('location:.');
}
global $user_nav;
if (isset($user_nav)) $user_login = get_a_record('users', $user_nav);
//load view
require('content/views/vnpay/vnpay_red.php');