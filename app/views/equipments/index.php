<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Equipment</title>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/Equipments.css">
</head>
<body>
    <main>

    <div class="header">
        <h1>Gym Equipment</h1>
        <nav>
            <ul>
                <li><a href="#cardio">Cardio</a></li>
                <li><a href="#strength">Strength Training</a></li>
                <li><a href="#accessories">Accessories</a></li>
            </ul>
        </nav>
    </div>

    
        <section id="cardio">
            <h2>Cardio Machines</h2>
            <div class="equipment">
                <div class="item">
                    <img src="<?php echo BASE_URL; ?>/assets/img/assets/img/147-588-aspire-treadmill-sl-console-smooth-charcoal.png" alt="Treadmill" onclick="openModal('video_treadmill.mp4')">
                    <h3>Treadmill</h3>
                    <p>Perfect for running and walking indoors.</p>
                </div>
                <div class="item">
                    <img src="https://production-gvckb4eyhna3g6c7.a03.azurefd.net/v1/format-png-h-960-mode-crop-quality-60-w-960/kentico13corebase/media/lfmedia/lifefitnessimages/mediasync/272-305-icg-ic7-bg-free.png" alt="Stationary Bike" onclick="openModal('video_stationary_bike.mp4')">
                    <h3>Stationary Bike</h3>
                    <p>Great for low-impact cardio workouts.</p>
                </div>
                <div class="item">
                    <img src="https://production-gvckb4eyhna3g6c7.a03.azurefd.net/v1/format-png-h-960-mode-crop-quality-60-w-960/kentico13corebase/media/lfmedia/lifefitnessimages/equipment/cardio/symbio/incline%2520elliptical/cardio-symbio-incline-elliptical-titanium.png" alt="Elliptical Trainer" onclick="openModal('video_elliptical.mp4')">
                    <h3>Elliptical Trainer</h3>
                    <p>Full body workout with low impact.</p>
                </div>
            </div>
        </section>

        <section id="strength">
            <h2>Strength Training Equipment</h2>
            <div class="equipment">
                <div class="item">
                    <img src="https://production-gvckb4eyhna3g6c7.a03.azurefd.net/v1/format-png-h-960-mode-crop-quality-60-w-960/kentico13corebase/media/lfmedia/lifefitnessimages/mediasync/181-52-hs-4-sided-urethane-db-collection.png" alt="Dumbbells" onclick="openModal('video_dumbbells.mp4')">
                    <h3>Dumbbells</h3>
                    <p>Versatile weights for various exercises.</p>
                </div>
                <div class="item">
                    <img src="https://production-gvckb4eyhna3g6c7.a03.azurefd.net/v1/format-png-h-480-mode-crop-quality-50-w-480/kentico13corebase/media/lfmedia/lifefitnessimages/mediasync/108-108-hammer-strength-12-side-barbell.png" alt="Barbell" onclick="openModal('video_barbell.mp4')">
                    <h3>Barbell</h3>
                    <p>Essential for heavy lifting and strength training.</p>
                </div>
                <div class="item">
                    <img src="https://production-gvckb4eyhna3g6c7.a03.azurefd.net/v1/format-png-h-480-mode-crop-quality-50-w-480/kentico13corebase/media/lfmedia/lifefitnessimages/mediasync/134-135-25mm-womensolympic-barbushing-stainlesssteel.png" alt="Weight Bench" onclick="openModal('video_weight_bench.mp4')">
                    <h3>Weight Bench</h3>
                    <p>Perfect for bench presses and other workouts.</p>
                </div>
            </div>
        </section>

        <section id="accessories">
            <h2>Accessories</h2>
            <div class="equipment">
                <div class="item">
                    <img src="https://production-gvckb4eyhna3g6c7.a03.azurefd.net/v1/format-png-h-960-mode-crop-quality-60-w-960/kentico13corebase/media/lfmedia/lifefitnessimages/mediasync/169-639-lifefitness-coverresistancetube-extra-light-1000x1000.png" alt="Resistance Bands" onclick="openModal('video_resistance_bands.mp4')">
                    <h3>Resistance Bands</h3>
                    <p>Great for strength training and flexibility.</p>
                </div>
                <div class="item">
                    <img src="https://production-gvckb4eyhna3g6c7.a03.azurefd.net/v1/format-png-h-960-mode-crop-quality-60-w-960/kentico13corebase/media/lfmedia/lifefitnessimages/mediasync/246-981-life-fitness-yoga-mat-black-2022.png" alt="Yoga Mat" onclick="openModal('video_yoga_mat.mp4')">
                    <h3>Yoga Mat</h3>
                    <p>Essential for yoga and floor exercises.</p>
                </div>
                <div class="item">
                    <img src="https://production-gvckb4eyhna3g6c7.a03.azurefd.net/v1/format-png-h-960-mode-crop-quality-60-w-960/kentico13corebase/media/lfmedia/lifefitnessimages/mediasync/255-761-lf-foam-roller-1000x1000.png" alt="Foam Roller" onclick="openModal('video_foam_roller.mp4')">
                    <h3>Foam Roller</h3>
                    <p>Perfect for muscle recovery and flexibility.</p>
                </div>
            </div>
        </section>
    </main >

    <footer>
        <p>&copy; 2023 Gym Equipment. All rights reserved.</p>
    </footer>

    <!-- Modal for video -->
    <div id="videoModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <video id="modalVideo" class="modal-content" controls>
            <source id="videoSource" src="" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <script>
        function openModal(videoSrc) {
            document.getElementById("videoModal").style.display = "block";
            document.getElementById("videoSource").src = videoSrc;
            document.getElementById("modalVideo").load();
        }

        function closeModal() {
            document.getElementById("videoModal").style.display = "none";
        }
    </script>
</body>
</html>