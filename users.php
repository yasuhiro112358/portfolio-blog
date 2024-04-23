<?php
$page_title = "Users";

include("_parts/_header.php");

include("_parts/_menu.php");
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

      <form action="">
        <div class="row">
          <div class="col-md mb-3">
            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
          </div>
          <div class="col-md mb-3">
            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
          </div>
        </div>

        <div class="row">
          <div class="col-md mb-3">
            <input type="tel" name="contactNumber" id="contactNumber" class="form-control" placeholder="Contact Number">
          </div>
          <div class="col-md mb-3">
            <input type="text" name="address" id="address" class="form-control" placeholder="Address">
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
            <a href="" class="btn btn-warning w-100  text-white">ADD</a>
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
        <tr>
          <td>3</td>
          <td>John Doe</td>
          <td>78987-787777</td>
          <td>Budapest, Hungary</td>
          <td>john</td>
          <td>
            <button class="btn btn-warning text-white">Update</button>
          </td>
          <td>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
        <tr>
          <td>6</td>
          <td>Apple Banana</td>
          <td>789-7547</td>
          <td>Moscow, Russia</td>
          <td>abc</td>
          <td>
            <button class="btn btn-warning text-white">Update</button>
          </td>
          <td>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
        <tr>
          <td>10</td>
          <td>Yasuhiro WATANABE</td>
          <td>+81-90-xxxx-xxxx</td>
          <td>Utsunomiya, Tochigi, Japan</td>
          <td>hiro</td>
          <td>
            <button class="btn btn-warning text-white">Update</button>
          </td>
          <td>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php
include("_parts/_footer.php");
?>