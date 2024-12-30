<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trainers</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/trainers.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php include(__DIR__ . '/../shared/navigationbar.php'); ?>

  <main>
    <section class="trainers">
      
      <h1 style="font-size: 55px;">Our <span style="color: red; font-size: 45px;">Trainers</span></h1>

    </section>

    <section class="details">
      <h2>What We Provide</h2>
      <p>At our gym, we offer specialized trainers for every category, including basketball, strength training, and general fitness. Whether you prefer a male or female trainer, our diverse team of experts is dedicated to helping you achieve your personal goals.</p>
      <p>Join a community that celebrates fitness, health, and well-being. Our gym fosters a positive atmosphere where members can support each other, participate in group classes, and attend events that promote wellness and camaraderie.</p>
    </section>


    <section class="About-Trainers" id="About-Trainers">
      <h2 class="title">Trainers</h2>
      <div class="About-Trainers-grid">
        <div class="Trainers-card">
          <div class="Trainers-img">
            <img src="<?php echo BASE_URL; ?>/assets/img/freepik__expand__10289.png" alt="Female Trainers"/>
          </div>
          <div class="Trainers-info">
            <p class="Trainers-cat">Female Trainers</p>
            <strong class="Trainers-title">
              <span>Strength, Confidence, Community</span>
            </strong>
          </div>
        </div>
        
        <div class="Trainers-card">
          <div class="Trainers-img">
            <img src="<?php echo BASE_URL; ?>/assets/img/people-working-out-indoors-together-with-dumbbells.jpg" alt="Fitness Trainers"/>
          </div>
          <div class="Trainers-info">
            <p class="Trainers-cat">Fitness Trainers</p>
            <strong class="Trainers-title">
              <span>Unlock Your Full Potential</span>
            </strong>
          </div>
        </div>
    
        <div class="Trainers-card">
          <div class="Trainers-img">
            <img src="<?php echo BASE_URL; ?>/assets/img/two-internationals-friends-is-engaged-gym.jpg" alt="Sport Trainers"/>
          </div>
          <div class="Trainers-info">
            <p class="Trainers-cat">Sport Trainers</p>
            <strong class="Trainers-title">
              <span>Master Your Game</span>
            </strong>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; All rights reserved.</p>
  </footer>
</body>
</html>