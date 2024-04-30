<?php
require_once("functions/config.php");

// ==== Input ====
$post_id = $_SESSION['active_post_id'];

// ==== Process ====
$post = getPostById($post_id);
// print_r($post);

// Output
$page_title = "Post Details";
include("_parts/_header.php");

// Show menu
showMenu();
?>

<div class="container mt-4 mb-4">
    <div class="card border-0">
        <div class="card-body">
            <h1 class="text-center display-3 mb-5">
                <i class="fa-regular fa-pen-to-square"></i>
                Post Details
            </h1>

            <!-- <form action="" method="post"> -->
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="title" id="title" class="form-control border border-top-0 border-start-0 border-end-0 border-primary text-black-50 rounded-0 border-2" placeholder="<?= $post['title'] ?>" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <!-- To show correctly, choosing type as "text"  -->
                    <input type="text" name="date" id="date" class="form-control border border-top-0 border-start-0 border-end-0 border-dark text-black-50 rounded-0 border-2" placeholder="<?= $post['date_posted'] ?>" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <select name="category" id="category" class="form-select border border-top-0 border-start-0 border-end-0 border-dark text-black-50 rounded-0 border-2" disabled>
                        <option value="" hidden>CATEGORY</option>
                        <option value="<?= $post['category'] ?>" selected>
                            <?= $post['category'] ?>
                        </option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control border-dark text-black-50 rounded-0 border-2" placeholder="<?= $post['message'] ?>" disabled></textarea>

                </div>
            </div>

            <div class="row mb-5">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text bg-secondary text-white rounded-0">Author</span>
                        <select name="author" id="author" class="form-select border border-top-0 border-start-0 border-end-0 rounded-0 border-2 border-dark" disabled>
                            <option value="<?= $post['author'] ?>" selected>
                                <?= $post['author'] ?>
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <!-- <div class="col"> -->
                <!-- <button type="submit" name="btn_post" class="btn btn-dark w-100">POST</button> -->
                <a href="edit-post.php" class="btn btn-dark w-100">EDIT</a>
                <!-- </div> -->
            </div>

            <div class="row">
                <!-- <div class="col"> -->
                <a href="posts.php" class="btn btn-dark w-100">Back to All Posts</a>
                <!-- </div> -->
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<?php
include("_parts/_footer.php");
