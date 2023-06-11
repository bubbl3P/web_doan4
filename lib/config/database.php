<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'shop_ktpm_2');
if (isset($_SESSION['user'])) {
    $user_nav = $_SESSION['user']['id'];
}
$linkconnectDB = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)
    or die("Can not connect database");
mysqli_set_charset($linkconnectDB, 'UTF8');


//$serverName = "DUYBANG\DUYBANG"; //serverName\instanceName
//
//// Since UID and PWD are not specified in the $connectionInfo array,
//// The connection will be attempted using Windows Authentication.
//$connectionInfo = array( "Database"=>"GoiYSanPham");
//$conn = sqlsrv_connect( $serverName, $connectionInfo);

//
//$sql = "SELECT * FROM Rating";
//$rs = sqlsrv_query($conn, $sql );
//while ($r = sqlsrv_fetch_array($rs)) {
//    echo $r['Idkhachhang'];
//}