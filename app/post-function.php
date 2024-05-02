<?php
// require_once("connection.php");

function createPost($conn, $post_title, $post_message, $date_posted, $account_id, $category_id)
{
    $stmt = $conn->prepare(
        "INSERT INTO `posts` (
            `post_title`,
            `post_message`,
            `date_posted`,
            `account_id`,
            `category_id`) 
        VALUES (
            ?,
            ?,
            ?,
            ?,
            ?)"
    );

    $stmt->bind_param("sssii", $post_title, $post_message, $date_posted, $account_id, $category_id);

    if ($stmt->execute()) {
        return;
    } else {
        die("Error adding new post:" . $conn->error);
    }
}

function getAllPosts($conn)
{
    // connection to database
    // $conn = connection();

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

function getUserPosts($conn, $account_id)
{
    // connection to database
    // $conn = connection();

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
        $all_posts = [];
        while ($post = $result->fetch_assoc()) {
            $all_posts[] = $post;
        }
        return $all_posts;
    } else {
        die("Error retrieving user's posts: " . $conn->error);
    }
}

function getPostById($conn, $post_id)
{
    // connection to database
    // $conn = connection();

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

function getNumPosts($conn)
{
    // connection to database
    // $conn = connection();

    $sql =
        "SELECT COUNT(`post_id`) AS `num_posts`
        FROM `posts`";

    // execution
    if ($result = $conn->query($sql)) {
        while ($posts = $result->fetch_assoc()) {
            $num_posts = $posts['num_posts'];
        }
        return $num_posts;
    } else {
        die("Error retrieving a number of posts: " . $conn->error);
    }
}

function updatePost($conn, $post_id, $post_title, $post_message, $date_posted, $account_id, $category_id)
{
    $stmt = $conn->prepare(
        "UPDATE `posts` 
        SET 
            `post_title` = ?, 
            `post_message` = ?, 
            `date_posted` = ?, 
            `account_id` = ?, 
            `category_id` = ? 
        WHERE `post_id` = ?"
    );

    $stmt->bind_param("sssiii", $post_title, $post_message, $date_posted, $account_id, $category_id, $post_id);

    if ($stmt->execute()) {
        return;
    } else {
        die("Error updating the record:" . $conn->error);
    }
}
