<?php
require_once("app/config.php");

// ==== Input ====
$category_id = $_SESSION['active_category_id'];

// ==== Process ====
$category = getCategoryById($category_id);
print_r($category);

// Update
if (isset($_POST['btn_update'])) {
    $category_name = $_POST['category'];
    updateCategory($category_id, $category_name);
}


// ==== Output ====
$page_title = "Update Category";
include("_parts/_header.php");

// Show menu
showMenu();
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
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-3">
                        <label for="category" class="form-label mt-2 mb-3">Update Category</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="category" value="<?= $category['category_name'] ?>" id="category" class="form-control w-100 mb-3" placeholder="<?= $category['category_name'] ?>">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="btn_update" class="btn btn-success w-100 mb-3">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
include("_parts/_footer.php");
?>