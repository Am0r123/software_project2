<!DOCTYPE html>
<html lang="en">
<head>
    
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/plan.css">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrition and Workout plans </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
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
    <h1>Nutrition and Workout planes</h1>

    <div class="container">
        <div class="card">
            <img src="<?php echo BASE_URL; ?>/assets/img/downloadp1.jpg" alt="Gym with Coach - 3 Months">
            <div class="text">
                <h2>Workout and Nutrition plan</h2>
                <p>Subscription Duration: Three Months</p>
                <p>Price: 3400</p>
                <p>You can use all the gym equipment with a coach who ensures your safety with Workout and Nutrition plan.</p>
                <a href="Payment"><button class="btn" >Get Started</button></a>
            </div>
        </div>

        <div class="card">
            <img src="<?php echo BASE_URL; ?>/assets/img/imagesp2.jpg" alt="Gym with Coach - 6 Months">
            <div class="text">
                <h2>Workout and Nutrition plan</h2>
                <p>Subscription Duration: Six Months</p>
                <p>Price: 4800</p>
                <p>Use all the gym equipment with a coach for your safety and guidance with Workout and Nutrition plan.</p>
                <a href="Payment"><button class="btn" >Get Started</button></a>
            </div>
        </div>

        <div class="card">
            <img src="<?php echo BASE_URL; ?>/assets/img/downloadp3.jpg" alt="Gym with Coach - 12 Months">
            <div class="text">
                <h2>Workout and Nutrition plan</h2>
                <p>Subscription Duration: Twelve Months</p>
                <p>Price: 7500</p>
                <p>Enjoy full access to the gym with a coach for a full year with Workout and Nutrition plan.</p>
               <a href="Payment"><button class="btn" >Get Started</button></a>
            </div>
        </div>
    </div>
</body>
</html>
