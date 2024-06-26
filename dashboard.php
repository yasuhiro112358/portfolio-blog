<?php
require_once("app/config.php");

$mysqli = Database::getInstance();

// ==== Process ====
$all_posts = getAllPosts($mysqli);
// print_r($all_posts);
$num_posts = getNumPosts($mysqli);
$num_categories = getNumCategories($mysqli);
$num_users = getNumUsers($mysqli);

if (isset($_POST['btn_submit_post_id'])) {
    $_SESSION['active_post_id'] = $_POST['btn_submit_post_id'];
    header("location:post-details.php");
}

// ==== Show HTML ====
$page_title = "Dashboard";
include("_parts/_header.php");

// Show menu
showMenu();
?>

<div class="container-fluid bg-danger">
    <div class="container">
        <h2 class="text-white m-0 py-3">
            <i class="fa-solid fa-user-gear pe-1"></i>
            Dashboard
        </h2>
    </div>
</div>

<div class="container mt-3 mb-3">
    <h2 class="mb-3">ALL POSTS</h2>

    <div class="row">
        <div class="col-md-9">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>TITLE</th>
                            <th>AUTHOR</th>
                            <th>CATEGORY</th>
                            <th>DATE POSTED</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php foreach ($all_posts as $post) : ?>
                            <tr>
                                <td><?= $post['id'] ?></td>
                                <td><?= $post['title'] ?></td>
                                <td><?= $post['author'] ?></td>
                                <td><?= $post['category'] ?></td>
                                <td><?= $post['date_posted'] ?></td>
                                <td>
                                    <form action="" method="post">
                                        <button type="submit" name="btn_submit_post_id" value="<?= $post['id'] ?>" class="btn btn-outline-dark">
                                            <i class="fa-solid fa-angles-right"></i>
                                            Details
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Posts -->
        <div class="col-md-3">
            <div class="card bg-primary mb-3">
                <div class="card-body text-center text-white">
                    <h3>Posts</h3>
                    <p class="h4">
                        <i class="fa-solid fa-pen"></i>
                        <?= $num_posts ?>
                    </p>
                    <a href="posts.php" class="btn btn-outline-light btn-sm">
                        VIEW
                    </a>
                    <a href="add-post.php" class="btn btn-outline-light btn-sm">
                        ADD
                    </a>
                </div>
            </div>

            <!-- Categories -->
            <div class="card bg-success mb-3">
                <div class="card-body text-center text-white">
                    <h3>Categories</h3>
                    <p class="h4">
                        <i class="fa-solid fa-folder-open"></i>
                        <?= $num_categories ?>
                    </p>
                    <a href="categories.php" class="btn btn-outline-light btn-sm">
                        VIEW
                    </a>
                    <a href="categories.php" class="btn btn-outline-light btn-sm">
                        ADD
                    </a>
                </div>
            </div>

            <!-- Users -->
            <div class="card bg-warning mb-3">
                <div class="card-body text-center text-white">
                    <h3>Users</h3>
                    <p class="h4">
                        <i class="fa-solid fa-users"></i>
                        <?= $num_users ?>
                    </p>
                    <a href="users.php" class="btn btn-outline-light btn-sm">
                        VIEW
                    </a>
                    <a href="users.php" class="btn btn-outline-light btn-sm">
                        ADD
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("_parts/_footer.php");
?>