
<?php 

    if(!isset($_GET['id']))
    {
    
        //redirect to manage order
        header('location:orders.php');
        exit();
    }
        
include "navbar.php"; 
    
    //get the id of selected order
        //get the order id
        $id = $_GET['id'];

        //get all the order details
        $sql = "SELECT o.id AS order_id, o.status, o.subtotal, o.orderDate , u.business_name, od.name, od.email, od.phone, od.address, od.zipcode, od.city
            FROM `order` AS o
            JOIN `orderdetail` AS od ON o.id = od.orderid
            JOIN `user` AS u ON o.userid = u.id
            WHERE o.id = '$id'";
        //execute the query
        $res = mysqli_query($conn,$sql);
        //count the rows
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //get all the data
            $row = mysqli_fetch_assoc($res);
            // retrieve products
            $sql = "SELECT p.product_name, p.price, oi.quantity FROM `orderitem` AS oi JOIN `product` AS p ON oi.productid = p.id WHERE oi.orderid = '$id'";
            $res = mysqli_query($conn,$sql);
            $products = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
        else
        {
            //redirect to manage order
            header('location:orders.php');
        }
    
?>
<style type="text/css" >
        .invoice-box{
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: Arial, Helvetica, sans-serif;
        }
        .invoice-box table{
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td{
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2)
        {
            text-align: right;
        }
        .invoice-box table tr.top table td{
            padding-bottom: 20px;
        }
        .invoice-box table tr.information table td
        {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td
        {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td{
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td
        {
            border-bottom: 1px solid #eee;
        }
        @media only screen and (max-width:600px)
        {
            .invoice-box table tr.top table td
            {
                width: 100%;
                display: block;
                text-align: center;
            }
            .invoice-box table tr.information table td
            {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
</style>
    <div class="invoice-box" >
        <?php
        if($row["status"] == "dispatch"){
            echo '<a href="admin/changeStatus.php?orderid='.$row["order_id"].'&status='.$row["status"].'" class="btn btn-success">Mark as Recieved</a>';
        }
        ?>
        <table cellpadding="0" cellspacing="0" >
            <tr class="top">
                <td colspan="2" >
                <!-- again create next table -->
                <table>
                    <tr>
                        <td>
                            <img src="../img/usha.png" height="25px" alt="" class="img-fluid1">
                        </td>
                        <td>
                            Invoice : #<?php echo $row["order_id"] ?><br>
                            Order Placed : <?php echo $row["orderDate"] ?><br>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr class="information" >
                <td colspan="2" >
                    <!--inner table start-->
                    <table>
                        <tr>
                            <td>
                                Owner of the Usha : matheesha<br>
                                Phone : 0723726658<br>
                                Status : <?php echo $row["status"] ?>
                            </td>
                            <td>
                                <?php echo $row["business_name"] ?><br>
                                Address: <?php echo $row["address"] ?><br>
                                Email: <?php echo $row["email"] ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading" >
                <td>
                    Payment Method
                </td>
                <td>Amount #</td>
            </tr>
            <tr class="details" >
                <td>Bank Transfer (<?php echo $row["status"] ?>)</td>
                <td><?php echo $row["subtotal"] ?></td>
            </tr>
            <tr class="heading" >
                <td>Item</td>
                <td>Price</td>
            </tr>
            <?php foreach($products as $product) { ?>
            <tr class="item" >
                <td><?php echo $product["product_name"] ?></td>
                <td><?php echo $product["price"] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
<?php include "footer.php"; ?>



