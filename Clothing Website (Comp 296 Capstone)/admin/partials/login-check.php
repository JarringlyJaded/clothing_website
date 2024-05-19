<?php 

    if(!isset($_SESSION['user'])){

        $_SESSION['no-login-message'] = "<div class='text-center'>Log in to Access Admin Functions</div>";

        header('location:'.SITEURL.'admin/login.php');
    }

?>