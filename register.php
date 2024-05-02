<?php
require_once("app/config.php");

$mysqli = Database::getInstance();

if (isset($_POST['btn_register'])) {
    register($mysqli);
}

$page_title = "Register";
include("_parts/_header.php");
?>

<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header text-success">
            <h1 class="h3 mb-0">Create your account</h1>
        </div>

        <div class="card-body">
            <form method="post">
                <label for="first-name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first-name" class="form-control mb-2" required autofocus>

                <label for="last-name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last-name" class="form-control mb-2" required>

                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control mb-2" required>

                <label for="contact-number" class="form-label">Contact Number</label>
                <input type="tel" name="contact_number" id="contact-number" class="form-control mb-2" required>

                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control mb-2" required>

                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control mb-2" required>

                <!-- <label for="confirm-password" class="small">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm-password" class="form-control mb-5"> -->

                <button type="submit" class="btn btn-success w-100" name="btn_register">Register</button>
            </form>

            <div class="text-center mt-3">
                <p class="small">Already have an account? <a href="login.php">Log in.</a></p>
            </div>
        </div>
    </div>
</div>

<?php
include("_parts/_footer.php");
?>