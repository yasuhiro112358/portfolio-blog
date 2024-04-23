<?php
$page_title = "Categories";

include("_parts/_header.php");

include("_parts/_menu.php");
?>

<div class="container-fluid bg-success">
  <div class="container">
    <h2 class="text-white m-0 py-3">
      <i class="fa-solid fa-folder pe-1"></i>
      Categories
    </h2>
  </div>
</div>

<div class="container mt-5 mb-5">
  <div class="card">
    <div class="card-body pt-4 px-4">
      <form action="">
        <div class="row">
          <div class="col-md-3">
            <label for="addCategory" class="form-label text-black-50 mt-2 mb-3">Add Category</label>
          </div>
          <div class="col-md-4">
            <input type="text" name="addCategory" id="addCategory" class="form-control w-100 mb-3">
          </div>
          <div class="col-md-2">
            <button class="btn btn-success w-100 mb-3">ADD</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container mb-5">
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="table-dark text-center">
        <tr>
          <th>CATEGORY ID</th>
          <th>CATEGORY NAME</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody class="text-center">
        <tr>
          <td>9</td>
          <td>Food and Drinks</td>
          <td>
            <button class="btn btn-warning text-white">Update</button>
          </td>
          <td>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
        <tr>
          <td>8</td>
          <td>General</td>
          <td>
            <button class="btn btn-warning text-white">Update</button>
          </td>
          <td>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
        <tr>
          <td>7</td>
          <td>Programming</td>
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