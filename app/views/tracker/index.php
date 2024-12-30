<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fitness Tracker Dashboard</title>
  <style>* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

body {
    background-image: url("https://static.vecteezy.com/system/resources/thumbnails/014/378/559/small/dark-black-and-gray-blurred-gradient-background-has-a-little-abstract-light-soft-background-for-wallpaper-design-graphic-and-presentation-backdrop-wall-free-photo.jpg");
    background-repeat: no-repeat;
    background-color: #f9f4ef;
    color: #fff;
    background-size: cover;
}

.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
}

.header {
  display: flex;
  justify-content: space-between;
  width: 100%;
  background-color: #111;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
}

.header .date,
.header .last-sync {
  color: #fff;
}

.main-content {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  width: 100%;
}

.card {
  background-color: #222;
  padding: 20px;
  border-radius: 5px;
  border: 1px solid #444;
}

.card h2 {
  color: red;
  margin-bottom: 15px;
}

.profile {
  text-align: center;
}

.profile img {
  border-radius: 50%;
  width: 50px;
  height: 50px;
  margin-bottom: 10px;
}

.profile .name {
  font-size: 1.2em;
  margin-bottom: 5px;
}

.profile .steps {
  font-size: 1.5em;
  color: red;
}

button {
  background-color: red;
  color: #fff;
  border: none;
  padding: 10px;
  margin: 10px 0;
  cursor: pointer;
  border-radius: 5px;
  width: 100%;
}

button:hover {
  background-color: #ff4d4d;
}

.exercise {
  margin-bottom: 20px;
}

.exercise p {
  margin-bottom: 5px;
}

.details {
  font-size: 1em;
}

.sub-details {
  font-size: 0.9em;
  color: #bbb;
}

.full-width {
  width: 100%;
}

@media (max-width: 768px) {
  .main-content {
    grid-template-columns: 1fr;
  }
}

</style>
</head>
<body>
<?php include(__DIR__ . '/../shared/navigationbar.php'); ?>
  <div style="margin-top:100px" class="container">
    <div class="main-content">
      <div class="card friends">
        <h2>Friends</h2>
        <div class="profile">
          <img src="<?php echo BASE_URL; ?>/assets/img/profile2.png" alt="Profile Picture">
          <p class="name">You</p>
          <p class="steps">41,406</p>
          <h3 style="margin-top:10px">Caliores burnt</h3>
          <p class="steps" id="cals">0</p>
        </div>
        <button class="connect-fb" onclick="startworkout()">Start Workout</button>
      </div>
      <div class="card recent-exercise">
        <h2>Recent Exercise</h2>
        <div class="exercise">
          <p>Walk</p>
          <p class="details">16 minutes, 122 cals</p>
          <img width="200px" height="100px" src="<?php echo BASE_URL; ?>/assets/img/heartrate.png" alt="Heart Rate Graph">
        </div>
        <div class="exercise">
          <p>Bike</p>
          <p class="details">22 minutes, 214 cals</p>
          <img width="200px" height="100px" src="<?php echo BASE_URL; ?>/assets/img/heartrate.png" alt="Heart Rate Graph">
        </div>
        <div class="exercise">
          <p>Bike</p>
          <p class="details">23 minutes, 224 cals</p>
          <img width="200px" height="100px" src="<?php echo BASE_URL; ?>/assets/img/heartrate.png" alt="Heart Rate Graph">
        </div>
      </div>
      <div class="card heart-rate">
        <h2>Heart Rate</h2>
        <img src="<?php echo BASE_URL; ?>/assets/img/restingheartrate.png" alt="Heart Rate Graph" class="full-width">
        <p class="bpm">84 bpm resting heart rate</p>
      </div>
      <div class="card sleep">
        <h2>Sleep</h2>
        <p class="details">6 hr 41 min</p>
        <p class="sub-details">Awake 2x, Restless 8x</p>
      </div>
      <div class="card weight">
        <h2>Weight Goal</h2>
        <p class="details">3.9 lbs to go</p>
      </div>
      <div class="card steps">
        <h2>Steps</h2>
        <p class="details">25,000 steps</p>
        <p class="sub-details">Best in a day</p>
      </div>
    </div>
  </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cals = localStorage.getItem('cals');
        
        if (cals) {
            document.getElementById('cals').innerText = cals;
        }

    });
    function startworkout(){
        window.location.href = 'workoutplans';
    }
</script>
</html>

