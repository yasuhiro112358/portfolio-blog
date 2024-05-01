<?php
// require_once("connection.php");

function getAllCategories($conn)
{
    // connection to database
    // $conn = connection();

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

function getCategoryById($conn, $id)
{
    // connection to database
    // $conn = connection();

    $sql =
        "SELECT * 
        FROM `categories`
        WHERE `category_id` = $id";

    // execution
    if ($result = $conn->query($sql)) {
        while ($category = $result->fetch_assoc()) {
            return $category;
        }
    } else {
        die("Error retrieving category by ID: " . $conn->error);
    }
}


function createCategory($conn, $category)
{
    // Connection to Database
    // $conn = connection();

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

function updateCategory($conn, $category_id, $category_name)
{
    // $conn = connection();

    //SQL Code = update single record
    $sql = 
        "UPDATE `categories` 
        SET `category_name` = '$category_name' 
        WHERE `category_id` = $category_id";

    if ($conn->query($sql)) {
        header("location:categories.php");
        exit;
    } else {
        die("Error updating the category:" . $conn->error);
    }
}



function deleteCategory($conn, $category_id)
{
    // $conn = connection();

    $sql = "DELETE FROM `categories` WHERE `category_id` = $category_id";

    if ($conn->query($sql)) {
        header("location:categories.php");
        exit;
    } else {
        die("Error deleting the category: " . $conn->error);
    }
}

function getNumCategories($conn) {
    // connection to database
    // $conn = connection();

    $sql =
        "SELECT COUNT(`category_id`) AS `num_categories`
        FROM `categories`";

    // execution
    if ($result = $conn->query($sql)) {
        while ($categories = $result->fetch_assoc()) {
            $num_categories = $categories['num_categories'];
        }
        return $num_categories;
    } else {
        die("Error retrieving a number of categories: " . $conn->error);
    }
}