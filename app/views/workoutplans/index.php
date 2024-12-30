
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/workout.css">
    <title>Fitness Tracker</title>
</head>
<body>
<img class="backgroundimage"src="<?php echo BASE_URL; ?>/assets/img/gym.jpg" alt="Gym">
<div id="tracker">
        <div class="plans">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <button id="backButton" onclick="back()" class="arrowbackk" aria-label="Go Back">
                <i class="fas fa-arrow-left"></i>
            </button>
        <h2 class="text" style="color:red">Your Fitness Tracker</h2>
        <div class="workout-plan" id="dailyWorkoutPlan"></div>
        <button id="startWorkoutButton">Start Workout</button>
        <div class="timer hidden" id="timerDisplay">00:00</div>
        <div class="exercise-display hidden" id="currentExercise"></div>
        <div class="exercise-display hidden" id="nextExercise"></div>
        <div class="video-tutorial hidden">
            <img style="width:400px" src="https://cdn.dribbble.com/users/2931468/screenshots/5720362/jumping-jack.gif">
            <!-- <video id="exerciseVideo" width="400" controls>
                <source src="https://cdn.dribbble.com/users/2931468/screenshots/5720362/jumping-jack.gif">
                Your browser does not support the video tag.
            </video> -->
        </div>
        <button class="hidden">Done</button>
        <button id="nextexecrsie" class="nextexecrsie hidden">Next</button>
        </div>
    </div>

    <audio id="timerSound" src="warning.mp3" preload="auto"></audio>

    <script>
        let selectedAvailability = '';
        let selectedGoal = '';
        let cals='';
        const workoutPlans = {
            Monday: [
                { exercise: "Squats", duration: 1, caloriesPerMinute: 8 },
                { exercise: "Push-ups", duration: 1, caloriesPerMinute: 7 },
                { exercise: "Bent-over rows (using dumbbells)", duration: 1, caloriesPerMinute: 6 },
                { exercise: "Plank", duration: 1, caloriesPerMinute: 5 }
            ],
            Tuesday: [
                { exercise: "Brisk walking or jogging", duration: 30 * 60, caloriesPerMinute: 5 },
                { exercise: "Jump rope", duration: 10 * 60, caloriesPerMinute: 12 }
            ],
            Wednesday: [
                { exercise: "Yoga or stretching", duration: 20 * 60, caloriesPerMinute: 3 }
            ],
            Thursday: [
                { exercise: "Jumping jacks", duration: 60, caloriesPerMinute: 10 },
                { exercise: "Lunges", duration: 30, caloriesPerMinute: 8 },
                { exercise: "Dumbbell shoulder press", duration: 30, caloriesPerMinute: 7 },
                { exercise: "Mountain climbers", duration: 60, caloriesPerMinute: 11 }
            ],
            Friday: [
                { exercise: "Cycling or elliptical", duration: 30 * 60, caloriesPerMinute: 8 },
                { exercise: "High knees or butt kicks", duration: 10 * 60, caloriesPerMinute: 10 }
            ],
            Saturday: [
                { exercise: "Walking, swimming, or sport", duration: 30 * 60, caloriesPerMinute: 6 }
            ],
            Sunday: [
                { exercise: "Jumping jacks", duration: 6, caloriesPerMinute: 10 },
                { exercise: "Lunges", duration: 3, caloriesPerMinute: 8 },
                { exercise: "Dumbbell shoulder press", duration: 3, caloriesPerMinute: 7 },
                { exercise: "Mountain climbers", duration: 6, caloriesPerMinute: 11 }
            ]
        };
        const currentDay = new Date().toLocaleString('en-us', { weekday: 'long' });
        displayWorkout(currentDay);
        function displayWorkout(day) {
            const exercises = workoutPlans[day];
            let workoutHTML = `<h2>${day}'s Workout</h2><ul>`;
            exercises.forEach((item, index) => {
                workoutHTML += `<li style="margin:20px;" id="exercise-${index}">${item.exercise}: ${item.duration > 60 ? item.duration / 60 + ' minutes' : item.duration + ' seconds'}</li>`;
            });
            workoutHTML += `</ul>`;
            document.getElementById('dailyWorkoutPlan').innerHTML = workoutHTML;

            checkWorkoutCompletion();
            calculateTotalCalories(exercises);
        }
        function checkWorkoutCompletion() {
            const today = new Date().toISOString().split('T')[0];
            const completedDate = localStorage.getItem('completedDate');
            
            if (completedDate === today) {
                const exercises = workoutPlans[currentDay];
                exercises.forEach((_, index) => {
                    document.getElementById(`exercise-${index}`).classList.add('completed');
                });
                document.querySelector('#startWorkoutButton').classList.add('hidden');
            }
        }
        function calculateTotalCalories(exercises) {
            let totalCalories = 0;
            exercises.forEach(exercise => {
                const durationInMinutes = exercise.duration / 60;
                totalCalories += durationInMinutes * exercise.caloriesPerMinute;
            });
            cals = totalCalories;
        }
        const timerDisplay = document.getElementById('timerDisplay');
        const timerSound = document.getElementById('timerSound');
        const currentExerciseDisplay = document.getElementById('currentExercise');
        const nextExerciseDisplay = document.getElementById('nextExercise');
        const btn = document.getElementById('nextexecrsie');
        // const exerciseVideo = document.getElementById('exerciseVideo');
        let countdown;

        document.getElementById('startWorkoutButton').addEventListener('click', startWorkout);

        function startWorkout() {
            const exercises = workoutPlans[currentDay];
            let currentExerciseIndex = 0;

            // Show hidden elements
            document.getElementById('timerDisplay').classList.remove('hidden');
            document.getElementById('currentExercise').classList.remove('hidden');
            document.getElementById('nextExercise').classList.remove('hidden');
            document.querySelector('.video-tutorial').classList.remove('hidden');
            document.querySelector('.workout-plan').classList.add('hidden');
            document.querySelector('#startWorkoutButton').classList.add('hidden');
            document.getElementById('nextexecrsie').classList.remove('hidden');
            document.getElementById('nextexecrsie').disabled = true;
            
            

            function startNextExercise() {
                document.getElementById('nextexecrsie').disabled = true;
                if (currentExerciseIndex >= exercises.length) {
                    const today = new Date().toISOString().split('T')[0];
                    localStorage.setItem('completedDate', today);
                    setTimeout(() => {
                        document.getElementById('timerDisplay').classList.add('hidden');
                        document.getElementById('currentExercise').classList.add('hidden');
                        document.getElementById('nextExercise').classList.add('hidden');
                        document.querySelector('.video-tutorial').classList.add('hidden');
                        document.querySelector('.workout-plan').classList.remove('hidden');
                        document.getElementById('nextexecrsie').classList.add('hidden');
                        localStorage.setItem('cals', cals.toFixed(2));
                        return;
                    }, 1000);
                }

                const currentExercise = exercises[currentExerciseIndex];
                const nextExercise = exercises[currentExerciseIndex + 1];

                currentExerciseDisplay.innerHTML = `<h3>Current Exercise: ${currentExercise.exercise}</h3>`;
                nextExerciseDisplay.innerHTML = nextExercise ? `<h4>Next Exercise: ${nextExercise.exercise}</h4>` : '';

                // exerciseVideo.src = currentExercise.video;
                // exerciseVideo.load();

                startTimer(currentExercise.duration, currentExercise.exercise, () => {
                    document.getElementById(`exercise-${currentExerciseIndex}`).classList.add('completed');
                    currentExerciseIndex++;
                    startNextExercise();
                });
            }

            startNextExercise();
        }

        function startTimer(duration, exercise, callback) {
            clearInterval(countdown);
            let time = duration;
            timerDisplay.textContent = formatTime(time);

            countdown = setInterval(() => {
                time--;
                timerDisplay.textContent = formatTime(time);

                if (time <= 0) {
                    clearInterval(countdown);
                    document.getElementById('nextexecrsie').disabled = false;
                    timerSound.play();
                    btn.onclick = ()=>{
                        clearInterval(countdown);
                        callback();
                    }
                    setTimeout(() => {
                        callback();
                    }, 10000);
                }
            }, 1000);
        }

        function formatTime(seconds) {
            const minutesLeft = Math.floor(seconds / 60);
            const secondsLeft = seconds % 60;
            return `${String(minutesLeft).padStart(2, '0')}:${String(secondsLeft).padStart(2, '0')}`;
        }
        function back(){
            window.history.back();
        }
    </script>
</body>
</html>
