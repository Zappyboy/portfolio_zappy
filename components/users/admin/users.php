<?php require_once 'D:\Ksamp\htdocs\portfolio_zappy\config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{ font: 14px sans-serif; }
        table {
            border-collapse: collapse;
            width: 30%;
            color: black;
        }
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
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>User Type</th>
            <th>Delete</th>
        </tr>
        <?php 
        $sql = "SELECT * FROM users";
        $result = $link-> query($sql);
        if($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['user_type'] . "</td>";
                    echo "<td>" . '<a href="delete_user.php?id='.$row['id'].'">Delete</a>' . "</td>";
                    echo "</tr>";
                     }
            echo "</table>";
        }
        else {
            echo "0 result";
        }
        $link-> close();
        ?>
    </table>
</body>
</html>