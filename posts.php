<?php
require_once("functions/config.php");

// print_r($_SESSION);

// ==== Process ====
$user_posts = getUserPosts($_SESSION['account_id']);
// print_r($user_posts);

if (isset($_POST['btn_submit_post_id'])) {
    $_SESSION['active_post_id'] = $_POST['btn_submit_post_id'];
    header("location:post-details.php");
}

// Output
$page_title = "Posts";
include("_parts/_header.php");

// Show menu
showMenu();
?>

<div class="container-fluid bg-primary">
    <div class="container">
        <h2 class="text-white m-0 py-3">
            <i class="fa-solid fa-pen-nib pe-1"></i>
            Posts
        </h2>
    </div>
</div>

<div class="container mt-5 mb-5">
    <a href="add-post.php" class="btn btn-primary w-100">Add Post</a>
</div>

<div class="container mb-5">
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
                <?php foreach ($user_posts as $post) : ?>
                    <tr>
                        <td><?= $post['id'] ?></td>
                        <td><?= $post['title'] ?></td>
                        <td><?= $post['category'] ?></td>
                        <td><?= $post['date_posted'] ?></td>
                        <td>
                            <!-- <form action="post-details.php" method="post"> -->
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

<?php
include("_parts/_footer.php");
?>