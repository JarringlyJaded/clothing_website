<?php 

    include('../configure/constants.php');


    if(isset($_GET['id']) AND isset($_GET['image_name'])){

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ""){

            $path = "../images/clothes/".$image_name;
            $remove = unlink($path);

            if($remove==false){

                $_SESSION['upload'] = "Image Removal Failed";
                header('location:'.SITEURL.'admin/manage-clothes.php');
                die();
            }
        }

        $sql = "DELETE FROM tbl_clothes WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true){

            $_SESSION['delete'] = "Successfully Deleted Clothes";
            header('location:'.SITEURL.'admin/manage-clothes.php');
        }
        else{

            $_SESSION['delete'] = "Failed to Delete Clothes";
            header('location:'.SITEURL.'admin/manage-clothes.php');
        }

    }
    else{

        $_SESSION['unauthorized'] = "Access Unauthorized";
        header('location:'.SITEURL.'admin/manage-clothes.php');
    }

?>
