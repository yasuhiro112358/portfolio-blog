<?php
require_once("app/config.php");

$mysqli = Database::getInstance();

// ==== Process ====
$all_categories = getAllCategories($mysqli);
// print_r($all_categories);

// Add
if (isset($_POST['btn_add'])) {
    $category = $_POST['category'];
    createCategory($mysqli, $category);
}

// Update
if (isset($_POST['btn_update'])) {
    $_SESSION['active_category_id'] = $_POST['btn_update'];
    header("location:update-category.php");
    exit;
}

// Delete
if (isset($_POST['btn_delete'])) {
    $_SESSION['active_category_id'] = $_POST['btn_delete'];
    header("location:delete-category.php");
    exit;
}

// ==== Output ====
$page_title = "Categories";
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
                        <label for="category" class="form-label text-black-50 mt-2 mb-3">Add Category</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="category" id="category" class="form-control w-100 mb-3">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="btn_add" class="btn btn-success w-100 mb-3">ADD</button>
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
                <form action="" method="post">
                    <?php foreach ($all_categories as $category) : ?>
                        <tr>
                            <td><?= $category["id"] ?></td>
                            <td><?= $category["name"] ?></td>
                            <td>
                                <button type="submit" name="btn_update" value="<?= $category["id"] ?>" class="btn btn-warning text-white">Update</button>
                            </td>
                            <td>
                                <button type="submit" name="btn_delete" value="<?= $category["id"] ?>" class="btn btn-danger">Delete</button>
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