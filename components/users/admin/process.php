<?php

$mysqli = new Mysqli("localhost","root","","portfolio_zappy") or die(mysql_error($mysqli));

$id = 0;
$update = false;
$name = '';
$description = '';
$stock = '';
$price = '';
$image = '';

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $mysqli->query("INSERT INTO product(name, description, stock, price, image) VALUES('$name, $description, $stock, $price, $image'") or 
    die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] =  "success";

    header("location: products.php");

}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM product WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: products.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM product WHERE id=$id") or die($mysqli->error());
    echo gettype($result);
    if (count($result)==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $description = $row['description'];
        $stock = $row['stock'];
        $price = $row['price'];
        $image = $row['image'];
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $mysqli->query("UPDATE product SET name='$name', description='$description', stock='$stock', price='$price', image='$image' WHERE id=$id") or 
            die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "Warning";

    header('location: products.php');
}