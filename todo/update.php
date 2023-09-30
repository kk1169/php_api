<?php

include "../config/db.php";
include "../helper/helper.php";

$data = array();

if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['assigned_id']) && isset($_POST['status'])) {

    $todo_id = $_GET['id'];
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $assigned_id = $conn->real_escape_string($_POST['assigned_id']);
    $status = $conn->real_escape_string($_POST['status']);

    $Query = "UPDATE `todos` SET `title`='$title', `description`='$description', `assigned_id`='$assigned_id', `status`='$status' WHERE id=$todo_id";
    $QueryResult = $conn->query($Query);


    if ($QueryResult) {
        $data = array(
            "success" => true,
            "message" => "Todo updated successfully.",
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
