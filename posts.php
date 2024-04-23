<?php
$page_title = "Posts";

include("_parts/_header.php");

include("_parts/_menu.php");
?>

<div class="container-fluid bg-primary">
  <div class="container">
    <h2 class="text-white m-0 py-3">
      <i class="fa-solid fa-pen-nib pe-1"></i>
      Posts
    </h2>
  </div>
</div>

<div class="container mt-5">
  <a href="add-post.php" class="btn btn-primary d-block w-75 mx-auto">
    Add Post
  </a>
</div>

<div class="container mt-5">
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>POST ID</th>
          <th>TITLE</th>
          <th>CATEGORY</th>
          <th>DATE POSTED</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="">
        <tr>
          <td>5</td>
          <td>Letter from the Admin</td>
          <td>General</td>
          <td>2021-08-15</td>
          <td>
            <button class="btn btn-outline-dark">
              <i class="fa-solid fa-angles-right"></i>
              Details
            </button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Hey, I am Mark!</td>
          <td>Programming</td>
          <td>2021-08-17</td>
          <td>
            <button class="btn btn-outline-dark">
              <i class="fa-solid fa-angles-right"></i>
              Details
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php
include("_parts/_footer.php");
?>