<?php
require_once("app/config.php");

$mysqli = Database::getInstance();

// ==== Input ====
$account_id = $_SESSION['active_account_id'];

// ==== Process ====
$user = getUserInfo($mysqli, $account_id);
// print_r($user);

// Update
if (isset($_POST['btn_update'])) {
    $password = $_POST['password'];
    $account_password = getAccountPassword($mysqli, $account_id);

    if (!password_verify($password, $account_password)) {
        die("Error: Incorrect password");
    } else {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $username = $_POST['username'];
        
        updateUserInfo($mysqli, $account_id, $first_name, $last_name, $address, $contact_number, $username);
    
        header("location:users.php");
        exit;
    }

}


// ==== Output ====
$page_title = "Update User";
include("_parts/_header.php");

// Show menu
showMenu();
?>

<div class="container-fluid bg-warning">
    <div class="container">
        <h2 class="text-white m-0 py-3">
            <i class="fa-solid fa-user-pen pe-1"></i>
            Users
        </h2>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-body">
            <h2 class="display-4">Update User</h2>

            <form action="" method="post">
                <div class="row">
                    <div class="col-md mb-3">
                        <input type="text" name="first_name" value="<?= $user['first_name'] ?>"  id="first-name" class="form-control" placeholder="<?= $user['first_name'] ?>">
                    </div>
                    <div class="col-md mb-3">
                        <input type="text" name="last_name" value="<?= $user['last_name'] ?>" id="last-name" class="form-control" placeholder="<?= $user['last_name'] ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md mb-3">
                        <input type="text" name="address" value="<?= $user['address'] ?>" id="address" class="form-control" placeholder="<?= $user['address'] ?>">
                    </div>

                    <div class="col-md mb-3">
                        <input type="tel" name="contact_number" value="<?= $user['contact_number'] ?>" id="contact-number" class="form-control" placeholder="<?= $user['contact_number'] ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <input type="text" name="username" value="<?= $user['username'] ?>" id="username" class="form-control" placeholder="<?= $user['username'] ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <input type="password" name="password" value="" id="password" class="form-control" placeholder="Input your current password">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" name="btn_update" class="btn btn-warning w-100 text-white">
                            UPDATE
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
include("_parts/_footer.php");
?>