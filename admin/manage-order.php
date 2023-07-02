<?php include('partials/menu.php'); ?>

        <!--Main Content Section Starts -->
        <div class="main-content" >
            <div class="wrapper" >
                <h1>Manage Orders</h1></br>
                </br><br>
                <table class="tbl-full" >
                    <tr>
                        <th>Order id</th>
                        <th>Status</th>
                        <th>Subtotal</th>
                        <th>Customer Name</th>
                        <th>Action</th>

                    </tr>
                    <?php 
                                //guery to get all admin
                                $sql = "SELECT o.*, u.business_name FROM `order` AS o JOIN `user` AS u ON o.userid = u.id";
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
                                            $status = $rows['status'];
                                            $subtotal = $rows['subtotal'];
                                            $business_name = $rows['business_name'];

                                            //display the values in our table
                                            ?>

                                                <tr>
                                                    <td><?php echo $id; ?></td>
                                                    <td><?php echo $status; ?></td>
                                                    <td><?php echo $subtotal; ?></td>
                                                    <td><?php echo $business_name; ?></td>
                                                    <td>
                                                        <a href="<?php echo SITEURL; ?>admin/orderview.php?id=<?php echo $id; ?>" class="btn-secondary">View Order</a>
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