<?php

include "../config/db.php";
include "../helper/helper.php";

$data = array();
$Query = "SELECT * FROM `todos`";
$QueryResult = $conn->query($Query);
$QueryResultRows = $QueryResult->num_rows;

$todos = [];

if ($QueryResultRows > 0) {
    while ($row = $QueryResult->fetch_assoc()) {
        $todos[] = $row;
    }
}

$data = array(
    "success" => true,
    "data" => $todos
);

api_response($data);
