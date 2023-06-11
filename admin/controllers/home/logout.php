
<?php
require_once('content/models/cart.php');
global $user_nav;
$user_login = get_a_record('users', $user_nav);
if ($user_login['role_id'] == 0) {
    unset($_SESSION['user']);
    cart_destroy();
    header('location:index.php');
} else {
    unset($_SESSION['user']);
    cart_destroy();
    header('location:index.php');
}
