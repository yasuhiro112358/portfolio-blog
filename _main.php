<?php
// ==== Reference for main procedure ====

// 
if (isset($_POST['btn_add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $section_id = $_POST['section_id'];

    createProduct($name, $description, $price, $section_id);
}

// When delete button pushed
if (isset($_POST['btn_delete'])) {
    $id = $_GET['id'];
    // $id = $_POST['id'];

    deleteProduct($id);
}

//collect the data from the form
if (isset($_POST['btn_add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $section_id = $_POST['section_id'];
    $id = $_GET['id'];

    updateProduct($id, $name, $description, $price, $section_id);
}

// Login
if (isset($_POST['btn_log_in'])) {
    $password = $_POST['password'];
    $username = $_POST['username'];

    login($username, $password);
}


// Loop inside HTML
// print_r(getAllProducts());
$all_products = getAllProducts();
while ($product = $all_products->fetch_assoc()) {
    // print_r($product);
    // echo "<br>";
}

// Update photo
// collect data from the form
if (isset($_POST["btn_upload_photo"])) {
    $photo_name = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    // $photo_tmp = $_FILES['photo']['size'];
    $id = $_SESSION["user_id"];

    updatePhoto($id, $photo_name, $photo_tmp);

    // properties of image.photo
    /**
     *  name = name of the file
     *  tmp_name = path of the file inside the temporary storage in your computer
     *  size = size of the file in bytes
     * 
     */
}

?>

<!-- Show photo only if it exists -->
<?php if ($user['photo']) : ?>
    <img src="assets/image/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>" class="card-img-top">
<?php else : ?>
    <i class="fa-regular fa-user text-center profile-icon"></i>
<?php endif; ?>


<?php
//  Create User Account only if Confirmation Password matched 
if (isset($_POST['btn_sign_up'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {
        createUser($first_name, $last_name, $username, $password);
    } else {
        echo "<p class='text-danger text-center'>Password and confirm password do not match</p>";
    }
}


?>