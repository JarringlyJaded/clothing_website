<?php include('partials/collection.php')?>

<div class="main-content3 text-center">
    <div class="wrapper">
        <h1>Manage Categories</h1>

        <br /><br />

        <?php 
        
            if(isset($_SESSION['add'])){

                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove'])){

                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete'])){

                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found'])){

                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update'])){

                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload'])){

                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove'])){

                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        
        ?>
        <br><br>

                <a href="<?php echo SITEURL; ?>admin/add-categories.php" class="btn-primary">Add Categories</a>

                <br /><br /><br />
                <div class="whitebox">
                    <table class="tbl-full">
                        <tr>
                            <th>Number</th>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Featured</th>
                            <th>Active</th>
                            <th>Update/ Delete</th>
                        </tr>

                        <?php 
                            
                            $sql = "SELECT * FROM tbl_category";

                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);

                            $sn=1;

                            if($count>0){

                                while($row=mysqli_fetch_assoc($res)){

                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $image_name = $row['image_name'];
                                    $featured = $row['featured'];
                                    $active = $row['active'];

                                    ?>

                                        <tr>
                                            <td><?php echo $sn++ ?>. </td>
                                            <td><?php echo $title; ?></td>

                                            <td>

                                                <?php  

                                                    if($image_name!=""){

                                                        ?>

                                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                                                        
                                                        <?php
                                                    }
                                                    else{

                                                        echo "Image Not Added";
                                                    }
                                                ?>

                                            </td>

                                            <td><?php echo $featured; ?></td>
                                            <td><?php echo $active; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-update">Update Category</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-categories.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete Category</a>
                                            </td>
                                        </tr>

                                    <?php
                                }
                            }
                            else{

                                ?>

                                <tr>
                                    <td colspan="6"><div class="error">Category Not Added</div></td>
                                </tr>

                                <?php
                            }
                        
                        ?>

                    </table>
                </div>
    </div>
    
</div>

<?php include('partials/footer.php')?>