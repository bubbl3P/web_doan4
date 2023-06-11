<?php
require_once('content/models/products.php');
require_once('recommend.php');
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
} else show_404();
$product = get_a_record('products', $product_id);

if (!$product) {
    show_404();
} else   updateCountView($product_id);
$title = $product['product_name'] . ' -Shop KTPM';
$image_product = PATH_URL . 'public/upload/products/' . $product['img1'];
$url_product = 'product/' . $product['id'] . '-' . $product['slug'];
$categories = get_all('categories', array(
    'select' => 'id, category_name',
    'order_by' => 'id ASC'
));
$subcategories = get_a_record('subcategory', $product['sub_category_id']);
if ($product['sub_category_id'] != 0) {
    $breadCrumb = $subcategories['subcategory_name'];
}
$comment_option = array(
    'where' => 'product_id=' . $product['id'],
    'limit' => 10,
    'offset' => 0,
    'order_by' => 'id desc'
);
$comment_total_option = array(
    'where' => 'product_id=' . $product['id']
);
$comments = get_all('comments', $comment_option);
$comments_total = get_total('comments', $comment_total_option);
//load view
require('content/views/product/index.php');

$random_products_search = array(
    'where' => 'product_name',
    'limit' => 1,
);
$random_products = array_rand($random_products_search, 1);


//$matrix = array();
//$user_ids = array();
//$product_ids = array();
//global $linkconnectDB;
//$sql = "SELECT user_id, product_id, rating FROM recommend";
//$result = $linkconnectDB->query($sql);
//if ($result->num_rows > 0) {
//    while ($row = $result->fetch_assoc()) {
//        $user_id = $row["user_id"];
//        $product_id = $row["product_id"];
//        $rating = $row["rating"];
//
//        if (!in_array($user_id, $user_ids)) {
//            $user_ids[] = $user_id;
//        }
//        if (!in_array($product_id, $product_ids)) {
//            $product_id[] = $product_id;
//        }
//        $matrix[$user_id][$product_id] = $rating;
//    }
//}
//$similarityMatrix = array();
//foreach ($user_ids as $userID1) {
//    foreach ($user_ids as $userID2) {
//        if ($userID1 != $userID2) {
//            $similarityMatrix[$userID1][$userID2] = calculateSimilarity($matrix[$userID1], $matrix[$userID2]);
//        }
//    }
//}









