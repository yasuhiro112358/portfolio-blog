<?php
require_once("functions/config.php");

// ==== Input ====
$post_id = $_SESSION['active_post_id'];

if ($_SESSION['role'] == "A") {
    $usernames = getAllUsernames();
} elseif ($_SESSION['role'] == "U") {
    $usernames = getUsername($_SESSION['account_id']);
}
// print_r($usernames);

// ==== Process ====
$post = getPostById($post_id);
// print_r($post);

$all_categories = getAllCategories();
// print_r($all_categories);

// Edit
if (isset($_POST['btn_save'])) {
    // $post_id is got from $_SESSION['active_post_id']
    $post_title = $_POST['title'];
    $post_message = $_POST['message'];
    $date_posted = $_POST['date'];
    $account_id = $_POST['account_id'];
    $category_id = $_POST['category_id'];
    
    // echo $post_title;
    // echo $post_message;
    // echo $date_posted;
    // echo $account_id;
    // echo $category_id;

    updatePost($post_id, $post_title, $post_message, $date_posted, $account_id, $category_id);

    header("location:post-details.php");
}


// Output
$page_title = "Edit Post";
include("_parts/_header.php");

// Show menu
showMenu();
?>

<div class="container mt-4 mb-4">
    <div class="card border-0">
        <div class="card-body">
            <h1 class="text-center display-3 mb-5">
                <i class="fa-regular fa-pen-to-square"></i>
                Edit Post
            </h1>

            <form action="" method="post">
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="title" value="<?= $post['title'] ?>" id="title" class="form-control border border-top-0 border-start-0 border-end-0 border-primary rounded-0 border-2" placeholder="<?= $post['title'] ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <input type="date" name="date" value="<?= $post['date_posted'] ?>" id="date" class="form-control border border-top-0 border-start-0 border-end-0 border-dark rounded-0 border-2" placeholder="<?= $post['date_posted'] ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <select name="category_id" id="category" class="form-select border border-top-0 border-start-0 border-end-0 border-dark rounded-0 border-2">
                            <!-- <option value="" hidden>CATEGORY</option> -->

                            <?php foreach ($all_categories as $category) : ?>
                                <?php if ($category["name"] == $post['category']) : ?>
                                    <option value="<?= $category["id"] ?>" selected><?= $category["name"] ?></option>
                                <?php else : ?>
                                    <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>


                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control border-dark rounded-0 border-2" placeholder="<?= $post['message'] ?>"><?= $post['message'] ?></textarea>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <div class="input-group">
                            <span class="input-group-text bg-secondary text-white rounded-0">Author</span>
                            <select name="account_id" id="author" class="form-select border border-top-0 border-start-0 border-end-0 rounded-0 border-2 border-dark">
                                <?php foreach ($usernames as $username) : ?>
                                    <?php if ($username['account_id'] == $_SESSION['account_id']) : ?>
                                        <option value="<?= $username['account_id'] ?>" selected>
                                            <?= $username['username'] ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $username['account_id'] ?>">
                                            <?= $username['username'] ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <button type="submit" name="btn_save" class="btn btn-dark w-100">SAVE</button>
                    <!-- <a href="edit-post.php" class="btn btn-dark w-100">SAVE</a> -->
                </div>


                <div class="row">
                    <!-- <div class="col"> -->
                    <a href="post-details.php" class="btn btn-dark w-100">Back to Detail</a>
                    <!-- </div> -->
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include("_parts/_footer.php");
