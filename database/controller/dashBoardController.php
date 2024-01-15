<?php
    include '../config.php';
    

    $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
    $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

    $sql = "SELECT SUM(total_money) AS revenue
    FROM `order`
    WHERE status = 'received' AND YEARWEEK(created_at) = YEARWEEK(CURDATE())";
    $weekTotal = Query($sql, $connection);

    $sql = "SELECT COUNT(*) AS total_orders
    FROM `order`
    WHERE status = 'received' AND YEARWEEK(created_at) = YEARWEEK(CURDATE())";
    $totalOrder = Query($sql, $connection);

    $sql = "SELECT COUNT(*) AS total_users
    FROM `user`
    WHERE status = '1'";
    $totalUser = Query($sql, $connection);


    $sql = "SELECT status,COUNT(*) AS report
    FROM `order`
    GROUP BY status";
    $totalReport = Query($sql, $connection);


    $sql = "SELECT 
        DATE_FORMAT(created_at, '%Y-%m-%d') AS date,
        IFNULL(SUM(total_money), 0) AS revenue_per_day
        FROM (
            SELECT 
                created_at,
                total_money
            FROM `order`
            WHERE status = 'received' AND YEARWEEK(created_at) = YEARWEEK(CURDATE())
            UNION ALL
            SELECT 
                CURDATE() - INTERVAL (w + 1) DAY AS created_at,
                0 AS total_money
            FROM (
                SELECT 0 w UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6
            ) weeks
        ) subquery
        GROUP BY date
        ORDER BY date ASC";
    
    $dayOfWeek = Query($sql, $connection);
    
    $sql = "SELECT YEAR(created_at) AS year, SUM(total_money) AS total_revenue
    FROM `order`
    WHERE YEAR(created_at) BETWEEN 2024 AND 2030
    GROUP BY YEAR(created_at);";
    $totalOfYear = Query($sql, $connection);

    $sql = "SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, IFNULL(SUM(total_money), 0) AS revenue
    FROM `order`
    WHERE created_at BETWEEN '2024-01-01' AND '2024-12-31'
    GROUP BY DATE_FORMAT(created_at, '%Y-%m')
    ORDER BY month";
    $totalOfMonth = Query($sql, $connection);

    $sql = "SELECT DATE(created_at) AS date, IFNULL(SUM(total_money), 0) AS revenue
    FROM `order`
    WHERE DATE(created_at) BETWEEN '$startDate' AND '$endDate'
    GROUP BY DATE(created_at)";
    $totalOfDay = Query($sql, $connection);

    
    $result = [
        'revenue' => $weekTotal[0]['revenue'],
        'total_order' => $totalOrder[0]['total_orders'],
        'total_user' => $totalUser[0]['total_users'],
        'total_report' => $totalReport,
        'totalOfYear'=> $totalOfYear,
        'totalOfMonth' => $totalOfMonth,
        'totalOfDay' => $totalOfDay
    ];
    echo json_encode($result);


?>