<?php
// require_once("connection.php");

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

function createUser()
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
    $sql_accounts =
        "INSERT INTO `accounts` (`username`, `password`) 
        VALUES ('$username', '$password')";

    if ($conn->query($sql_accounts)) {
        // insert_id --> this will get the last ID generated in the previous table
        $account_id = $conn->insert_id;

        // SQL Code for user's table
        $sql_users =
            "INSERT INTO `users` (`first_name`, `last_name`, `address`, `contact_number`, `avatar`, `account_id`) 
            VALUE ('$first_name', '$last_name', '$address', '$contact_number', '$avatar', '$account_id')";

        if ($conn->query($sql_users)) {
            header("refresh:0");
            exit;
        } else {
            echo "<div class='alert alert-danger text-canter fw-bold' role='alert'>Error in USERS Table: " . $conn->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-canter fw-bold' role='alert'>Error in ACCOUNTS Table: " . $conn->error . "</div>";
    }
}


// Choose and show a menu depending on if Admin or Users
function showMenu()
{
    $role = $_SESSION["role"];

    if ($role == "A") {
        include("_parts/_admin-menu.php");
    } elseif ($role == "U") {
        include("_parts/_user-menu.php");
    }
}


function getAllUsers()
{
    // connection to database
    $conn = connection();

    $sql =
        "SELECT 
        -- `users`.`user_id` AS `id`,
        `accounts`.`account_id` AS `account_id`,
        CONCAT(`users`.`first_name`, ' ', `users`.`last_name`) AS `full_name`,
        `users`.`contact_number` AS `contact_number`,
        `users`.`address` AS `address`,
        `accounts`.`username` AS `username`
        FROM `users`
        INNER JOIN `accounts` ON `users`.`account_id` = `accounts`.`account_id`";

    // execution
    if ($result = $conn->query($sql)) {
        while ($user = $result->fetch_assoc()) {
            $all_users[] = $user;
        }
        return $all_users;
    } else {
        die("Error retrieving all users: " . $conn->error);
    }
}

function getUser($account_id)
{
    // connection to database
    $conn = connection();

    $sql =
        "SELECT 
        `users`.`user_id` AS `id`,
        CONCAT(`users`.`first_name`, ' ', `users`.`last_name`) AS `full_name`,
        `users`.`contact_number` AS `contact_number`,
        `users`.`address` AS `address`,
        `accounts`.`username` AS `username`
        FROM `users`
        INNER JOIN `accounts` ON `users`.`account_id` = `accounts`.`account_id`
        WHERE `users`.`account_id` = $account_id";

    // execution
    if ($result = $conn->query($sql)) {
        while ($user = $result->fetch_assoc()) {
            return $user;
        }
    } else {
        die("Error retrieving logged in user: " . $conn->error);
    }
}

function getUserInfo($account_id)
{
    // connection to database
    $conn = connection();

    // if (password_verify($password, $user_details['password'])) {

    $sql =
        "SELECT 
            -- `users`.`user_id` AS `id`,
            `users`.`first_name` AS `first_name`,
            `users`.`last_name` AS `last_name`,
            `users`.`address` AS `address`,
            `users`.`contact_number` AS `contact_number`,
            `accounts`.`username` AS `username`,
            `accounts`.`password` AS `password`,
            `users`.`avatar` AS `avatar`
            FROM `users`
            INNER JOIN `accounts` ON `users`.`account_id` = `accounts`.`account_id`
            WHERE `accounts`.`account_id` = $account_id";

    // execution
    if ($result = $conn->query($sql)) {
        while ($user = $result->fetch_assoc()) {
            return $user;
        }
    } else {
        die("Error retrieving user information: " . $conn->error);
    }
}

// For Admin
function updateUserInfo($account_id, $first_name, $last_name, $address, $contact_number, $username)
{
    $conn = connection();

    $sql =
        "UPDATE `users` 
        INNER JOIN `accounts` ON `users`.`account_id` = `accounts`.`account_id`
        SET 
            `users`.`first_name` = '$first_name',
            `users`.`last_name` = '$last_name',
            `users`.`address` = '$address',
            `users`.`contact_number` = '$contact_number',
            `accounts`.`username` = '$username'
        WHERE `users`.`account_id` = $account_id";

    if ($conn->query($sql)) {
        header("location:users.php");
        exit;
    } else {
        die("Error updating the user information:" . $conn->error);
    }
}

