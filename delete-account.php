<?php
require_once("app/config.php");

$mysqli = Database::getInstance();

// ==== Input ====
$account_id = $_SESSION['account_id'];

// ==== Process ====
$user = getUser($mysqli, $account_id);
// print_r($user);

// Delete
if (isset($_POST['btn_delete'])) {
    deleteUser($mysqli, $account_id);
    
    header("location:register.php");
}

// ==== Output ====
$page_title = "Delete Account";
include("_parts/_header.php");

// Show menu
showMenu();
?>


<main class="card w-25 mx-auto border-0 my-5">
    <div class="card-header bg-white border-0">
        <h2 class="card-title text-center text-danger h4 mb-0">Delete Account</h2>
    </div>

    <div class="card-body">
        <div class="text-center mb-4">
            <i class="fas fa-exclamation-triangle text-warning display-4 d-block mb-2"></i>
            <p class="fw-bold mb-0">Are you sure you want to delete the account for "<?= $user['username'] ?> (<?= $user['full_name'] ?>)" and all their posts?</p>
        </div>

        <div class="row">
            <div class="col">
                <a href="profile.php" class="btn btn-secondary w-100">Cancel</a>
            </div>
            <div class="col">

                <form action="" method="POST">
                    <button type="submit" class="btn btn-outline-danger w-100" name="btn_delete">Delete</button>
                </form>

            </div>
        </div>
    </div>

</main>




<?php
include("_parts/_footer.php");