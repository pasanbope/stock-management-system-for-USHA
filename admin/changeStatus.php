<!-- change status by retrieving id and status from get -->
<?php
    include('../config/constants.php');
    if(isset($_GET["orderid"]) && isset($_GET["status"])){
        $orderid = $_GET["orderid"];
        $status = $_GET["status"];
        switch ($status) {
            case 'pending':
                $status = "paid";
                break;
            case 'paid':
                $status = "dispatch";
                break;
            case 'dispatch':
                $status = "completed";
                break;
            default:
                $status = "pending";
                break;
        }
        $sql = "UPDATE `order` SET `status`='$status' WHERE `id`='$orderid'";
        $result = mysqli_query($conn,$sql);
        if($result && $status != "completed"){
            header("Location: orderview.php");
            exit;
        }
        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } 
    }
?>