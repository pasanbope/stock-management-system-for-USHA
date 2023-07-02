<?php 
include 'navbar.php';

// get user details from cookie user_details
$user_details = unserialize($_COOKIE['user_details']);
?>


<!--Main Content Section Starts -->
        <div class="main-content" >
            <div class="wrapper" >
                <h1>Placed Orders</h1></br>
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
                                // get all the orders for current logged in user
                                $sql = "SELECT * FROM `order` WHERE `userid`=".$user_details['id']; 
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
                                            $business_name = $user_details['business_name'];

                                            //display the values in our table
                                            ?>

                                                <tr>
                                                    <td><?php echo $id; ?></td>
                                                    <td><?php echo $status; ?></td>
                                                    <td><?php echo $subtotal; ?></td>
                                                    <td><?php echo $business_name; ?></td>
                                                    <td>
                                                        <a href="orderview.php?id=<?php echo $id; ?>" class="btn-secondary">View Order</a>
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


<?php
    include 'footer.php';
?>