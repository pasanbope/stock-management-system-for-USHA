<?php include('partials/menu.php'); ?>

<div class="main-content" >
    <div class="wrapper" >
        <h1>Add Product</h1></br>


        <?php 
            if(isset($_SESSION['add-category']))
            {
                echo $_SESSION['add-category']; //desplay session message
                unset($_SESSION['add-category']); //removing session message
            }
        ?>
                </br></br>



        <form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
        <tr>
            <td>Product name: </td>
            <td>
                <input type="text" name="pname" placeholder="Enter Your pName" />
            </td>
        </tr>
        <tr>
            <td>Price: </td>
            <td>
                <input type="text" name="price" placeholder="Enter price" />
            </td>
        </tr>
        <tr>
            <td>Short Description: </td>
            <td>
                <textarea  name="shortdescription" ></textarea>
            </td>
        </tr>
        <tr>
            <td>Description: </td>
            <td>
                <textarea  name="desc" ></textarea>
            </td>
        </tr>
        <tr>
            <td>Image: </td>
            <td>
                <input type="file" name="image" />
            </td>
        </tr>
        <tr>
            <td>Stock</td>
            <td>
                <input type="text" name="stock" placeholder="Enter stock" />
            </td>

        </tr>
        <tr>
            
            <td>Category</td>
            <td>
                <input type="text" name="category" placeholder="Enter Category">
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
       $productname = $_POST['pname'];
       $price = $_POST['price'];
       $shortdesc = $_POST['shortdescription'];
       $description = $_POST['desc'];
         $stock = $_POST['stock'];
            $category = $_POST['category'];
        // Check if a new image is uploaded
        if(isset($_FILES['image']['name']))
        {
            $image = $_FILES['image']['name'];

            // Check if the image is successfully uploaded
            if($image != '')
            {
                // Get the extension of the image
                $ext = end(explode('.', $image));

                // Generate a unique name for the image
                $image_name = "Product_".rand(0000,9999).'.'.$ext;

                // Get the source and destination paths
                $src_path = $_FILES['image']['tmp_name'];
                $dest_path = "../img/products/".$image_name;

                // Move the uploaded image to the destination folder
                $upload = move_uploaded_file($src_path, $dest_path);

                // Check if the image is successfully moved
                if(!$upload)
                {
                    // Failed to move the image
                    $_SESSION['add-category'] = "<div class='error'>Failed to upload the image.<div>";
                    header("location:".SITEURL.'admin/add-category.php');
                    exit(); // Stop further execution
                }
            } else {
                // Image is not uploaded
                $image_name = 'default.jpg';
            }
        }
        else
        {
            // Image is not uploaded
            $image_name = 'default.jpg';
        }

        // SQL query to save data in the database
        $sql = "INSERT INTO `product` 
                (`product_name`, `price`, `short_description`, `description`, `image`, `stock`, `category`)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);

        // Bind the parameters with the values
        mysqli_stmt_bind_param($stmt, 'sssssis', $productname, $price, $shortdesc, $description, $image_name, $stock, $category);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Data inserted successfully
            $_SESSION['add-category'] = "<div class='success'>Category Added Successfully.</div>";
            header("location:" . SITEURL . 'admin/manage-category.php');
        } else {
            // Failed to insert data
            $_SESSION['add-category'] = "<div class='error'>Failed to add category.</div>";
            header("location:" . SITEURL . 'admin/add-category.php');
        }

        // Close the statement
        mysqli_stmt_close($stmt);

    }
  
    ?>