<?php include('../configure/constants.php');?>

<html>
    <head>
        <title>Admin Login For JoCo</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="main-content6">

            <?php 
                if(isset($_SESSION['login'])){

                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message'])){

                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>
        
            <div class="login">
                <h1 class="text-center">Admin Login</h1>
                <br><br>
                <form action="" method="POST" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="Enter Username"><br><br>

                Password: <br>
                <input type="password" name="password" placeholder="Enter Password"><br><br>

                <input type="submit" name="submit" value="Login" class="btn-primary">
                <br><br>
                <input type="checkbox" checked="checked"> Remember Me
                </form>
            </div>

        </div>


    </body>
</html>

<?php 

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1){

            $_SESSION['login'] = "<div>Successfully Logged In</div>";
            $_SESSION['user'] = $username;

            header('location:'.SITEURL.'admin/');
        }
        else{

            $_SESSION['login'] = "<div class='text-center'>Username or Password Was Not Recognized</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>