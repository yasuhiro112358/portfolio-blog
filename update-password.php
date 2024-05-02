<?php
require_once("app/config.php");

$mysqli = Database::getInstance();

// ==== Input ====
$account_id = $_SESSION['account_id'];

// ==== Process ====

// Update
if (isset($_POST['btn_update'])) {
    $current_password = $_POST['current_password'];
    $account_password = getAccountPassword($mysqli, $account_id);

    if (!password_verify($current_password, $account_password)) {
        die("Error: Current password is incorrect");
    } else {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if (!($confirm_password == $new_password)) {
            die("Error: Confirm Password does NOT match");
        } else {
            updatePassword($mysqli, $account_id, $new_password);

            header('location:profile.php');
            exit;
        }
    }
}



// === Output ====
$page_title = "Update Password";
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

<div class="container">
    <div class="card mx-auto my-5">
        <div class="card-header bg-white border-0">
            <h2 class="card-title text-center text-primary h4 mb-0">Update Password</h2>
        </div>

        <div class="card-body">
            <div class="text-center mb-4">
                <p class="fw-bold mb-0">To update password, enter current and new password</p>
            </div>

            <form action="" method="POST">
                <div class="row mb-3 px-3">
                    <label for="current-password" class="form-label">Current Password</label>
                    <input type="password" class="form-control" name="current_password" id="current-password" required>
                </div>

                <div class="row mb-3 px-3">
                    <label for="new-password" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="new-password" required>
                </div>

                <div class="row mb-3 px-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm-password" required>
                </div>

                <div class="row px-3">
                    <div class="col">
                        <a href="profile.php" class="btn btn-secondary w-100">Cancel</a>
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100" name="btn_update">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include("_parts/_footer.php");
?>