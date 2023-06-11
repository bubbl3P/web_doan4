
<?php
require('config/database.php');
require('config/config.php');
//lấy giá trị bảng theo id
function get_a_record($table, $id, $select = '*')
{
    $id = intval($id);
    global $linkconnectDB;
    $sql = "SELECT $select FROM `$table` WHERE id=$id";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $data = NULL;
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        mysqli_free_result($query);
    }
    return $data;
}
//lấy giá trị bảng theo yêu cầu tuỳ ý của option
function get_all_s($table, $options = array())
{
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
    global $linkconnectDB;
    $sql = "SELECT $select FROM `$table` $where $order_by $limit";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));


    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data = [
                'status' => 200,
                'message' => 'Success',
                'data' => $row,
            ];
        }
        mysqli_free_result($query);
    }
    header("HTTP/1.0 200 OK");
    return json_encode($data);
}

function get_all($table, $options = array())
{
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
    global $linkconnectDB;
    $sql = "SELECT $select FROM `$table` $where $order_by $limit";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $data = array();

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysqli_free_result($query);
    }
    return $data;

}

function get_alls($table1, $table2,$table3,$table4, $options = array())
{
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
    global $linkconnectDB;
    $sql = "SELECT $select FROM `$table1` INNER JOIN `$table2` ON $table1.id = $table2.user_id INNER JOIN $table3 ON $table2.id = $table3.order_id INNER JOIN $table4 ON $table3.product_id = $table4.id WHERE $table2.$where";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $data = array();

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysqli_free_result($query);
    }
    return $data;

}

function get_total($table, $options = array())
{
    global $linkconnectDB;
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $sql = "SELECT COUNT(*) as total FROM `$table` $where";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $row = mysqli_fetch_assoc($query);
    return $row['total'];
}

function get_total_prices_net($table, $options = array())
{
    global $linkconnectDB;
    $where = isset($options['where']) ? $options['where'] : '';
    $sql = "SELECT SUM(cart_total) as total FROM `$table` WHERE $where";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $row = mysqli_fetch_array($query);
    return $row['total'];
}

function get_total_prices_gross($table, $options = array())
{
    global $linkconnectDB;
    $where = isset($options['where']) ? $options['where'] : '';
    $sql = "SELECT SUM(cart_total) as total FROM `$table` WHERE $where";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $row = mysqli_fetch_array($query);
    return $row['total'];
}
function get_total_cod_net($table, $options = array())
{
    global $linkconnectDB;
    $where = isset($options['where']) ? $options['where'] : '';
    $sql = "SELECT SUM(cart_total) as total FROM `$table` WHERE $where";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $row = mysqli_fetch_array($query);
    return $row['total'];
}

function get_total_cod_gross($table, $options = array())
{
    global $linkconnectDB;
    $where = isset($options['where']) ? $options['where'] : '';
    $sql = "SELECT SUM(cart_total) as total FROM `$table` WHERE $where";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $row = mysqli_fetch_array($query);
    return $row['total'];
}
function get_total_vnpay_net($table, $options = array())
{
    global $linkconnectDB;
    $where = isset($options['where']) ? $options['where'] : '';
    $sql = "SELECT SUM(cart_total) as total FROM `$table` WHERE $where";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $row = mysqli_fetch_array($query);
    return $row['total'];
}

function get_total_vnpay_gross($table, $options = array())
{
    global $linkconnectDB;
    $where = isset($options['where']) ? $options['where'] : '';
    $sql = "SELECT SUM(cart_total) as total FROM `$table` WHERE $where";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $row = mysqli_fetch_array($query);
    return $row['total'];
}

