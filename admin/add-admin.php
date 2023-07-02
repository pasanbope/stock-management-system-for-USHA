<?php include('partials/menu.php'); ?>
<div class="main-content" >
    <div class="wrapper" >
        <h1>Add User</h1></br>


        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //desplay session message
                unset($_SESSION['add']); //removing session message
            }
        ?>
                </br></br>



        <form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>Name: </td>
            <td>
                <input type="text" name="name" placeholder="Enter Your Name" />
            </td>
        </tr>
        <tr>
            <td>User Name: </td>
            <td>
                <input type="text" name="username" placeholder="Enter Your userName" />
            </td>
        </tr>
        <tr>
            <td>Business Name: </td>
            <td>
                <input type="text" name="business_name" placeholder="Enter Business name" />
            </td>
        </tr>
        <tr>
            <td>password: </td>
            <td>
                <input type="password" name="password" placeholder="password" />
            </td>
        </tr>
        <tr>
            <td>contact: </td>
            <td>
                <input type="text" name="phone" placeholder="Enter phone no" />
            </td>
        </tr>
        <tr>
            <td>Email: </td>
            <td>
                <input type="email" name="email" placeholder="Enter Email" />
            </td>
        </tr>
        <tr>
            <td>Address: </td>
            <td>
                <input type="text" name="address" placeholder="Enter Address" />
            </td>
        </tr>
        
        <tr>
            <td colspan="2" >
                <input type="submit" name="submit" value="Submit" class="btn-secondary" />
            </td>
        </tr>
    </table>
</form>
</div>
</div>
<?php include('partials/footer.php'); ?>

<?php 
    //Process the value from form and save it in database

    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "clicked"; 
        //get the data from form
       $name = $_POST['name'];
       $username = $_POST['username'];
       $password = $_POST['password'];//md5 is encripted password
       $contact = $_POST['phone'];
       $email = $_POST['email'];
       $address = $_POST['address'];
       $business_name = $_POST['business_name'];

       //sql query to save data in database
       $sql = "INSERT INTO user SET 
        name = '$name',
        username = '$username',
        password = '$password',
        phone = '$contact',
        email = '$email',
        address = '$address',
        business_name = '$business_name'
       ";

       


        //executing query and saving data in database
        $res = mysqli_query($conn,$sql) or die(mysqli_error());

        //check whether the data is inserted not and display appropiate message
        if($res==TRUE)
        {
            //data inserted
            
            //echo "data inserted";
            //create a session variable to display message
            $_SESSION['add'] = "<div class='success'>user Added Successfully.<div>";
            //Redirect Page to add admin
            header("location:".SITEURL.'admin/sendEmail.php?email='.$email.'&password='.$_POST['password'].'&name='.$name.'&username='.$username.'');
        }
        else
        {
            //failed ti insert data
            //echo "faile to insert data";
            //create a session variable to display message
            $_SESSION['add'] = "<div class='success'>Failed to add user.<div>";
            //Redirect Page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }
  
    
?>
