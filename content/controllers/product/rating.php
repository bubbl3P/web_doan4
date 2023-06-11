<?php
global $linkconnectDB;

if(isset($_POST)){
    $ratingValue = $_POST['ratingValue'];
    $productID = $_POST['productID'];
    $userID = $_POST['userID'];
    $sql = "INSERT INTO recommend(user_id, product_id, rating) VALUES ('$userID','$productID','$ratingValue' )";
    $result = mysqli_query($linkconnectDB, $sql);
    echo 1;
}