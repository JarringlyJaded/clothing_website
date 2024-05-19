<?php include('partials-frontend/collection.php'); ?>

    <section class="clothes-collection">
        <div class="container">
            <h2 class="text-center">Our Clothes</h2>

            <?php 

                $sql = "SELECT * FROM tbl_clothes WHERE active='Yes'";
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0){

                    while($row=mysqli_fetch_assoc($res)){

                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
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

    </section>

<?php include('partials-frontend/footer.php'); ?>