<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/gymwithcoach.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    .btn {
        margin-top: 10px;
        padding: 10px 20px;
        background-color:black;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color:red; 
    }
    </style>
</head>
<body>
    
<?php include(__DIR__ . '/../shared/navigationbar.php'); ?>
<?php
if (isset($_GET['payment_name'])) {
    $_SESSION['payment_name'] = $_GET['payment_name'];
} else {
    echo "No payment name received.";
}
?>
    <h1>Gym and Coach Plans</h1>

    <div class="square">
       
        <img src="<?php echo BASE_URL; ?>/assets/img/downloadc1.jpg" >
        <div class="text">
        <p style="color: red;">Gym With Coach </p>
        <p>Subscribtion duration:Three Months</p>
        <p>Price:2400</p>
        <p>You Can Use All the Equpments of the gym 
            with Coach sees all your moves to make sure of your safty for 3 Months 
        </p>
        <a href="Payment"><button class="btn" >Get Started</button></a>
        </div>
    </div>

    <div class="square">
       
        <img src="<?php echo BASE_URL; ?>/assets/img/downloadc2.jpg" >
        <div class="text">
            <p style="color: red;">Gym With Coach </p>
            <p>Subscribtion duration:Six Months</p>
            <p>Price:4000</p>
            <p>You Can Use All the Equpments of the gym 
                with Coach sees all your moves to make sure of your safty for 6 Months 
            </p>
            <a href="Payment"><button class="btn" >Get Started</button></a>
        </div>
    </div>

    <div class="square">
       
        <img src="<?php echo BASE_URL; ?>/assets/img/downloadc3.jpg" >
        <div class="text">
            <p style="color: red;">Gym With Coach </p>
            <p>Subscribtion duration:Twelve Months</p>
            <p>Price:6200</p>
            <p>You Can Use All the Equpments of the gym 
                with Coach sees all your moves to make sure of your safty for 12 Months 
            </p>
            <a href="Payment"><button class="btn" >Get Started</button></a>
        </div>
    </div>
</body>
</html>
