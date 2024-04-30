<?php
require_once("functions/config.php");

// ==== Input ====
// $account_id = $_SESSION['active_account_id'];
$account_id = $_SESSION['account_id'];

// ==== Process ====
$user_info = getUserInfo($account_id);
// print_r($user_info);

// Update
if (isset($_POST['btn_update'])) {
    // $account_id is coming from $_SESSION['active_account_id']
    $password = $_POST['password'];
    $account_password = getAccountPassword($account_id);

    if (!password_verify($password, $account_password)) {
        die("Error: Incorrect password");
    } else {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $username = $_POST['username'];
        // $avatar = $_POST['avatar'];
        $avatar_name = $_FILES['avatar']['name'];
        $avatar_temp = $_FILES['avatar']['tmp_name'];

        updateUserProfile($account_id, $first_name, $last_name, $address, $contact_number, $username, $avatar_name, $avatar_temp);

        header("refresh:0");
        exit;
    }
}

// === Output ====
$page_title = "Profile";
include("_parts/_header.php");

// Show menu
showMenu();

?>

<div class="container-fluid bg-secondary">
    <div class="container">
        <h2 class="text-white m-0 py-3">
            <i class="fa-solid fa-user pe-1"></i>
            Profile
        </h2>
    </div>
</div>

<div class="container-fluid bg-light py-4">
    <div class="container d-flex justify-content-center">
        <a href="update-password.php" class="btn btn-primary mx-3">Change Password</a>

        <?php if ($_SESSION['role'] != "A") : ?>
            <a href="delete-account.php" class="btn btn-danger mx-3">Delete Account</a>
        <?php else : ?>
            <!-- <a href="" class="btn btn-dark mx-3">Delete Account</a> -->
        <?php endif; ?>
    </div>
</div>

<div class="container mt-3 mb-5">
    <div class="card">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first-name" class="form-label">First name</label>
                                <input type="text" name="first_name" value="<?= $user_info['first_name'] ?>" id="first-name" class="form-control" placeholder="<?= $user_info['first_name'] ?>" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="last-name" class="form-label">Last name</label>
                                <input type="text" name="last_name" value="<?= $user_info['last_name'] ?>" id="last-name" class="form-control" placeholder="<?= $user_info['last_name'] ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" value="<?= $user_info['address'] ?>" id="address" class="form-control" placeholder="<?= $user_info['address'] ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="contact-number" class="form-label">Contact Number</label>
                                <input type="tel" name="contact_number" value="<?= $user_info['contact_number'] ?>" id="contactNumber" class="form-control" placeholder="<?= $user_info['contact_number'] ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" value="<?= $user_info['username'] ?>" id="username" class="form-control" placeholder="<?= $user_info['username'] ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="To update your information, enter your current password" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-8 col-md mx-auto">
                                <img src="img/<?= $user_info['avatar'] ?>" alt="Missing your avatar" class="w-100 mb-3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <!-- <div class="input-group mb-3"> -->
                                <!-- <span class="input-group-text">Choose File</span> -->
                                <!-- <input type="file" name="avatar" value="<?= $user_info['avatar'] ?>" placeholder="<?= $user_info['avatar'] ?>" class="form-control mb-3"> -->
                                <input type="file" name="avatar" class="form-control mb-3">
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <form method="post" enctype="multipart/form-data">
                    <div class="input-group mb-2">
                        <input type="file" name="photo" class="form-control" aria-label="Choose Photo">
                        
                        <button type="submit" class="btn btn-outline-secondary" name="btn_upload_photo">Update</button>
                    </div>
                </form> -->

                <div class="row">
                    <div class="col-md-8">
                        <button type="submit" name="btn_update" class="btn btn-primary w-100">
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