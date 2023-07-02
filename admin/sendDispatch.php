<?php
    include('../config/constants.php');
    // get data from url
    $email = $_GET['email'];
    $name = $_GET['name'];
    $orderid = $_GET['orderid'];

    $sql = "UPDATE `order` SET `status`='dispatch' WHERE `id`='$orderid'";
    mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
</head>
<body>
    <h1>Sending dispatch email</h1>
    <script defer>
        emailjs.init('cjWhnn8zn8WT9HNsY');
        emailjs.send("service_cntfkxa","template_2d6s3qs",{
            to_name: "<?php echo $name; ?>",
            order_id: "<?php echo $orderid; ?>",
            to_email: "<?php echo $email; ?>",
        }).then(res => {
            if(res.status === 200){
                // redirect
                window.location.href = "./manage-order.php";
            }
        }).catch(err => console.log(err))

    </script>
</body>
</html>