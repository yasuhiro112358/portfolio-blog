<?php
// ==== Functions as Reference ====

// ==============
// ==== CRUD ====
// ==============

// ================
// ==== Create ====
// ================
function createProduct($name, $description, $price, $section_id)
{
    $conn = connection();

    // SQL Code = insert new product
    $sql = "INSERT INTO `products` (`name`, `description`, `price`, `section_id`) VALUES ('$name', '$description', '$price', '$section_id')";

    // EXECUTE
    if ($conn->query($sql)) {
        header("location: products.php");
        // go to products.php if the query is successful
        exit; // same as die()
    } else {
        die("Error adding a new product: " . $conn->error);
    }
}

function createSection($name)
{
    // Connection to Database
    $conn = connection();

    // SQL Code(insert section)
    $sql = "INSERT INTO `sections` (`name`) VALUE ('$name')";

    // execution/run
    if ($conn->query($sql)) {
        // successful
        header("refresh: 0");
    } else {
        // fail
        die("Error adding new product section:" . $conn->error);
    }
}

function createUser($first_name, $last_name, $username, $password) {
    $conn = connection();

    // password encryption
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` (`first_name`, `last_name`, `username`, `password`) VALUES ('$first_name', '$last_name', '$username', '$password')";

    if ($conn->query($sql)) {
        header("location: login.php");
        exit;
    } else {
        die("Error adding new user: " . $conn->error);
    }
}

// ==============
// ==== Read ====
// ==============
function getAllSections()
{
    // connection to database
    $conn = connection();

    // SQL Code (get records)
    $sql = "SELECT * FROM sections";

    // execution
    if ($result = $conn->query($sql)) {
        return $result;
    } else {
        die("Error retrieving all sections: " . $conn->error);
    }
}

function getAllProducts()
{
    $conn = connection();

    // sql code = get all products from different table
    $sql = "SELECT products.id, products.name, products.description, products.price, sections.name AS `section` FROM `products` INNER JOIN `sections` ON products.section_id = sections.id";

    if ($result = $conn->query($sql)) {
        // print_r($result);
        return $result;
    } else {
        die("Error retrieving all products: " . $conn->error);
    }
}

function getProduct($id)
{
    $conn  = connection();

    //SQL code
    $sql = "SELECT * FROM products WHERE id = $id";
    //specific record only
    if ($result = $conn->query($sql)) {
        return $result->fetch_assoc();
        // return an associative array
    } else {
        die("Error retrieving all products: " . $conn->error);
    }
}

// Can give $id as an argument
function getUser()
{
    $conn = connection();

    $id = $_SESSION['user_id'];

    $sql = "SELECT * FROM `users` WHERE `id` = $id";

    if ($result = $conn->query($sql)) {
        return $result->fetch_assoc();
    } else {
        die("Error retrieving a record: " . $conn->error);
    }
}

// ================
// ==== Update ====
// ================

//update record
function updateProduct($id, $name, $description, $price, $section_id)
{
    $conn = connection();

    //SQL Code = update single record
    $sql = "UPDATE `products` SET `name` = '$name', `description` = '$description', `price` = '$price', `section_id` = '$section_id' WHERE id = $id  ";

    if ($conn->query($sql)) {
        header("location: products.php");
        exit;
    } else {
        die("Error updating the record:" . $conn->error);
    }
}

// update the name of image and save the image   
function updatePhoto($id, $photo_name, $photo_tmp)
{
    $conn = connection();

    $sql = "UPDATE `users` SET `photo` = '$photo_name' WHERE `id` = $id";

    if ($conn->query($sql)) {
        $destination = "assets/image/$photo_name";
        move_uploaded_file($photo_tmp, $destination);
        header("refresh: 0");
    } else {
        die("Error uploading photo: " . $conn->error);
    }
}

// ================
// ==== Delete ====
// ================

function deleteProduct($id)
//delete specific record
{
    $conn = connection();

    //sql code = delete single record
    $sql = "DELETE FROM products WHERE id = $id";

    if ($conn->query($sql)) {
        header("location:products.php");
        exit;
    } else {
        die("Error deleting the product: " . $conn->error);
    }
}

function deleteSection($section_id)
{
    $conn = connection();

    $sql = "DELETE FROM sections WHERE id = $section_id";

    if ($conn->query($sql)) {
        header("refresh: 0");
    } else {
        die("Error deleting the product section: " . $conn->error);
    }
}

// ==============
// ==== Etc. ====
// ==============

