<?php
// Hàm gợi ý sản phẩm cho người dùng
function recommendProducts($userID, $similarityMatrix, $matrix, $products, $numOfRecommendations)
{
    $userRatings = $matrix[$userID]; // Đánh giá của người dùng
    $recommendedProducts = array(); // Mảng lưu trữ các sản phẩm được gợi ý

    // Duyệt qua các người dùng tương tự với người dùng hiện tại
    foreach ($similarityMatrix[$userID] as $similarUserID => $similarity) {
        // Lấy đánh giá của người dùng tương tự
        $similarUserRatings = $matrix[$similarUserID];

        // Duyệt qua các sản phẩm mà người dùng tương tự đã đánh giá
        foreach ($similarUserRatings as $productID => $rate) {
            // Kiểm tra sản phẩm chưa được người dùng hiện tại đánh giá
            if (!array_key_exists($productID, $userRatings)) {
                // Kiểm tra sản phẩm chưa được gợi ý trước đó
                if (!array_key_exists($productID, $recommendedProducts)) {
                    // Tính toán điểm gợi ý dựa trên độ tương đồng và đánh giá của người dùng tương tự
                    $recommendationScore = $similarity * $rate;

                    // Gợi ý sản phẩm với điểm gợi ý
                    $recommendedProducts[$productID] = $recommendationScore;
                } else {
                    // Tính toán điểm gợi ý mới và cộng dồn với điểm gợi ý hiện tại
                    $recommendationScore = $similarity * $rate;
                    $recommendedProducts[$productID] += $recommendationScore;
                }
            }
        }
    }

    // Sắp xếp các sản phẩm gợi ý theo điểm gợi ý giảm dần
    arsort($recommendedProducts);

    // Lấy $numOfRecommendations sản phẩm gợi ý hàng đầu
    $recommendedProducts = array_slice($recommendedProducts, 0, $numOfRecommendations, true);


     // Trả về mảng kết quả gợi ý sản phẩm
     return array_keys($recommendedProducts);
     
    // Hiển thị kết quả gợi ý sản phẩm
    foreach ($recommendedProducts as $productID => $recommendationScore) {
        $product = $products[$productID];
        echo "<h3>".$product["name"]."</h3>";
        echo "<p>".$product["description"]."</p>";
        echo "<a href='".$product["link"]."'>Xem thêm</a><br><br>";
    }
}
?>
