<?php 

    include('../configure/constants.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE){

        $_SESSION['delete'] = "Admin Successfully Deleted"; 
        
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{

        $_SESSION['delete'] = "Failed to Delete Admin"; 
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

?>