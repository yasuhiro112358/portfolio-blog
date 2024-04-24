<?php
require_once("functions/config.php");


$page_title = "Add Post";
include("_parts/_header.php");

// Show menu
showMenu();
?>

<div class="container mt-4 mb-4">
  <div class="card border-0">
    <div class="card-body">
      <h1 class="text-center display-3 mt-3 mb-5">
        <i class="fa-regular fa-pen-to-square"></i>
        Add Post
      </h1>

      <form action="">
        <div class="row mb-3">
          <div class="col">
            <input type="text" name="title" id="title" class="form-control border border-top-0 border-start-0 border-end-0 border-primary text-black-50 rounded-0 border-2" placeholder="TITLE">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <input type="date" name="date" id="date" class="form-control border border-top-0 border-start-0 border-end-0 border-dark text-black-50 rounded-0 border-2" placeholder="TITLE">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <select name="category" id="category" class="form-select border border-top-0 border-start-0 border-end-0 border-dark text-black-50 rounded-0 border-2">
              <option value="" hidden>CATEGORY</option>
              <option value="">category 1</option>
              <option value="">category 2</option>
            </select>
          </div>
        </div>

        <div class="row mb-5">
          <div class="col">
            <textarea name="message" id="message" cols="30" rows="10" class="form-control border-dark text-black-50 rounded-0 border-2" placeholder="MESSAGE"></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <button class="btn btn-dark w-100">POST</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include("_parts/_footer.php");
?>