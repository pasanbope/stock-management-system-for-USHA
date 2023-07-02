<?php include('partials/menu.php'); ?>

<div class="main-content" >
    <div class="wrapper">
        <h1>Update User</h1>
        <br><br>

        <?php 
        
            //get the id of selected admin
            $id = $_GET['id'];

            //create sql query to get the details
            $sql = "SELECT * FROM user WHERE id = $id";

            //execute the query
            $res = mysqli_query($conn, $sql);

            //check whether the query is executed or not
            if($res==true)
            {
                //check whether the data is available or not
                $count = mysqli_num_rows($res);
                //check whether we have admin data or not
                if($count==1)
                {
                    //get the details
                    //echo "Admin Available";
                    $row = mysqli_fetch_assoc($res);

                    $name = $row['name'];
                    $username = $row['username'];
                    $contact = $row['phone'];
                    $email = $row['email'];
                    $address = $row['address'];
                }
                else
                {
                    //redirect to manage admin papge
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        
        ?>


        <br><br>
        <form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>Name: </td>
            <td>
                <input type="text" name="name" value="<?php echo $name; ?>" />
            </td>
        </tr>
        <tr>
            <td>User Name: </td>
            <td>
                <input type="text" name="username" value="<?php echo $username; ?>" />
            </td>
        </tr>
        <tr>
            <td>Contact: </td>
            <td>
                <input type="text" name="phone" value="<?php echo $contact; ?>" />
            </td>
        </tr>
        <tr>
            <td>Email: </td>
            <td>
                <input type="text" name="email" value="<?php echo $email; ?>" />
            </td>
        </tr>
        <tr>
            <td>Address: </td>
            <td>
                <input type="text" name="address" value="<?php echo $address; ?>" />
            </td>
        </tr>
        
        <tr>
            <td colspan="2" >
                <input type="hidden" name="id" value="<?php echo $id; ?>" >
                <input type="submit" name="submit" value="Submit" class="btn-secondary" />
            </td>
        </tr>
    </table>
</form>


    </div>
</div>

<?php 

    //check whether the submit button clicked or not
    if(isset($_POST['submit']))
    {
        //get all the value from form to update
        $name = $_POST['name'];
       $username = $_POST['username'];
       $contact = $_POST['phone'];
       $email = $_POST['email'];
       $address = $_POST['address'];

        //create a sql query to update admin
        $sql = "UPDATE user SET
        name = '$name',
        username = '$username',
        phone = '$contact',
        email = '$email',
        address = '$address'
        WHERE id=$id
        ";

        //execute the Query
        $res = mysqli_query($conn, $sql);

        //check whether the query executed successfully or not
        if($res==true)
        {
            //query executed and admin updated
            $_SESSION['update'] = "<div class='success'>User updated successfully.<div>";
            //redirect to manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //failed to update admin
            $_SESSION['update'] = "<div class='success'>Failed to update User.<div>";
            //redirect to manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }

    }

 ?>

<?php include('partials/footer.php'); ?>