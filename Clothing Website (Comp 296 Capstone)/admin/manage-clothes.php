<?php include('partials/collection.php')?>

<div class="main-content4 text-center">
    <div class="wrapper">
        <h1>Manage Clothes</h1>

        <br /><br />

                <a href="<?php echo SITEURL; ?>admin/add-clothes.php" class="btn-primary">Add Clothes</a>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['add'])){

                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete'])){

                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['upload'])){

                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorized'])){

                        echo $_SESSION['unauthorized'];
                        unset($_SESSION['unauthorized']);
                    }

                    if(isset($_SESSION['update'])){

                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <div class="whitebox">
                    <table class="tbl-full">
                        <tr>
                            <th>Number</th>
                            <th>Clothing Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Featured</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>

                        <?php 
                            
                            $sql = "SELECT * FROM tbl_clothes";

                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);

                            $sn=1;

                            if($count>0){

                                while($row=mysqli_fetch_assoc($res)){

                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $price = $row['price'];
                                    $image_name = $row['image_name'];
                                    $featured = $row['featured'];
                                    $active = $row['active'];
                                    ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td>$<?php echo $price; ?></td>
                                        <td>

                                            <?php 
                                               
                                                if($image_name==""){

                                                    echo "No Image Added";
                                                }
                                                else{

                                                    ?>
                                                    <img src="<?php echo SITEURL; ?>images/clothes/<?php echo $image_name; ?>" width="100px">
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-clothes.php?id=<?php echo $id; ?>" class="btn-update">Update Clothes</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-clothes.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete Clothes</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            else{

                                echo "<tr> <td colspan='7'> No Clothing Added </td> </tr>";
                            }

                        ?>

                    </table>
                </div>
    </div>
    
</div>

<?php include('partials/footer.php')?>