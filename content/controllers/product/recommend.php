<?php
//function recommendProducts($userID, $similarityMatrix, $matrix, $products, $numOfRecommendations)
//{
//    $userRatings = $matrix[$userID];
//    $recommendedProducts = array();
//    foreach ($similarityMatrix[$userID] as $similarUserID => $similarity) {
//        $similarUserRatings = $matrix[$similarUserID];
//        foreach ($similarUserRatings as $productID => $rate) {
//            if (!array_key_exists($productID, $userRatings)) {
//                if (!array_key_exists($productID, $recommendedProducts)) {
//                    $recommendationScore = $similarity * $rate;
//                    $recommendedProducts[$productID] = $recommendationScore;
//                } else {
//                    $recommendationScore = $similarity * $rate;
//                    $recommendedProducts[$productID] += $recommendationScore;
//                }
//            }
//        }
//    }
//    arsort($recommendedProducts);
//    $recommendedProducts = array_slice($recommendedProducts, 0, $numOfRecommendations, true);
//    return array_keys($recommendedProducts);
//}
//
//function calculateSimilarity($ratings1, $ratings2)
//{
//    $keys1 = array_keys($ratings1);
//    $keys2 = array_keys($ratings2);
//    $commonKeys = array_intersect($keys1, $keys2);
//    $count = count($commonKeys);
//    if ($count == 0) {
//        return 0;
//    }
//    $sum1 = 0;
//    $sum2 = 0;
//
//    $sumSq1 = 0;
//    $sumSq2 = 0;
//
//    $productSum = 0;
//    foreach ($commonKeys as $key) {
//        $rating1 = $ratings1[$key];
//        $rating2 = $ratings2[$key];
//        $sum1 += $rating1;
//        $sum2 += $rating2;
//        $sumSq1 += $rating1 * $rating1;
//        $sumSq2 += $rating2 * $rating2;
//        $productSum += $rating1 * $rating2;
//    }
//    $numerator = $productSum - ($sum1 * $sum2 / $count);
//    $denominator = sqrt(($sumSq1 - ($sum1 * $sum1 / $count)) * ($sumSq2 - ($sum2 * $sum2 / $count)));
//    if ($denominator == 0) {
//        return 0; // Để tránh chia cho 0
//    }
//
//    $similarity = $numerator / $denominator;
//
//    return $similarity;
//}
//
//
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