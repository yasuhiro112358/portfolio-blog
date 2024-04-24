<?php
require_once("functions/config.php");

// ==== Process ====
$all_users = getAllUsers();
// print_r($all_users);

if (isset($_POST['btn_add'])) {
    createUser();
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
                <?php foreach ($all_users as $user) : ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['full_name'] ?></td>
                        <td><?= $user['contact_number'] ?></td>
                        <td><?= $user['address'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>
                            <button class="btn btn-warning text-white">Update</button>
                        </td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include("_parts/_footer.php");
?>