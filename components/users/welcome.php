<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        .btn-good { color: white; background-color: green; border-color: green; }
        .btn-warning{color:#000;background-color:#ffc107;border-color:#ffc107}
        .btn-danger{color:#fff;background-color:#dc3545;border-color:#dc3545}    
        </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Home</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="D:\Ksamp\htdocs\portfolio_zappy\index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../projects.php">Products</a>
        </li>
      </ul>
      <span class="navbar-text">
      <a class="nav-link" href="welcome.php">Login</a>
      </span>
    </div>
  </div>
</nav>
<br>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your dashboard.</h1>
    </div>
    <p>
        <?php
        if ($_SESSION["user_type"] == 'Admin'){
        ?>
        <a href="admin/users.php" class="btn btn-good">Manage Users</a>
        <a href="admin/products.php" class="btn btn-warning">View Products</a>
        <?php
        }elseif ($_SESSION["user_type"] == 'User'){
        ?>
        <a href="profile.php" class="btn btn-good">Manage Profile</a>
        <a href="cart.php" class="btn btn-warning">Manage cart</a>
        <?php
        }
        ?>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>