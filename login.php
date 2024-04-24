<?php
require_once("functions/config.php");
// include "functions/user-function.php";



if (isset($_POST['btn_enter'])) {
  login();
}




$page_title = "Login";

include("_parts/_header.php");
?>

<div class="container mt-5 mb-5">
  <div class="card">
    <div class="card-body">
      <h1 class="text-center display-4 mt-3 mb-3">
        LOGIN
      </h1>

      <form action="" method="POST">
        <input type="text" name="username" id="username" class="form-control border border-top-0 border-start-0 border-end-0 border-primary text-black-50 rounded-0 border-2 mb-3" placeholder="USERNAME">

        <input type="password" name="password" id="password" class="form-control border border-top-0 border-start-0 border-end-0 border-dark text-black-50 rounded-0 border-2 mb-5" placeholder="PASSWORD">

        <button type="submit" name="btn_enter" class="btn btn-success w-100">ENTER</button>

        <div class="row text-center">
          <div class="col p-4">
            <a href="register.php" class="text-black-50">Create an Account</a>
          </div>
          <div class="col p-4">
            <a href="" class="text-black-50">Recover Account</a>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<?php
include("_parts/_footer.php");
?>