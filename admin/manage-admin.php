<?php include('partials/menu.php'); ?>

        <!--Main Content Section Starts -->
        <div class="main-content" >
            <div class="wrapper" >
                <h1>Manage Users</h1></br>
                </br>

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //desplay session message
                        unset($_SESSION['add']); //removing session message
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                </br><br>
                <!--Button to add admin -->
                <a href="add-admin.php" class="btn-primary" >Add Users</a></br></br>
                <table class="tbl-full" >
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Business Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                                //guery to get all admin
                                $sql = "SELECT * FROM user";
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
                                            $name = $rows['name'];
                                            $username = $rows['username'];
                                            $contact = $rows['phone'];
                                            $email = $rows['email'];
                                            $address = $rows['address'];
                                            $business_name = $rows['business_name'];

                                            //display the values in our table
                                            ?>

                                                <tr>
                                                    <td><?php echo $sn++; ?></td>
                                                    <td><?php echo $name ?></td>
                                                    <td><?php echo $username ?></td>
                                                    <td><?php echo $business_name ?></td>
                                                    <td><?php echo $contact ?></td>
                                                    <td><?php echo $email ?></td>
                                                    <td><?php echo $address ?></td>
                                                    <td>
                                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary" >Update </a>
                                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;  ?>" class="btn-danger" >Delete </a>
                                                    </td>
                                                </tr>


                                            <?php
                                        }
                                    }
                                }
                            ?>
                </table>
            </div>
        </div>

<?php include('partials/footer.php'); ?>