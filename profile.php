<?php
$page_title = "Profile";

include("_parts/_header.php");

include("_parts/_menu.php");
?>

<div class="container-fluid bg-secondary">
  <div class="container">
    <h2 class="text-white m-0 py-3">
      <i class="fa-solid fa-user pe-1"></i>
      Profile
    </h2>
  </div>
</div>

<div class="container mt-5 mb-5">
  <div class="card">
    <div class="card-body">
      <form action="">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstname" class="form-label">First name</label>
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Mark">
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Lee">
              </div>
            </div>

            <div class="row">
              <div class="col-md-8 mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="California, USA">
              </div>
              <div class="col-md-4 mb-3">
                <label for="contactNumber" class="form-label">Contact Number</label>
                <input type="tel" name="contactNumber" id="contactNumber" class="form-control" placeholder="78-785547-452">
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="mark">
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password confirm">
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <img src="img/myFace.JPG" alt="" class="w-100 mb-3">
            <div class="input-group mb-3">
              <span class="input-group-text">Choose File</span>
              <input type="url" name="photo" id="photo" placeholder="No file chosen" class="form-control">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8">
            <a href="" class="btn btn-primary w-100">UPDATE</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include("_parts/_footer.php");
?>