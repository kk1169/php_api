<?php

function api_response($data)
{
    header('Content-type: application/json');
    echo json_encode($data);
}
