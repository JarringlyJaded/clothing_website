<?php include('configure/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoCo</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="navbar">
        <div class="container2">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/newlogo.jpg" alt="JoCo Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-left"> 
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>clothes.php">Clothes</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>contact.php">Contact</a>
                    </li>
                </ul>
            </div>


            
            <div class="menu top-right">
                <form action="<?php echo SITEURL; ?>clothing-search.php" method="POST">
                    <input type="search" name="search" placeholder="Search Products..." required> 
                </form>
            </div>
            

            <div class="clearfix"></div>
        </div>
    </section>