function save($table, $data = array())
{
    $values = array();
    global $linkconnectDB;
    foreach ($data as $key => $value) {
        $value = mysqli_real_escape_string($linkconnectDB, $value);
        $values[] = "`$key`='$value'";
    }
    $id = intval($data['id']);
    if ($id > 0) {
        $sql = "UPDATE `$table` SET " . implode(',', $values) . " WHERE id=$id";
    } else {
        $sql = "INSERT INTO `$table` SET " . implode(',', $values);
    }
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $id = ($id > 0) ? $id : mysqli_insert_id($linkconnectDB);
    return $id;
}
function save_and_get_result($table, $data = array())
{
    $values = array();
    global $linkconnectDB;
    foreach ($data as $key => $value) {
        $value = mysqli_real_escape_string($linkconnectDB, $value);
        $values[] = "`$key`='$value'";
    }
    $sql = "INSERT INTO `$table` SET " . implode(',', $values);
    $result = mysqli_query($linkconnectDB, $sql);
    if (!$result) {
        $result = mysqli_error($linkconnectDB);
    }
    echo $result;
}
//lựa chọn bảng theo một mảng
function select_a_record($table, $options = array(), $select = '*')
{
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
    global $linkconnectDB;
    $sql = "SELECT $select FROM `$table` $where $order_by $limit";
    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $data = NULL;
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        mysqli_free_result($query);
    }
    return $data;
}
function get_time($timePost, $timeReply)
{
    $datePost = date_parse_from_format('Y:m:d H:i:s', $timePost);
    $dateReply = date_parse_from_format('Y:m:d H:i:s', $timeReply);
    $tsPost = mktime($datePost['hour'], $datePost['minute'], $datePost['second'], $datePost['month'], $datePost['day'], $datePost['year']);
    $tsReply = mktime($dateReply['hour'], $dateReply['minute'], $dateReply['second'], $dateReply['month'], $dateReply['day'], $dateReply['year']);
    $distance = $tsReply - $tsPost;

    switch ($distance) {
        case ($distance < 60):
            $result = ($distance == 1) ? $distance . ' second ago' : $distance . ' seconds ago';
            break;
        case ($distance >= 60 && $distance < 3600):
            $minute = round($distance / 60);
            $result = ($minute == 1) ? $minute . ' minute ago' : $minute . ' minutes ago';
            break;
        case ($distance >= 3600 && $distance < 86400):
            $hour = round($distance / 3600);
            $result = ($hour == 1) ? $hour . ' hour ago' : $hour . ' hours ago';
            break;
        case (round($distance / 86400) == 1):
            $result = 'Yesterday at ' . date('H:i:s', $tsReply);
            break;
        default:
            $result = date('d/m/Y \a\t H:i:s', $tsPost);
            break;
    }
    return $result;
}

function get_rc()
{
    require_once 'content/controllers/home/similarity.php';
    require_once 'content/controllers/home/recommendation.php';
    $matrix = array();
    $userIDs = array();
    $productIDs = array();
    $recommendedProducts = array();
    // Lấy dữ liệu từ cơ sở dữ liệu
    global $linkconnectDB;
    global $user_nav;
    $sql = "SELECT user_id, product_id, rating FROM recommend";
    $result = $linkconnectDB->query($sql);

    // Duyệt qua các dòng dữ liệu từ kết quả truy vấn
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $userID = $row["user_id"];
            $productID = $row["product_id"];
            $rate = $row["rating"];

            // Lưu trữ userID vào mảng userIDs nếu chưa tồn tại
            if (!in_array($userID, $userIDs)) {
                $userIDs[] = $userID;
            }

            // Lưu trữ productID vào mảng productIDs nếu chưa tồn tại
            if (!in_array($productID, $productIDs)) {
                $productIDs[] = $productID;
            }

            // Đánh giá của người dùng cho sản phẩm
            $matrix[$userID][$productID] = $rate;
        }
    }

    // //Hiển thị ma trận đánh giá
    //

    // Hàm tính toán ma trận tương tự
    $similarityMatrix = array();
    foreach ($userIDs as $userID1) {
        foreach ($userIDs as $userID2) {
            if ($userID1 != $userID2) {
                $similarityMatrix[$userID1][$userID2] = calculateSimilarity($matrix[$userID1], $matrix[$userID2]);
            }
        }
    }
    // Xử lý yêu cầu gợi ý từ người dùng
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($user_nav)) {
        $userID = $user_nav;

        // Kiểm tra nếu người dùng hợp lệ
        if (in_array($userID, $userIDs)) {

            // Gợi ý sản phẩm cho người dùng
            $recommendedProducts = recommendProducts($userID, $similarityMatrix, $matrix, $productIDs, 5);

        }
    }
    return $recommendedProducts;

}
