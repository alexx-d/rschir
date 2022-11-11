<?php

function getPosts($connection){
    $orders = $connection->query("SELECT * FROM orders");
    $ordersList = [];
    while ($order = mysqli_fetch_assoc($orders)){
        $ordersList[] = $order;
    }
    echo json_encode($ordersList);  
}

function getPost($connection, $id){
    $order = $connection->query("SELECT * FROM orders WHERE orderID = $id");
    if (mysqli_num_rows($order) === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => 'Order not found'
        ];
        echo json_encode($res);
    }
    else{
        $order = mysqli_fetch_assoc($order);
        echo json_encode($order);    
    }
}

function addOrder($connection, $data){
    if(empty($data['name']) || empty($data['order'])){
        http_response_code(400);
        $res = [
            "status" => false,
            "message" => 'Some data is not filled'
        ];
    
        echo json_encode($res);
        return;
    }

    $name = $data['name'];
    $order = $data['order'];
    $order = $connection->query("INSERT INTO orders VALUE (NULL, '$name', '$order')");

    http_response_code(201);
    $res = [
        "status" => true,
        "orderID" => mysqli_insert_id($connection)
    ];

    echo json_encode($res);
}

function updateOrder($connection, $id, $data){
    if(empty($data['name']) || empty($data['order'])){
        http_response_code(400);
        $res = [
            "status" => false,
            "message" => 'Some data is not filled'
        ];
    
        echo json_encode($res);
        return;
    }

    $name = $data['name'];
    $order = $data['order'];
    $connection->query("UPDATE `orders` SET `name` = '$name', `order` = '$order' WHERE `orderID` = '$id'");

    http_response_code(200);
    $res = [
        "status" => true,
        "message" => 'Order is updated'
    ];

    echo json_encode($res);
}

function deletePost($connection, $id){
    $connection->query("DELETE FROM orders WHERE orderID=$id");
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => 'Order is deleted'
    ];

    echo json_encode($res);
}