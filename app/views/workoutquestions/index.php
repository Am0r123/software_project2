<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/workout.css">
    <title>Fitness Tracker</title>
</head>
<body>
    <img class="backgroundimage" src="<?php echo BASE_URL; ?>/assets/img/gym.jpg">
    <div id="container" class="container">
        <div class="progress-bar-container">
            <div class="progress-bar" id="progress-bar"></div>
        </div>
        <h2>Nutrition and Workout Plan</h2>
        <form id="fitness-form">
            <div class="step active">
                <h3>Information About You</h3>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" min="0" required>
                    <span class="error-message" id="age-error"></span>
                </div>
                <div class="form-group">
                    <label for="weight">Weight:</label>
                    <input type="number" id="weight" name="weight" min="0" required>
                    <span class="error-message" id="weight-error"></span>
                </div>
                <div class="form-group">
                    <label for="height">Height:</label>
                    <input type="number" id="height" name="height" min="0" required>
                    <span class="error-message" id="height-error"></span>
                </div>
                <button type="button" class="btn next">Next</button>
            </div>
            <div class="step">
                <h3>Inbody if available</h3>
                <div class="form-group">
                    <label for="inbody" class="custom-file-upload">
                        Select Inbody (optional)
                        <div id="file-name" class="file-name">No file selected</div>
                    </label>
                    <input type="file" id="inbody" name="inbody" accept=".jpg, .jpeg, .png, .pdf" onchange="displayFileName()">
                </div>  
                <button type="button" class="btn back">Back</button>
                <button type="button" class="btn next">Next</button>
            </div>
            <div class="step">
                <h3>Select Your Availability</h3>
                <div class="form-group">
                    <label>
                        <input type="button" class="buttons" name="availability" value="morning"  onclick="selectAvailability(this)">
                        </label><br>
                    <label>
                        <input type="button" class="buttons" name="availability" value="afternoon" onclick="selectAvailability(this)">
                    </label><br>
                    <label>
                        <input type="button" class="buttons" name="availability" value="evening" onclick="selectAvailability(this)">
                    </label><br>
                    <label>
                        <input type="button" class="buttons" name="availability" value="night" onclick="selectAvailability(this)">
                    </label><br>
                    <label>
                        <input type="button" class="buttons" name="availability" value="flexible" onclick="selectAvailability(this)">
                    </label>
                </div>
                <span class="error-message" style="margin-left:120px;" id="availability-error"></span>
                <button type="button" class="btn back">Back</button>
                <button type="button" class="btn next">Next</button>
            </div>
            <div class="step">
                <h3>What is your Goal?</h3>
                <div class="form-group">
                    <label>
                        <input type="button" class="buttons2" name="Goal" value="Weight Loss"  onclick="selectGoal(this)">
                        </label><br>
                    <label>
                        <input type="button" class="buttons2" name="Goal" value="Maintian Weight" onclick="selectGoal(this)">
                    </label><br>
                    <label>
                        <input type="button" class="buttons2" name="Goal" value="Muscle Gain" onclick="selectGoal(this)">
                    </label><br>
                    <label>
                        <input type="button" class="buttons2" name="Goal" value="Maintian Muscle" onclick="selectGoal(this)">
                    </label><br>
                    <label>
                        <input type="button" class="buttons2" name="Goal" value="Increase Step Count" onclick="selectGoal(this)">
                    </label>
                </div>
                <span class="error-message" style="margin-left:120px;" id="goal-error"></span>
                <button type="button" class="btn back">Back</button>
                <button type="submit" class="btn submit">Submit</button>
            </div>
        </form>
    </div>
    <script>
        let selectedAvailability = '';
        let selectedGoal = '';
        document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.step');
            const nextButtons = document.querySelectorAll('.next');
            const backButtons = document.querySelectorAll('.back');
            const progressBar = document.getElementById('progress-bar');
            let currentStep = 0;
            const storedData = localStorage.getItem('fitnessData');
            if (storedData) {
                window.location.href = 'tracker';
            } else {
                nextButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        if (validateStep(currentStep)) {
                            if (currentStep < steps.length - 1) {
                                steps[currentStep].classList.remove('active');
                                currentStep++;
                                steps[currentStep].classList.add('active');
                                updateProgressBar();
                            }
                        }
                    });
                });
            }

            backButtons.forEach(button => {
                button.addEventListener('click', () => {
                    if (currentStep > 0) {
                        steps[currentStep].classList.remove('active');
                        currentStep--;
                        steps[currentStep].classList.add('active');
                        updateProgressBar();
                    }
                });
            });

            document.getElementById('fitness-form').addEventListener('submit', function(event) {
                event.preventDefault();
                if (validateStep(currentStep)) {
                    document.getElementById('container').style.display = 'none';

                    const form = document.getElementById('fitness-form');

                    const age = form.age.value;
                    const weight = form.weight.value;
                    const height = form.height.value;
                    const inbodyFile = form.inbody.files.length > 0 ? form.inbody.files[0].name : 'No file selected';
                    
                    const formData = {
                        age,
                        weight,
                        height,
                        inbodyFile,
                        availability: selectedAvailability,
                        goal: selectedGoal,
                    };
                    localStorage.setItem('fitnessData', JSON.stringify(formData));


                    window.location.href = 'tracker';
                }
            });

            function updateProgressBar() {
                const progress = (currentStep / (steps.length - 1)) * 100;
                progressBar.style.width = `${progress}%`;
            }

            function validateStep(step) {
                let valid = true;

                if (step === 0) {
                    const age = document.getElementById('age').value;
                    const weight = document.getElementById('weight').value;
                    const height = document.getElementById('height').value;

                    if (!age) {
                        valid = false;
                        document.getElementById('age-error').textContent = 'Age is required';
                    } else {
                        document.getElementById('age-error').textContent = '';
                    }

                    if (!weight) {
                        valid = false;
                        document.getElementById('weight-error').textContent = 'Weight is required';
                    } else {
                        document.getElementById('weight-error').textContent = '';
                    }

                    if (!height) {
                        valid = false;
                        document.getElementById('height-error').textContent = 'Height is required';
                    } else {
                        document.getElementById('height-error').textContent = '';
                    }
                }

                if (step === 2 && !selectedAvailability) {
                    valid = false;
                    document.getElementById('availability-error').textContent = 'Please select your availability';
                } else {
                    document.getElementById('availability-error').textContent = '';
                }

                if (step === 3 && !selectedGoal) {
                    valid = false;
                    document.getElementById('goal-error').textContent = 'Please select your goal';
                } else {
                    document.getElementById('goal-error').textContent = '';
                }

                return valid;
            }
        });

        function displayFileName() {
            const fileInput = document.getElementById('inbody');
            const fileNameDisplay = document.getElementById('file-name');
            const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'No file selected';
            fileNameDisplay.textContent = fileName;
        }

        function selectAvailability(selectedButton) {
            const buttons = document.querySelectorAll('.buttons');
            buttons.forEach(button => button.classList.remove('selected'));
            selectedButton.classList.add('selected');
            selectedAvailability = selectedButton.value;
        }

        function selectGoal(selectedButton) {
            const buttons = document.querySelectorAll('.buttons2');
            buttons.forEach(button => button.classList.remove('selected'));
            selectedButton.classList.add('selected');
            selectedGoal = selectedButton.value;
        }
    </script>
</body>
</html>
