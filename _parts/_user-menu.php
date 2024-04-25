<nav class="navbar navbar-expand-md navbar-dark" style="background-color:darkcyan;">
    <div class="container">
        <!-- Mobile icon/button -->
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu-list">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu list -->
        <div class="collapse navbar-collapse" id="menu-list">
            <!-- left menu -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="posts.php" class="nav-link">My Posts</a>
                </li>
                <li class="nav-item">
                    <a href="add-post.php" class="nav-link">Add Post</a>
                </li>
            </ul>
            <!-- right menu -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <?= $_SESSION['full_name'] ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>