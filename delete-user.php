<?php
require_once("functions/config.php");

// ==== Input ====
$account_id = $_SESSION['active_account_id'];

// ==== Process ====
$user = getUser($account_id);
// print_r($user);

// Delete
if (isset($_POST['btn_delete'])) {
    deleteUser($account_id);
}

// ==== Output ====
$page_title = "Delete User";
include("_parts/_header.php");

// Show menu
showMenu();
?>


<main class="card w-25 mx-auto border-0 my-5">
    <div class="card-header bg-white border-0">
        <h2 class="card-title text-center text-danger h4 mb-0">Delete User</h2>
    </div>

    <div class="card-body">
        <div class="text-center mb-4">
            <i class="fas fa-exclamation-triangle text-warning display-4 d-block mb-2"></i>
            <p class="fw-bold mb-0">Are you sure you want to delete the user "<?= $user['username'] ?> (<?= $user['full_name'] ?>)"?</p>
        </div>

        <div class="row">
            <div class="col">
                <a href="Users.php" class="btn btn-secondary w-100">Cancel</a>
            </div>
            <div class="col">

                <form action="" method="POST">
                    <button type="submit" class="btn btn-outline-danger w-100" name="btn_delete">Delete</button>
                </form>

            </div>
        </div>
    </div>

</main>




<?php
include("_parts/_footer.php");

?>


<?php
// // 
// // This page needs to have $_GET['id']
// // 

// require "connection.php";

// // Functions
// function getProduct($id)
// {
//     $conn  = connection();

//     //SQL code
//     $sql = "SELECT * FROM products WHERE id = $id";
//     //specific record only
//     if ($result = $conn->query($sql)) {
//         return $result->fetch_assoc();
//         // return an associative array
//     } else {
//         die("Error retrieving all products: " . $conn->error);
//     }
// }

// //delete specific record
// function deleteProduct($id)
// {
//     $conn = connection();

//     //sql code = delete single record
//     $sql = "DELETE FROM products WHERE id = $id";

//     if ($conn->query($sql)) {
//         header("location:products.php");
//         exit;
//     } else {
//         die("Error deleting the product: " . $conn->error);
//     }
// }


// // Main
// // Error here
// $id = $_GET['id'];
// // for check
// // echo $id;
// // var_dump($id);

// $product = getProduct($id);
// // print_r($product);

// // When delete button pushed
// if (isset($_POST['btn_delete'])) {
//     $id = $_GET['id'];
//     // $id = $_POST['id'];

//     deleteProduct($id);
// }

?>