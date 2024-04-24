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
