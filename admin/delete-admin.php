<?php 
    //include constants.php file here
    include('../config/constants.php');

    //get the id of admin to be deleted
    $id = $_GET['id'];
    //create sql query to delete admin
    $sql = "DELETE FROM user WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //redirect to manage admin page with massage(success/error)
    if($res==true)
    {
        //query executed successfully and Admin delete
        //echo "Admin Deleted";
        //create session variable to display message
        $_SESSION['delete'] = "<div class='success'>User Deleted Successfully.</div>";
        //Redirect to manage Admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to delete Admin
        //echo "Failed to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete User. Try Again later</div> ";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
?>