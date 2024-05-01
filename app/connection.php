<?php

// function connection($server_name, $username, $password, $db_name) {
function connection() {
    // details of database
    $server_name = "localhost";
    $username = "root";
    $password = "root";
    $db_name = "blog";

    // create a connection
    $conn = new mysqli($server_name, $username, $password, $db_name);

    // check the connection
    if ($conn->connect_error) { 
        die("Connection Failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}

// ==== Test ====
// if (connection()) {
//     echo 'Connection succeed';
// }