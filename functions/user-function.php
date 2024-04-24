<?php
require "connection.php";

function register()
{

    $conn = connection();

    // data from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $avatar = "profile.jpg";

    // SQL Code for account
    $sql_accounts = "INSERT INTO `accounts` (`username`, `password`) VALUES ('$username', '$password')";

    if ($conn->query($sql_accounts)) {
        // insert_id --> this will get the last ID generated in the previous table
        $account_id = $conn->insert_id;

        // SQL Code for user's table
        $sql_users = "INSERT INTO `users` (`first_name`, `last_name`, `address`, `contact_number`, `avatar`, `account_id`) VALUE ('$first_name', '$last_name', '$address', '$contact_number', '$avatar', '$account_id')";

        if ($conn->query($sql_users)) {
            header("location:login.php");
            exit;
        } else {
            echo "<div class='alert alert-danger text-canter fw-bold' role='alert'>Error in USERS Table: " . $conn->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-canter fw-bold' role='alert'>Error in ACCOUNTS Table: " . $conn->error . "</div>";
    }
}

// Login function
function login()
{
    $conn = connection();

    // from data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // customize 
    $error =  "<div class='alert alert-danger text-canter fw-bold' role='alert'>Incorrect Username or Password</div>";

    // SQL Code
    $sql = "SELECT * FROM `accounts` WHERE `username` = '$username'";

    if ($result = $conn->query($sql)) {
        if ($result->num_rows == 1) {
            $user_details = $result->fetch_assoc();
            if (password_verify($password, $user_details['password'])) {
                session_start();
                $_SESSION['account_id'] = $user_details['account_id'];
                $_SESSION['role'] = $user_details['role'];
                $_SESSION['full_name'] = getFullName($user_details['account_id']);

                if ($user_details['role'] == "A") {
                    header("location:dashboard.php");
                } elseif ($user_details['role'] == "U") {
                    header("location:profile.php");
                }
                exit;
            } else {
                echo $error;
            }
        } else {
            echo $error;
        }
    } else {
        die("Error: " . $conn->error);
    }
}

function getFullName($account_id)
{
    $conn = connection();

    $sql = "SELECT `first_name`, `last_name` FROM `users` WHERE `account_id` = '$account_id'";

    if ($result = $conn->query($sql)) {
        $full_name = $result->fetch_assoc();
        return $full_name['first_name'] . " " . $full_name['last_name'];
    } else {
        die("Error retrieving data: " . $conn->error);
    }
}
