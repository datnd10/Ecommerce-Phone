<?php
include '../config.php';
if (isset($_POST['action']) && $_POST['action'] == 'checkout') {
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address  = $_POST['address'];
    $shipping = $_POST['shipping'];
    $message = $_POST['message'];
    $totalOrder  = $_POST['totalOrder'];
    $sqlOrder = "INSERT INTO `order` ( `total_money`, `name`, `address`, `phone`, `message`, `shipping`, `user_id`) VALUES ('$totalOrder','$name','$address','$phone','$message','$shipping','$user_id')";
    $dataOrder = Query($sqlOrder, $connection);
    $sqlOrderId = "SELECT order_id FROM `order`  WHERE user_id = '$user_id' ORDER BY order_id DESC LIMIT 1;";
    $dataOrderId = Query($sqlOrderId, $connection);

    $orderId;

    foreach ($dataOrderId as $row) {
        $orderId =  $row['order_id'];
    }

    $sqlCart = "SELECT * FROM cart WHERE user_id = '$user_id'";
    $dataCart = Query($sqlCart, $connection);

    foreach ($dataCart as $row) {
        $product_color_id = $row['product_color_id'];
        $quantity = $row['quantity'];
        $sqlProductColor = "SELECT * FROM product_color WHERE product_color_id = '$product_color_id'";
        $dataProduct = Query($sqlProductColor, $connection);
        foreach ($dataProduct as $row) {
            $quantityChange =  $row['quantity'] - $quantity;
            $update = " UPDATE product_color SET quantity = '$quantityChange', sold_quantity = '$quantity' WHERE product_color_id = '$product_color_id'";
            $dataUpdate = Query($update, $connection);
        }

        $updateOrderDetail = "INSERT INTO `order_detail` ( `order_id`, `product_color_id`, `quantity`) VALUES ('$orderId','$product_color_id','$quantity')";
        $dataOrderDetail = Query($updateOrderDetail, $connection);

        $deleteCart = "DELETE FROM cart WHERE user_id = '$user_id'";
        $delete = Query($deleteCart, $connection);
    }
    echo "success";
}

if (isset($_GET['action']) && $_GET['action'] == 'getUserOrder') {
    session_start();
    $data = $_SESSION['account'];
    $userData = json_decode($data, true);
    $user_id = $userData[0]['user_id'];
    $sql = "SELECT * FROM `order` WHERE user_id = '$user_id'";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'getAllOrder') {
    session_start();
    $data = $_SESSION['account'];
    $userData = json_decode($data, true);
    $user_id = $userData[0]['user_id'];
    $sql = "SELECT * FROM `order`";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'userGetOrderDetail') {
    session_start();
    if (isset($_SESSION['account'])) {
        $userData = json_decode($_SESSION['account'], true);
        $user_id = $userData[0]['user_id'];

        if (isset($_GET['orderId'])) {
            $orderId = $_GET['orderId'];
            $sql = "SELECT * FROM `order` WHERE user_id = '$user_id' AND order_id = '$orderId'";
            $data = Query($sql, $connection);

            if (empty($data)) {
                echo "notPermission";
                return;
            }
            $sqlDetail = "SELECT 
            od.quantity,
            p.product_name,
            pc.color,
            pc.price,
            pc.product_color_id,
            pi.image
        FROM 
            order_detail od
        JOIN 
            product_color pc ON od.product_color_id = pc.product_color_id
        JOIN 
            product p ON pc.product_id = p.product_id
        LEFT JOIN (
            SELECT 
                pc.product_color_id,
                MIN(pi.image) AS image
            FROM 
                product_color pc
            JOIN 
                product_image pi ON pc.product_color_id = pi.product_color_id
            GROUP BY 
                pc.product_color_id
        ) AS pi ON pc.product_color_id = pi.product_color_id
        WHERE
            od.order_id = $orderId;";
            $dataDetail = Query($sqlDetail, $connection);
            $result = [
                'information' => $data,
                'detail' => $dataDetail
            ];
            echo json_encode($result);
        } else {
            echo "orderId is not set";
        }
    } else {
        echo "Session data not set";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'getOrderDetail') {
    session_start();
    if (isset($_SESSION['account'])) {
        $userData = json_decode($_SESSION['account'], true);
        $user_id = $userData[0]['user_id'];
        if (isset($_GET['orderId'])) {
            $orderId = $_GET['orderId'];
            $sql = "SELECT 
            o.*,
            u.avatar,
            u.email
        FROM 
            `order` o
        JOIN 
            `user` u ON o.user_id = u.user_id
        WHERE order_id = '$orderId'";
            $data = Query($sql, $connection);
            $sqlDetail = "SELECT 
            od.quantity,
            p.product_name,
            pc.color,
            pc.price,
            pi.image
        FROM 
            order_detail od
        JOIN 
            product_color pc ON od.product_color_id = pc.product_color_id
        JOIN 
            product p ON pc.product_id = p.product_id
        LEFT JOIN (
            SELECT 
                pc.product_color_id,
                MIN(pi.image) AS image
            FROM 
                product_color pc
            JOIN 
                product_image pi ON pc.product_color_id = pi.product_color_id
            GROUP BY 
                pc.product_color_id
        ) AS pi ON pc.product_color_id = pi.product_color_id
        WHERE
            od.order_id = $orderId;";
            $dataDetail = Query($sqlDetail, $connection);
            $result = [
                'information' => $data,
                'detail' => $dataDetail
            ];
            echo json_encode($result);
        } else {
            echo "orderId is not set";
        }
    } else {
        echo "Session data not set";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'getStatus') {
    $order_id = $_GET['id'];
    $sql = " SELECT `status` FROM `order` where order_id = $order_id";
    $data = Query($sql, $connection);
    echo json_encode($data);
}

if (isset($_POST['action']) && $_POST['action'] == 'updateStatus') {
    $order_id = $_POST['id'];
    $status = $_POST['status'];
    $sql = "UPDATE `order` SET `status` = '$status' WHERE `order_id` = $order_id;";
    $data = Query($sql, $connection);
    echo "success";
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $order_id = $_GET['id'];
    $sqlStatus = " SELECT `status` FROM `order` where order_id = $order_id";
    $dataStatus = Query($sqlStatus, $connection);
    foreach ($dataStatus as $row) {
        if (isset($row['status'])) {
            $status = $row['status'];
        }
    }
    if ($status == "received" || $status == "reviewed") {
        echo "failed";
        return;
    }

    $sqlDetail = "SELECT * FROM `order_detail` WHERE `order_id` = $order_id;";
    $dataDetail = Query($sqlDetail, $connection);
    foreach ($dataDetail as $row) {
        $quantityOrder = $row['quantity'];
        $color_id = $row['product_color_id'];
        $sqlProduct = "SELECT * FROM `product_color` WHERE `product_color_id` = $color_id;";
        $dataProduct = Query($sqlProduct, $connection);
        foreach ($dataProduct as $row1) {
            $quantity = $row1['quantity'];
            $soldQuantity = $row1['sold_quantity'];
        }
        $newQuantity = $quantity + $quantityOrder;
        $newSoldQuantity = $soldQuantity - $quantityOrder;
        $sqlUpdate = "UPDATE `product_color` SET `quantity` = $newQuantity, `sold_quantity` = '$newSoldQuantity' WHERE `product_color_id` = $color_id";
        $dataUpdate = Query($sqlUpdate, $connection);
    }
    $sql = "UPDATE `order` SET `status` = 'canceled' WHERE `order_id` = $order_id;";
    $data = Query($sql, $connection);
    echo "success";
}


