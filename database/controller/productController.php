<?php
include '../config.php';
if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $sql = "SELECT p.product_id, p.product_name, p.description, p.created_at, c.category_name,p.is_active, SUM(pc.sold_quantity) AS total_sales, 
    SUM(pc.sold_quantity * pc.price) AS total_revenue, ROUND(AVG(r.star)) AS average_rating FROM product AS p LEFT JOIN category AS c 
    ON p.category_id = c.category_id LEFT JOIN product_color AS pc ON p.product_id = pc.product_id LEFT JOIN review AS r 
    ON pc.product_color_id = r.product_color_id GROUP BY p.product_id, p.product_name, p.description, c.category_name;";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'addProduct') {
    $productName = $_POST['productName'];
    $category = $_POST['category'];
    $description  = $_POST['description'];
    $sql = "SELECT * FROM product WHERE product_name = '$productName' and `category_id` = '$category'";
    $existProductName = Query($sql, $connection);
    $output = "";
    if (count($existProductName) > 0) {
        $output .= "existProductName";
        echo $output;
        return;
    }
    $sql = "INSERT INTO `product` ( `product_name`,`category_id`, `description`) VALUES ('$productName','$category','$description')";
    $data = Query($sql, $connection);
    echo "success";
}


if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $sql = "UPDATE product SET is_active = 0 WHERE product_id = $id";
    $data = Query($sql, $connection);
    $sql1 = "UPDATE product_color SET is_active = 0 WHERE product_id = $id";
    $data = Query($sql1, $connection);
    echo "success";
}

if (isset($_GET['action']) && $_GET['action'] == 'getCategories') {
    $sql = "SELECT * FROM category ";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'getProductById') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE product_id = '$id'; ";
    $data = Query($sql, $connection);
    echo json_encode($data);
}

if (isset($_POST['action']) && $_POST['action'] == 'updateProduct') {
    $id = $_POST['id'];
    $productNameUpdate = $_POST['productName'];
    $categoryUpdate = $_POST['category'];
    $descriptionUpdate  = $_POST['description'];
    $sql1 = "SELECT * FROM product WHERE product_name = '$productNameUpdate' and `category_id` = '$categoryUpdate' and product_id != '$id'; ";
    $existProductName = Query($sql1, $connection);
    $output = "";
    if (count($existProductName) > 0) {
        $output .= "existProductName";
        echo $output;
        return;
    }
    $sql = "UPDATE `product` SET `description` = '$descriptionUpdate', `product_name` = '$productNameUpdate', `category_id` = '$categoryUpdate' WHERE `product_id` = '$id'";
    $data = Query($sql, $connection);
    echo "success";
}