// For Users
function updateUserProfile($account_id, $first_name, $last_name, $address, $contact_number, $username, $avatar_name, $avatar_temp)
{
    $conn = connection();

    if ($avatar_name == "") {
        $sql =
            "UPDATE `users` 
            INNER JOIN `accounts` ON `users`.`account_id` = `accounts`.`account_id`
            SET 
                `users`.`first_name` = '$first_name',
                `users`.`last_name` = '$last_name',
                `users`.`address` = '$address',
                `users`.`contact_number` = '$contact_number',
                `accounts`.`username` = '$username'
            WHERE `users`.`account_id` = $account_id";
    } else {
        $sql =
            "UPDATE `users` 
            INNER JOIN `accounts` ON `users`.`account_id` = `accounts`.`account_id`
            SET 
                `users`.`first_name` = '$first_name',
                `users`.`last_name` = '$last_name',
                `users`.`address` = '$address',
                `users`.`contact_number` = '$contact_number',
                `accounts`.`username` = '$username',
                `users`.`avatar` = '$avatar_name'
            WHERE `users`.`account_id` = $account_id";
    }

    if ($conn->query($sql)) {
        $destination = "img/$avatar_name";
        move_uploaded_file($avatar_temp, $destination);
        return;
    } else {
        die("Error updating the user profile:" . $conn->error);
    }
}

function deleteUser($account_id)
{
    $conn = connection();

    $sql_accounts =
        "DELETE FROM `accounts`
        WHERE `account_id` = $account_id";

    $sql_users =
        "DELETE FROM `users`
        WHERE `account_id` = $account_id";

    if (!$conn->query($sql_accounts)) {
        die("Error deleting the account: " . $conn->error);
    } else {
        if (!$conn->query($sql_users)) {
            die("Error deleting the user linked to the account: " . $conn->error);
        } else {
            // header("location:users.php");
            // exit;
        }
    }
}

function getNumUsers()
{
    // connection to database
    $conn = connection();

    $sql =
        "SELECT COUNT(`user_id`) AS `num_users`
        FROM `users`";

    // execution
    if ($result = $conn->query($sql)) {
        while ($users = $result->fetch_assoc()) {
            $num_users = $users['num_users'];
        }
        return $num_users;
    } else {
        die("Error retrieving a number of users: " . $conn->error);
    }
}

function getAccountPassword($account_id)
{
    $conn = connection();

    $sql =
        "SELECT `password`
        FROM `accounts`
        WHERE `account_id` = $account_id";

    if ($result = $conn->query($sql)) {
        while ($account = $result->fetch_assoc()) {
            $account_password = $account['password'];
        }
        return $account_password;
    } else {
        die("Error retrieving the password linked to the account: " . $conn->error);
    }
}

function getAllUsernames()
{
    $conn = connection();

    $sql =
        "SELECT
            `account_id`,
            `username`
        FROM `accounts`";

    if ($result = $conn->query($sql)) {
        while ($username = $result->fetch_assoc()) {
            $usernames[] = $username;
        }
        return $usernames;
    } else {
        die("Error retrieving usernames: " . $conn->error);
    }
}

function getUsername($account_id)
{
    $conn = connection();

    $sql =
        "SELECT
            `account_id`,
            `username`
        FROM `accounts`
        WHERE `account_id` = $account_id";

    if ($result = $conn->query($sql)) {
        while ($username = $result->fetch_assoc()) {
            // return $username;
            $usernames[] = $username;
        }
        return $usernames;
    } else {
        die("Error retrieving username by ID: " . $conn->error);
    }
}


function updatePassword($account_id, $new_password) {
    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
    
    $conn = connection();

    $sql =
        "UPDATE `accounts` 
        SET `password` = '$new_password'
        WHERE `account_id` = $account_id";

    if ($conn->query($sql)) {
        return;
    } else {
        die("Error updating the password:" . $conn->error);
    }
}