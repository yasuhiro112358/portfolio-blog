<?php
require_once("functions/config.php");

// ==== Process ====
$all_categories = getAllCategories();

// print_r($_SESSION);

if ($_SESSION['role'] == "A") {
    $all_users = getAllUsers();
} elseif ($_SESSION['role'] == "U") {
    $user = getUser($_SESSION['account_id']);
}
// print_r($all_users);
// print_r($user);

if (isset($_POST['btn_post'])) {
    // createPost();
}

// Output
$page_title = "Add post";
include("_parts/_header.php");

// Show menu
showMenu();
?>

<div class="container mt-4 mb-4">
    <div class="card border-0">
        <div class="card-body">
            <h1 class="text-center display-3 mb-5">
                <i class="fa-regular fa-pen-to-square"></i>
                Add Post
            </h1>

            <form action="" method="post">
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
                            <?php foreach ($all_categories as $category) : ?>
                                <option value="<?= $category["name"] ?>"><?= $category["name"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control border-dark text-black-50 rounded-0 border-2" placeholder="MESSAGE"></textarea>

                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <div class="input-group">
                            <span class="input-group-text bg-secondary text-white rounded-0">Author</span>
                            <select name="author" id="author" class="form-select border border-top-0 border-start-0 border-end-0 rounded-0 border-2 border-dark">
                                <!-- Admin -->
                                <?php if ($_SESSION['role'] == "A") : ?>
                                    <?php foreach ($all_users as $user) : ?>
                                        <?php if ($user['id'] == $_SESSION['account_id']) : ?>
                                            <option value="<?= $user['username'] ?>" selected>
                                                <?= $user['username'] ?>
                                            </option>
                                        <?php else : ?>
                                            <option value="<?= $user['username'] ?>">
                                                <?= $user['username'] ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                    <!-- User -->
                                <?php elseif ($_SESSION['role'] == "U") : ?>
                                    
                                        <option value="<?= $user['username'] ?>" selected>
                                            <?= $user['username'] ?>
                                        </option>
                                    
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" name="btn_post" class="btn btn-dark w-100">POST</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include("_parts/_footer.php");
