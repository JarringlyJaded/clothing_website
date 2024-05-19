<?php include('partials-frontend/collection.php'); ?>

    <!-- Search Section Starts Here -->
    <section class="clothing-search3 text-center">
        <div class="container">
            <?php 
            
                $search = $_POST['search'];

            ?>
            <h2>SEARCH RESULTS for <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- Search Section Ends Here -->



    <!-- Clothing Section Starts Here -->
    <section class="clothes-collection">
        <div class="container">
            <h2 class="text-center">Clothes</h2>

            <?php 

                $sql = "SELECT * FROM tbl_clothes WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0){

                    while($row=mysqli_fetch_assoc($res)){

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

                                            echo "<div class='error'>No Image Available</div>";
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

                                    <a href="#" class="btn btn-primary">Order Now</a>
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

    </section>
    <!-- Clothing Section Ends Here -->

<?php include('partials-frontend/footer.php'); ?>