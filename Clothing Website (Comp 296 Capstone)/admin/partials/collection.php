<?php 

    include('../configure/constants.php');
    include('login-check.php');

?>

<html>
    <head>
        <title>Joco Admin</title>

        <link rel="stylesheet" href="../css/admin.css">
    <head>

    <body>
        <div class="collection text-center">
            <div class="wrapper">
                <ul>
                   <li><a href="index.php">Home</a></li> 
                   <li><a href="manage-admin.php">Admin</a></li> 
                   <li><a href="manage-category.php">Category</a></li> 
                   <li><a href="manage-clothes.php">Clothes</a></li> 
                   <li><a href="manage-order.php">Order</a></li>
                   <li><a href="logout.php">Logout</a></li> 
                <ul>
            </div>
        </div>
    </body>
</html>