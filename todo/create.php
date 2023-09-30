<?php

include "../config/db.php";
include "../helper/helper.php";

$data = array();

if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['assigned_id']) && isset($_POST['status'])) {
    $loggedId = $conn->real_escape_string($_POST['user_id']);
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $assigned_id = $conn->real_escape_string($_POST['assigned_id']);
    $status = $conn->real_escape_string($_POST['status']);

    $Query = "INSERT INTO `todos`(`title`,`description`,`user_id`,`assigned_id`,`status`) VALUES('$title','$description',$loggedId,$assigned_id,'$status')";
    $QueryResult = $conn->query($Query);


    if ($QueryResult) {
        $data = array(
            "success" => true,
            "message" => "Todo created successfully.",
        );
    } else {
        $data = array(
            "success" => false,
            "message" => "Something went wrong.",
        );
    }
} else {
    $data = array(
        "success" => false,
        "message" => "All fields are required"
    );
}

api_response($data);
