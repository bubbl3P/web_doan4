
<?php
$options_hotproduct = array(
    'where' => 'totalView',
    'limit' => '8',
    'offset' => '0',
    'order_by' => 'createDate DESC'
);
$hot_products = get_all('products', $options_hotproduct);
$options_newproduct = array(
    'where' => 'product_typeid = 2',
    'limit' => '8',
    'offset' => '0',
    'order_by' => 'createDate DESC'
);
$new_products = get_all('products', $options_newproduct);
$options_saleproduct = array(
    'where' => 'product_typeid = 3',
    'limit' => '8',
    'offset' => '0',
    'order_by' => 'createDate DESC'
);
$saleoff_products = get_all('products', $options_saleproduct);
$title = 'Trang chủ - Shop KTPM';
$option_slide = array(
    'order_by' => 'id asc'
);
$slides = get_all('slides', $option_slide);
foreach ($slides as $action) {
    if ($action['status'] == 1) $idslide = $action['id'];
}
if (isset($idslide)) {
    $slide = get_a_record('slides', $idslide);
}
$options_random_products = array(
    'select' => 'product_name',
    'offset' => '0'
);
$array_products = get_all('products', $options_random_products);

$random_product_key = array_rand($array_products, 1);
$random_product_name = $array_products[$random_product_key]['product_name'];

$rc = get_rc();


////echo 1;
////$serverName = "DUYBANG\DUYBANG"; //serverName\instanceName
////// Since UID and PWD are not specified in the $connectionInfo array,
////// The connection will be attempted using Windows Authentication.
////$connectionInfo = array("Database" => "GoiYSanPham");
////$conn = sqlsrv_connect($serverName, $connectionInfo);
////
//////$conn = odbc_connect('GoiYSanPham', 'sa', '123');
////
////if (isset($_POST)){
////    $userID = $_POST['userID'];
////    $productID = $_POST['productID'];
////    $ratingValue = $_POST['ratingValue'];
////    if ($ratingValue) {
////        $sql = "INSERT INTO [Rating] ([Idkhachhang]
////      ,[Idsanpham]
////      ,[Rating]) VALUES ('$userID','$productID','$ratingValue')";
////        $rs = sqlsrv_query($conn, $sql);
////    }else{
////        echo "No";
////    }
////}
//
//


require('content/views/home/index.php');
