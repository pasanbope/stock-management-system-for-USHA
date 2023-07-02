<?php

    // get data from url
    $email = $_GET['email'];
    $name = $_GET['name'];
    $username = $_GET['username'];
    $password = $_GET['password'];  

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
    <h1>Sending email</h1>
    <script defer>
        emailjs.init('cjWhnn8zn8WT9HNsY');
        emailjs.send("service_cntfkxa","template_am899mj",{
            to_name: "<?php echo $name; ?>",
            message: "Your login details are as follows: \n Username: <?php echo $username; ?> \n Password: <?php echo $password; ?>",
            to_email: "<?php echo $email; ?>",
        }).then(res => {
            if(res.status === 200){
                // redirect
                window.location.href = "./manage-admin.php";
            }
        }).catch(err => console.log(err))

    </script>
</body>
</html>