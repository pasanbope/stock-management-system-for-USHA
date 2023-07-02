<?php include('partials/menu.php'); ?>

        <!--Main Content Section Starts -->
        <div class="main-content" >
            <div class="wrapper" >
                <h1>Manage Products</h1></br>
                <?php 
            if(isset($_SESSION['add-category']))
            {
                echo $_SESSION['add-category']; //desplay session message
                unset($_SESSION['add-category']); //removing session message
            }
            if(isset($_SESSION['delete-category']))
            {
                echo $_SESSION['delete-category']; //desplay session message
                unset($_SESSION['delete-category']); //removing session message
            }
            if(isset($_SESSION['update-category']))
            {
                echo $_SESSION['update-category']; //desplay session message
                unset($_SESSION['update-category']); //removing session message
            }
                ?>
                </br></br>
                <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Product</a>
                </br><br>
                <table class="tbl-full" >
                    <tr>
                        <th>Product id</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>description</th>
                        <th>Stock</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                                //guery to get all admin
                                $sql = "SELECT * FROM product";
                                //execute the query
                                $res = mysqli_query($conn,$sql);

                                //check whether the query is executed or not
                                if($res==TRUE)
                                {
                                    //count rous to check whether we have data in database or not
                                    $count = mysqli_num_rows($res); //function to get all the rows in database

                                    //check the number of rows
                                    if($count>0){

                                        $sn =1; //create variable and assign the value

                                        //we have data in database
                                        while($rows=mysqli_fetch_assoc($res))
                                        {
                                            //using while loop to get all the data from database
                                            //and while loop will run as long as we have data in database

                                            //get individual data
                                            $id = $rows['id'];
                                            $productname = $rows['product_name'];
                                            $price = $rows['price'];
                                            $stock = $rows['stock'];
                                            $description = $rows['description'];
                                            $image = $rows['image'];
                                            

                                            //display the values in our table
                                            ?>

                                                <tr>
                                                    <td><?php echo $sn++; ?></td>
                                                    <td><?php echo $productname ?></td>
                                                    <td><?php echo $price ?></td>
                                                    <td><?php echo $description ?></td>
                                                    <td><?php echo $stock ?></td>
                                                    <td><?php echo $image ?></td>
                                                    <td>
                                                        
                                                        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary" >Update </a>
                                                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;  ?>" class="btn-danger" >Delete </a>
                                                    </td>
                                                </tr>


                                            <?php
                                        }
                                    }
                                }
                            ?>
                </table>
                </br>
            </div>
        </div>

        <?php include('partials/footer.php'); ?>