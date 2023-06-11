<?php
// Hàm tính toán độ tương đồng Pearson
function calculateSimilarity($ratings1, $ratings2)
{
    // Lấy danh sách các khóa của mảng ratings1 và ratings2
    $keys1 = array_keys($ratings1);
    $keys2 = array_keys($ratings2);

    // Lấy danh sách các khóa chung
    $commonKeys = array_intersect($keys1, $keys2);

    // Tính toán số lượng phần tử
    $count = count($commonKeys);

    // Kiểm tra nếu không có phần tử chung giữa hai mảng
    if ($count == 0) {
        return 0;
    }

    // Tính tổng điểm của các rating
    $sum1 = 0;
    $sum2 = 0;

    // Tính tổng bình phương của các rating
    $sumSq1 = 0;
    $sumSq2 = 0;

    // Tính tổng tích các rating
    $productSum = 0;

    foreach ($commonKeys as $key) {
        $rating1 = $ratings1[$key];
        $rating2 = $ratings2[$key];

        $sum1 += $rating1;
        $sum2 += $rating2;
        $sumSq1 += $rating1 * $rating1;
        $sumSq2 += $rating2 * $rating2;
        $productSum += $rating1 * $rating2;
    }

    // Tính toán độ tương đồng Pearson
    $numerator = $productSum - ($sum1 * $sum2 / $count);
    $denominator = sqrt(($sumSq1 - ($sum1 * $sum1 / $count)) * ($sumSq2 - ($sum2 * $sum2 / $count)));

    if ($denominator == 0) {
        return 0; // Để tránh chia cho 0
    }

    $similarity = $numerator / $denominator;

    return $similarity;
//    print_r($similarity);
}

?>
