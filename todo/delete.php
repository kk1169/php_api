<?php

include "../config/db.php";
include "../helper/helper.php";

$data = array();

if (isset($_GET['id'])) {

    $todo_id = $_GET['id'];

    $Query = "DELETE FROM todos WHERE id=" . $_GET['id'];
    $QueryResult = $conn->query($Query);

    if ($QueryResult) {
        $data = array(
            "success" => true,
            "message" => "Todo deleted successfully.",
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
        "message" => "Todo not found"
    );
}

api_response($data);
