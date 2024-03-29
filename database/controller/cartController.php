<?php
include '../config.php';

if (isset($_POST['action']) && $_POST['action'] == 'addTocart') {
    session_start();
    $jsonData = $_SESSION['account'];
    $data = json_decode($jsonData, true);
    $user_id = $data[0]['user_id'];
    $productColor = $_POST['productColor'];
    $quantity = $_POST['quantity'];
    $inventory  = $_POST['inventory'];
    if ($inventory == 0) {
        echo "sold Out";
        return;
    }


    $checkcart = "SELECT * FROM cart WHERE product_color_id = '$productColor' and user_id = '$user_id'; ";
    $data = Query($checkcart, $connection);
    if (count($data) == 0) {
        $sqlAddcart = "INSERT INTO `cart` ( `user_id`, `product_color_id`, `quantity`) VALUES ('$user_id','$productColor','$quantity')";
        $dataAddcart = Query($sqlAddcart, $connection);
        echo "success";
        return;
    } else {
        $newQuantity = $data[0]['quantity'] + $quantity;
        if($inventory < $newQuantity) {
            $newQuantity = $inventory;
        }
        $sqlUpdatecart = "UPDATE `cart` SET `quantity` = '$newQuantity' WHERE `user_id` = '$user_id' AND `product_color_id` = '$productColor'";
        $dataUpdatecart = Query($sqlUpdatecart, $connection);
        echo "success";
        return;
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'viewcart') {
    session_start();
    $jsonData = $_SESSION['account'];
    $data = json_decode($jsonData, true);
    $user_id = $data[0]['user_id'];
    $sql = "SELECT * FROM cart WHERE user_id = '$user_id'; ";
    $data = Query($sql, $connection);
    $resultArray = [];
    foreach ($data as $row) {
        $productColor = $row['product_color_id']; // Assuming the column name is 'product_color'
        $sqlProductColor = "SELECT * FROM product_color WHERE product_color_id = '$productColor'";
        $dataProductColor = Query($sqlProductColor, $connection);

        $productId = $dataProductColor[0]['product_id'];
        $sqlProduct = "SELECT product_name FROM product WHERE product_id = '$productId'";
        $dataProduct = Query($sqlProduct, $connection);

        $sqlProductImages = "SELECT * FROM product_image WHERE product_color_id = '$productColor'";
        $dataProductImage = Query($sqlProductImages, $connection);
        $combinedData = [
            "dataProductColor" => $dataProductColor,
            "dataProduct" => $dataProduct,
            "dataProductImage" => $dataProductImage,
            "quantity" => $row['quantity'],
        ];
        $resultArray[] = $combinedData;
    }
    echo json_encode($resultArray);
}

if (isset($_POST['action']) && $_POST['action'] == 'updatecartQuantity') {
    $productColorID = $_POST['productColorID'];
    $quantity = $_POST['quantity'];
    session_start();
    $jsonData = $_SESSION['account'];
    $data = json_decode($jsonData, true);
    $user_id = $data[0]['user_id'];
    $sqlUpdatecart = "UPDATE `cart` SET `quantity` = '$quantity' WHERE `user_id` = '$user_id' AND `product_color_id` = '$productColorID'";
    $dataUpdatecart = Query($sqlUpdatecart, $connection);
}

if (isset($_POST['action']) && $_POST['action'] == 'removecartItem') {
    $productColorID = $_POST['productColorID'];
    session_start();
    $jsonData = $_SESSION['account'];
    $data = json_decode($jsonData, true);
    $user_id = $data[0]['user_id'];
    $sqlDeleteFromcart = "DELETE FROM `cart` WHERE `user_id` = '$user_id' AND `product_color_id` = '$productColorID'";
    $dataDeletecart = Query($sqlDeleteFromcart, $connection);
}