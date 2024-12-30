<?php
session_start();

if (isset($_GET['payment_name'])) {
    $_SESSION['payment_name'] = $_GET['payment_name'];
} else {
    echo "No payment name received.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plans-Pricing</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/months.css">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php include(__DIR__ . '/../shared/navigationbar.php'); ?>
    <section class="plans" id="plans">
        <h2 class="heading">Our <span style="color: #ff0000;">Duration</span></h2>
        
       
        <p class="subheading">Choose a plan that suits your fitness journey. Flexible options for every commitment level.</p>
        
        <div class="plans-content">
          
            <div class="box">
                <div class="box-header">
                    <h3>3-Months</h3>
                </div>
                <hr class="divider">
                <div class="box-price">
                    <h2><span style="color:#ff0000;">$300/Month</span></h2>
                </div>
                <div class="box-footer">
                    <a href="payment">
                        Join Now 
                        <i class='bx bx-right-arrow-alt'></i>
                    </a>
                </div>
            </div>
            
            
            <div class="box">
                <div class="box-header">
                    <h3>6-Months</h3>
                </div>
                <hr class="divider">
                <div class="box-price">
                    <h2><span style="color:#ff0000;">$500/Month</span></h2>
                </div>
                <div class="box-footer">
                    <a href="payment">
                        Join Now 
                        <i class='bx bx-right-arrow-alt'></i>
                    </a>
                </div>
            </div>
            
           
            <div class="box">
                <div class="box-header">
                    <h3>12-Months</h3>
                </div>
                <hr class="divider">
                <div class="box-price">
                    <h2><span style="color:#ff0000;">$850/Month</span></h2>
                </div>
                <div class="box-footer">
                    <a href="payment">
                        Join Now 
                        <i class='bx bx-right-arrow-alt'></i>
                    </a>
                </div>
            </div>  
        </div>
    </section>
</body>
</html>
