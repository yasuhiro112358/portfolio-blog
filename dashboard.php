<?php
require_once("functions/config.php");

// ==== Process ====
$all_posts = getAllPosts();
// print_r($all_posts);


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
                                    <button class="btn btn-outline-dark">
                                        <i class="fa-solid fa-angles-right"></i>
                                        Details
                                    </button>
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
                        2
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
                        3
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
                        2
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