<?php
include '../config.php';
if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $sql = "SELECT c.category_id, c.category_name, c.description,c.is_active, c.created_at, SUM(pc.sold_quantity) AS total_sold_quantity,
    COUNT(pc.product_color_id) AS total_product_colors,
    SUM(pc.sold_quantity * pc.price) AS total_revenue
    FROM category AS c
    LEFT JOIN product AS p ON c.category_id = p.category_id
    LEFT JOIN product_color AS pc ON p.product_id = pc.product_id
    GROUP BY c.category_id, c.category_name, c.description";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'addCategory') {
    $categoryName = $_POST['categoryName'];
    $description  = $_POST['description'];
    $sql = "SELECT * FROM category WHERE category_name = '$categoryName'";
    $existcategoryName = Query($sql, $connection);
    $output = "";
    if (count($existcategoryName) > 0) {
        $output .= "existCategoryName";
        echo $output;
        return;
    }
    $sql = "INSERT INTO `category` ( `category_name`, `description`) VALUES ('$categoryName','$description')";
    $data = Query($sql, $connection);
    echo "success";
}


if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $category_id = $_GET['id'];
    echo $category_id;
    $sqlProductColor = "UPDATE product_color SET is_active = 0 WHERE product_id IN (SELECT product_id FROM product WHERE category_id = $category_id)";
    $dataProductColor = Query($sqlProductColor, $connection);
    $sqlProduct = "UPDATE product SET is_active = 0 WHERE category_id = $category_id";
    $dataProduct = Query($sqlProduct, $connection);
    $sqlCategory = "UPDATE category SET is_active = 0 WHERE category_id = $category_id";
    $dataCategory = Query($sqlCategory, $connection);
    echo "success";
}


if (isset($_GET['action']) && $_GET['action'] == 'getCategoryById') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM category WHERE category_id = '$id'; ";
    $data = Query($sql, $connection);
    echo json_encode($data);
}

if (isset($_POST['action']) && $_POST['action'] == 'updateCategory') {
    $id = $_POST['id'];
    $categoryName = $_POST['categoryName'];
    $description  = $_POST['description'];
    $sql1 = "SELECT * FROM category WHERE category_name = '$categoryName' and category_id != '$id'; ";
    $existcategoryName = Query($sql1, $connection);
    $output = "";
    if (count($existcategoryName) > 0) {
        $output .= "existCategoryName";
        echo $output;
        return;
    }
    $sql = "UPDATE `category` SET `description` = '$description' ,`category_name` = '$categoryName' where category_id = '$id'";
    $data = Query($sql, $connection);
    echo "success";
}
