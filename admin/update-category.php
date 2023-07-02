<?php include('partials/menu.php'); ?>

<div class="main-content" >
    <div class="wrapper">
        <h1>Update Product</h1>
        <br><br>

        <?php 
        
            //get the id of selected admin
            $id = $_GET['id'];

            //create sql query to get the details
            $sql = "SELECT * FROM product WHERE id = $id";

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

                    $pname = $row['product_name'];
                    $price = $row['price'];
                    $shortdesc = $row['short_description'];
                    $desc = $row['description'];
                    $image = $row['image'];
                    $stock = $row['stock'];
                    $category = $row['category'];
                }
                else
                {
                    //redirect to manage admin papge
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        
        ?>


        <br><br>
        <form action="" method="POST"  enctype="multipart/form-data">
    <table class="tbl-30">
        <tr>
            <td>Product Name: </td>
            <td>
                <input type="text" name="pname" value="<?php echo $pname; ?>" />
            </td>
        </tr>
        <tr>
            <td>Price: </td>
            <td>
                <input type="text" name="price" value="<?php echo $price; ?>" />
            </td>
        </tr>
        <tr>
            <td>Short Desc: </td>
            <td>
                <textarea  name="shortdescription" ><?php echo $shortdesc; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Description: </td>
            <td>
            <textarea  name="description"  ><?php echo $desc; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Image: </td>
            <td>
                <input type="file" name="image"  />
            </td>
        </tr>
        <tr>
            <td>Stock</td>
            <td>
                <input type="text" name="stock" placeholder="Enter stock" value="<?php echo $stock; ?>" />
            </td>

        </tr>
        <tr>
            <td>Category</td>
            <td>
                <input type="text" name="category" placeholder="Enter Category" value="<?php echo $category; ?>">
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
        $pname = $_POST['pname'];
       $price = $_POST['price'];
       $shortdesc = $_POST['shortdescription'];
       $desc = $_POST['description'];
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
        mysqli_stmt_bind_param($stmt, 'sssssis', $pname, $price, $shortdesc, $desc, $image_name, $stock, $category);

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

<?php include('partials/footer.php'); ?>