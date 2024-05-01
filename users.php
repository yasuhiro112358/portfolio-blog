<?php
require_once("app/config.php");

$mysqli = Database::getInstance();

// ==== Process ====
$all_users = getAllUsers($mysqli);
// print_r($all_users);

// Add
if (isset($_POST['btn_add'])) {
    createUser($mysqli);
}

// Update
if (isset($_POST['btn_update'])) {
    $_SESSION['active_account_id'] = $_POST['btn_update'];
    header("location:update-user.php");
    exit;
}

// Delete
if (isset($_POST['btn_delete'])) {
    $_SESSION['active_account_id'] = $_POST['btn_delete'];
    header("location:delete-user.php");
    exit;
}

// ==== Show HTML ====
$page_title = "Users";
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
            <h2 class="display-4">Add User</h2>

            <form action="" method="post">
                <div class="row">
                    <div class="col-md mb-3">
                        <input type="text" name="first_name" id="first-name" class="form-control" placeholder="First Name">
                    </div>
                    <div class="col-md mb-3">
                        <input type="text" name="last_name" id="last-name" class="form-control" placeholder="Last Name">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md mb-3">
                        <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                    </div>

                    <div class="col-md mb-3">
                        <input type="tel" name="contact_number" id="contact-number" class="form-control" placeholder="Contact Number">
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" name="btn_add" class="btn btn-warning w-100  text-white">
                            ADD
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ACCOUNT ID</th>
                    <th>FULL NAME</th>
                    <th>CONTACT NUMBER</th>
                    <th>ADDRESS</th>
                    <th>USERNAME</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="">
                <form action="" method="post">
                    <?php foreach ($all_users as $user) : ?>
                        <tr>
                            <!-- must be account_id... -->
                            <td><?= $user['account_id'] ?></td>
                            <td><?= $user['full_name'] ?></td>
                            <td><?= $user['contact_number'] ?></td>
                            <td><?= $user['address'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td>
                                <button type="submit" name="btn_update" value="<?= $user["account_id"] ?>" class="btn btn-warning text-white">Update</button>
                            </td>
                            <td>
                                <button type="submit" name="btn_delete" value="<?= $user["account_id"] ?>" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </form>
            </tbody>
        </table>
    </div>
</div>

<?php
include("_parts/_footer.php");
?>