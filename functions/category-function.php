<?php
require_once("connection.php");

function getAllCategories()
{
    // connection to database
    $conn = connection();

    $sql =
        "SELECT 
        `category_id` AS `id`, 
        `category_name` AS `name`
        FROM `categories`";

    // execution
    if ($result = $conn->query($sql)) {
        while ($category = $result->fetch_assoc()) {
            $all_categories[] = $category;
        }
        return $all_categories;
    } else {
        die("Error retrieving all posts: " . $conn->error);
    }
}

function createCategory($category)
{
    // Connection to Database
    $conn = connection();

    $sql =
        "INSERT INTO `categories` (`category_name`) 
        VALUE ('$category')";

    // execution
    if ($conn->query($sql)) {
        header("refresh:0");
    } else {
        die("Error adding new product section:" . $conn->error);
    }
}
