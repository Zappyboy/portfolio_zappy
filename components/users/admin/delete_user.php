<?php

require_once 'D:\Ksamp\htdocs\portfolio_zappy\config.php';

$id=$_REQUEST['id'];
$query = "DELETE FROM users WHERE id=$id"; 
$result = mysqli_query($link,$query) or die ( mysqli_error());
header("Location: users.php"); 

// $command = 'mysql'
//         . ' --host=' . $vals['db_host']
//         . ' --user=' . $vals['db_user']
//         . ' --password=' . $vals['db_pass']
//         . ' --database=' . $vals['db_name']
//         . ' --execute="SOURCE ' . $script_path
// ;
// $output1 = shell_exec($command . 'reseed.sql"');

?>