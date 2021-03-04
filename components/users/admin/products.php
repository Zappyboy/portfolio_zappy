<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body{ font: 14px sans-serif; text-align: center }
        .btn-good { color: white; background-color: green; border-color: green; }
    </style>
    <title>Edit Products</title>
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
          <a class="nav-link" href="/portfolio_zappy/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/portfolio_zappy/components/about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/portfolio_zappy/components/contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/portfolio_zappy/components/projects.php">Products</a>
        </li>
      </ul>
      <span class="navbar-text">
      <a class="nav-link" href="../welcome.php">Login</a>
      </span>
    </div>
  </div>
</nav>
<br>
<?php require_once 'process.php';?>
<?php 
if (isset($_SESSION['message'])): ?>

<div class="alert alert-<?$_SESSION['msg_type']?>">

    <?php 
        echo $_SESSION['message'];
        unset ($_SESSION['message']);

    ?>
</div>
<?php endif ?>
<div class="container">
<?php
$mysqli = new mysqli('localhost', 'root', '', 'portfolio_zappy') or die(mysql_error($mysqli));
$result = $mysqli->query("SELECT * FROM product") or die($mysqli->error);
?>
<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Image</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <?php 
            while ($row = $result->fetch_assoc()): 
        ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['image']; ?></td>
                <td>
                    <a href="products.php?edit=<?php echo $row['id']; ?>"
                        class="btn btn-good">Edit</a>
                    <a href="process.php?delete=<?php echo $row['id']; ?>"
                        class="btn btn-danger">Delete</a>
                </td>
                <?php endwhile; ?>
            </tr>
    </table>
</div>

<br>
<br>

<div class="row justify-content-center">
    <form action="process.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="form-group">
    <label>Product Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $name;?>" placeholder="Enter product name">
    </div>
    <br>
    <div class="form-group">
    <label>Product Description</label>
    <input type="text" name="description" class="form-control" value="<?php echo $description;?>" placeholder="Enter product description">
    </div>
    <br>    
    <div class="form-group">
    <label>Product Stock</label>
    <input type="text" name="stock" class="form-control" value="<?php echo $stock;?>" placeholder="Enter product stock">
    </div>
    <br>
    <div class="form-group">
    <label>Product Price</label>
    <input type="text" name="price" class="form-control" value="<?php echo $price;?>" placeholder="Enter product price">
    </div>
    <br>
    <div class="form-group">
    <label>Product Image</label>
    <input type="text" name="image" class="form-control" value="<?php echo $image;?>" placeholder="Upload product image">
    </div>
    <br>
    <div class="form-group">
    <?php 
    if ($update == true):
    ?>
        <button type="submit" class="btn btn-good" name="update">Update</button>
    <?php else: ?>
    <button type="submit" class="btn btn-warning" name="save">Save</button>
    <?php endif; ?>
    </div>
    </form>
</div>
</div>
</body>
</html>