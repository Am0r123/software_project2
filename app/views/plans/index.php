<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plans-Pricing</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/plans.css">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php

function getDatabaseConnection() {
    $con = new mysqli("localhost", "root", "", "software_project");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    return $con;
}
function getAllPayments() {
    $con = getDatabaseConnection();
    $sql = "SELECT * FROM payment";
    $result = $con->query($sql);
    $payments = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $payments[] = $row;
        }
    }
    $con->close();
    return $payments;
}

$payments = getAllPayments();

?>
<?php include(__DIR__ . '/../shared/navigationbar.php'); ?>
    <section style="margin-top:60px;" class="plans" id="plans">

        <h2 class="heading">Our <span style="color: #ff0000;">Plans</span></h2>
        <div class="plans-content">
    <?php foreach ($payments as $payment): ?>
            <div class="box">
            <h3 style="color: #ff0000;"><?= $payment['payment_name'] ?></h3>
          
            <ul>
            <?php 
                $lines = explode("\n", $payment['description']); 
                foreach ($lines as $line): 
            ?>
                <li><?= htmlspecialchars($line) ?></li>
            <?php endforeach; ?>
            </ul>
            <?php
            if($payment['payment_name'] === 'Standard')
            echo '<a href="months?payment_name=' . urlencode($payment['payment_name']) . '" class="join-now-link">
                Join Now 
                <i class="bx bx-right-arrow-alt"></i>
            </a>';
            else if($payment['payment_name'] === 'Pro')
            echo '<a href="gymwithcoach?payment_name=' . urlencode($payment['payment_name']) . '" class="join-now-link">
                Join Now 
                <i class="bx bx-right-arrow-alt"></i>
            </a>';
            else if($payment['payment_name'] === 'Nutrition')
            echo '<a href="plan?payment_name=' . urlencode($payment['payment_name']) . '" class="join-now-link">
                Join Now 
                <i class="bx bx-right-arrow-alt"></i>
            </a>';
            ?>
        </div>
    <?php endforeach; ?>
    
    <script>
    document.querySelectorAll('.join-now-link').forEach(link => {
        link.addEventListener('click', function(event) {
            var paymentName = event.target.getAttribute('payment');
            localStorage.setItem('paymentName', paymentName);
            window.location.href = 'months.php';
        });
    });
    </script>
    </section>
</body>
</html>