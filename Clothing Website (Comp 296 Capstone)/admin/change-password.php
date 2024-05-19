<?php include('partials/collection.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id'])){

                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Type Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="Type New Password">

                    </td>
                </tr>

                <tr>
                    <td>Confirm New Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm New Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-update">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php 

    if(isset($_POST['submit'])){

        $id=$_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE){

            $count=mysqli_num_rows($res);

            if($count==1){

                if($new_password==$confirm_password){

                    $sql2 = "UPDATE tbl_admin SET
                        password='$new_password'
                        WHERE id=$id
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==TRUE){

                        $_SESSION['pass-changed'] = "Password Succesfully Changed";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    else{

                        $_SESSION['pass-changed'] = "Password Change Failed";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else{

                    $_SESSION['pass-not-matched'] = "Password Does Not Match";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else{

                $_SESSION['user-not-found'] = "Admin Not Found";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
    }

?>

<?php include('partials/footer.php'); ?>