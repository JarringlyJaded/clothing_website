<?php include('partials-frontend/collection.php'); ?>


    <?php 
        if(isset($_SESSION['order'])){

            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- Home Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Popular Categories</h2>

            <?php 

                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0){

                    while($row=mysqli_fetch_assoc($res)){

                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-clothes.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    
                                    if($image_name==""){

                                        echo "<div class='error'>Image Not Available</div>";
                                    }
                                    else{

                                        ?>
                                         <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                
                            </div>
                        </a>

                        <?php
                    }
                }
                else{

                    echo "Category Not Added";
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Home Categories Section Ends Here -->


    <!-- Home Clothing (Featured) Section Starts Here -->
    <section class="clothes-collection2">
        <div class="container">
            <h2 class="text-center">Our Top Sellers</h2>

            <?php 
            
            $sql2 = "SELECT * FROM tbl_clothes WHERE active='Yes' AND featured='Yes' LIMIT 6";
            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);

            if($count2>0){

                while($row=mysqli_fetch_assoc($res2)){

                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="clothes-collection-box">
                        <div class="clothes-menu-img">
                            <?php 

                                if($image_name==""){

                                    echo "Image Not Available";
                                }
                                else{

                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/clothes/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                        </div>

                        <div class="clothes-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="clothes-price">$<?php echo $price; ?></p>
                            <p class="clothes-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                    <a href="<?php echo SITEURL; ?>order.php?clothes_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

                    <?php
                }
            }
            else{

                echo "<div class='error'>Clothes Not Found</div>";
            }
            
            ?>


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL; ?>clothes.php">See All Clothes</a>
        </p>
    </section>
    <!-- Home Clothing (Featured) Section Ends Here -->

<?php include('partials-frontend/footer.php'); ?>