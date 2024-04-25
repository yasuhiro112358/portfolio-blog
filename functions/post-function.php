<?php
require_once("connection.php");

function getAllPosts()
{
    // connection to database
    $conn = connection();

    $sql =
        "SELECT 
        `posts`.`post_id` AS `id`, 
        `posts`.`post_title` AS `title`,
        `accounts`.`username` AS `author`,
        `categories`.`category_name` AS `category`,
        `posts`.`date_posted` AS `date_posted`
        FROM `posts`
        INNER JOIN `accounts` ON `posts`.`account_id` = `accounts`.`account_id`
        INNER JOIN `categories` ON `posts`.`category_id` = `categories`.`category_id`";

    // execution
    if ($result = $conn->query($sql)) {
        while ($post = $result->fetch_assoc()) {
            $all_posts[] = $post;
        }
        return $all_posts;
    } else {
        die("Error retrieving all posts: " . $conn->error);
    }
}

function getUserPosts($account_id)
{
    // connection to database
    $conn = connection();

    $sql =
        "SELECT 
        `posts`.`post_id` AS `id`, 
        `posts`.`post_title` AS `title`,
        -- `accounts`.`username` AS `author`,
        `categories`.`category_name` AS `category`,
        `posts`.`date_posted` AS `date_posted`
        FROM `posts`
        INNER JOIN `accounts` ON `posts`.`account_id` = `accounts`.`account_id`
        INNER JOIN `categories` ON `posts`.`category_id` = `categories`.`category_id`
        WHERE `posts`.`account_id` = $account_id";

    // execution
    if ($result = $conn->query($sql)) {
        while ($post = $result->fetch_assoc()) {
            $all_posts[] = $post;
        }
        return $all_posts;
    } else {
        die("Error retrieving user's posts: " . $conn->error);
    }
}

function getPostById($post_id)
{
    // connection to database
    $conn = connection();

    $sql =
        "SELECT 
        -- `posts`.`post_id` AS `id`, 
        `posts`.`post_title` AS `title`,
        `accounts`.`username` AS `author`,
        `posts`.`date_posted` AS `date_posted`,
        `categories`.`category_name` AS `category`,
        `posts`.`post_message` AS `message`
        FROM `posts`
        INNER JOIN `accounts` ON `posts`.`account_id` = `accounts`.`account_id`
        INNER JOIN `categories` ON `posts`.`category_id` = `categories`.`category_id`
        WHERE `posts`.`post_id` = $post_id";

    // execution
    if ($result = $conn->query($sql)) {
        while ($post = $result->fetch_assoc()) {
            return $post;
        }
    } else {
        die("Error retrieving a posts by ID: " . $conn->error);
    }
}


