<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Fitness Page</title>
   
</head>
<body>
<?php include(__DIR__ . '/../shared/navigationbar.php'); ?>
<style>
    
        
    body {
            font-family: Teko;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 170vh;
            background-color: black;
            flex-direction: column;
        }
        
        .text-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .text-section h1 {
            font-size: 4.2em;
            line-height: 0.8;
            color: #ffffff;    
            margin-left: -95px;
            margin-bottom: 10px;
            font-style: italic;
        }


        
        .text-section h1 span {
            color: #e63946;
        }
        
        .text-section p {
            color: #666;
            line-height: 1.6;
            font-size: 17px;
        }
        
        .text-section .quote {
            margin: 10px 0;
            font-style: italic;
            color: #a2a2a2;
            font-size: 25px;
        }
        
        .signature {
            display: flex;
            flex-direction: column;
            margin-top: -6px;
        }
        
        .signature-name {
            font-family: 'Brush Script MT', cursive;
            font-size: 2.5em;
            color: #ffffff;
        }
        
        .signature-title {
            color: #e63946;
            font-weight: bold;
        }
        
        img {
            z-index: 99;
            flex: 1;
            background-size: cover;
            height: auto;
            max-width: 100%;
            background-position: center;
            height: 536px;
            position: absolute;
        }
        .image-section1 {
            margin-top: 20px;
            flex: 1;
            background-image: url(https://demo2.wpopal.com/gofiz/wp-content/uploads/2024/08/about-img2.jpg);
            background-size: cover;
            /* max-width: 500px; */
            background-position: center;
            height: 540px;
            position: relative;
            left: 81px;
            top: 33px;
        }
        
        .container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            background-color: #000000;
            border-bottom: 1px solid red;
        }
        .hi{
            display: block;
            width: 200px;
            height: 300px;
            background-color: white;
        }
 
.container2 {
    display: flex;
    gap: 20px;
    justify-content: space-around;
    margin-top: 74px;
}
.number2 {
    font-size: 68px;
    font-weight: bold;
    color: red;
}
.span2 {
    font-size: 20px;
    color: gray;
    font-weight: bold;
    display: block;
    margin-top: -4px;
}
.p2 {
    margin-top: 10px;
    font-size: 21px;
}
.stat-box2 {
    background-color: #000000;
    color: white;
    padding: 20px;
    width: 250px;
    text-align: center;
    border-radius: 8px;
    border: 2px solid gray;
    position: relative;
    height: 158px;
}

                

        .testimonials h2 {
            font-size: 4.2em;
            color: #fff;
            margin-bottom: 20px;
        }

        .testimonial-slider {
            display: flex;
            flex-direction: column; /* Vertical layout */
            gap: 20px;
            overflow-y: auto;
            scroll-behavior: smooth;
            max-height: 500px;
            padding-right: 10px;
            scrollbar-width: thin;
            scrollbar-color: red #333;
        }

        .testimonial-slider::-webkit-scrollbar {
            width: 8px;
        }

        .testimonial-slider::-webkit-scrollbar-thumb {
            background-color: red;
            border-radius: 4px;
        }

        .testimonial-slider::-webkit-scrollbar-track {
            background: #333;
        }

        .testimonial {
            display: flex;
            align-items: center;
            background-color: #5b59596b;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .image img {
                    width: 105px;
            border-radius: 50%;
            object-fit: cover;
            height: 100px;
            position: relative;
                    
        }

        .testimonial-content {
            text-align: left;
            margin-left: 15px;
            color: #fff;
        }

        

        .client-info h3 {
            font-size: 2em;
    color: #fff;
    margin: 0px;
        }

        .client-info p {
            color: #ccc;
            margin: 5px 0;
        }

        .stars {
            color: #FFA500;
            font-size: 1.2em;
        }

        .testimonial-text {
            font-size: 1em;
            color: #ddd;
            margin-top: 10px;
        }
        .body1 {
            display: grid;
            align-items: center;
            padding: 40px 0;
            margin-bottom: 100px;
}
.testimonials {
    display: grid;
    justify-content: right;
    margin: -120px 183px;
    width: 90%;
    max-width: 1000px;
    text-align: center;
    padding: 30px;
    border-radius: 15px;
}
.image-container {
    justify-self: left;
    display: grid;
    /* max-width: 600px; */
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    margin-bottom: 20px;
}

.fitness-image {
    position: absolute;
    transform: scale(1.1);
    transition: transform 0.3s;
    left: 78px;
    opacity: 0.5;
}

.fitness-image:hover {
    transform: scale(1.15); /* Zoom in on hover */
}

       
</style>
<div style="margin-top:70px" class="about-content">
    <div class="main">
        <div class="container">
            <div class="text-section">
                <h1>IMPROVING LIVES THROUGH <span>FITNESS</span></h1>
                <p style="margin-bottom: -10px;">
                    At our core, we believe that fitness is more than just physical well-being; it's a pathway to a better life. Fitness has the power to transform not only our bodies but also our minds, inspiring confidence, resilience, and happiness.  </p>
                <p style=" padding-bottom:20px; border-bottom: 1px solid white;">
                    Our programs are designed to support everyone on their journey to a healthier, more fulfilling lifestyle. Whether you're taking your first step or looking to push beyond your limits, we're here to guide and encourage you every step of the way.</p>
                <p class="quote">
                    "Our purpose is to give everyone the opportunity to live a fit and healthy good life."
                </p>
                <div class="signature">
                    <span class="signature-name">Poula Labib</span>
                    <span class="signature-title">CEO & FOUNDER</span>
                </div>
            </div>
        <div class="image-section">
            <img src="https://demo2.wpopal.com/gofiz/wp-content/uploads/2024/08/about-img1.jpg">
        </div>        
        <div class="image-section1"></div>

    </div>
    <div style="background-color: rgb(0, 0, 0);
    width: 100%;
    height: 224px;
    border-bottom: solid 1px red;">
        <div class="container2">
            <div class="stat-box2">
                <div class="number2" data-target="10">0 <span>+</span></div>
                <span class="span2">YEARS</span>
                <p class="p2">Professional Experience</p>
            </div>
            <div class="stat-box2">
                <div class="number2" data-target="90">0</div>
                <span class="span2">TRAINERS</span>
                <p class="p2">Experts Trainers Team Members</p>
            </div>
            <div class="stat-box2">
                <div class="number2" data-target="21">0</div>
                <span class="span2">LOCATIONS</span>
                <p class="p2">Different centers in different states</p>
            </div>
        </div>

    </div>
    <div >
        <div class="body1">
            <div class="image-container">
                <img src="<?php echo BASE_URL; ?>/assets/img/Fitness-Model-PNG-Clipart-Background.png" alt="fitness" class="fitness-image">
            </div>
            <section class="testimonials">
                    <h2>What Our Clients Say?</h2>
                <div class="testimonial-slider">
                    <div class="testimonial">
                        <div class="image">
                            <img src="https://2.bp.blogspot.com/-2lROIuczsws/Un5Nt1Dq6WI/AAAAAAAARFw/w7Y6NNSMABs/s1600/Brock+Cunico-+Male+Fitness+Model+(4).jpg" alt="Athletic Trainer 1">
                        </div>
                        <div class="testimonial-content">
                     
                            <div class="client-info">
                                <h3>Marco Paulo</h3>
                                <p>Athletics / Trainer</p>
                                <div class="stars">
                                    <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                </div>
                                <p class="testimonial-text">Include A Balanced Mix Of Cardiovascular Exercises, Strength Training, Flexibility Work, And Any Specific Activities.</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="image">
                            <img src="https://i.pinimg.com/originals/d5/4a/15/d54a1584f3f58736cf0853caf458ab04.jpg" alt="Athletic Trainer 2">
                        </div>
                        <div class="testimonial-content">
                      
                            <div class="client-info">
                                <h3>Rishitah</h3>
                                <p>Athletics / Trainer</p>
                                <div class="stars">
                                    <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                </div>
                                <p class="testimonial-text">Her dedication to fitness and a healthy lifestyle is truly inspiring. She has helped me achieve my goals with effective workouts.</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="image">
                            <img src="https://th.bing.com/th/id/R.3f03e7fde85e782ec0be6d4912b42423?rik=Q3m2YvWC%2bxWiAQ&pid=ImgRaw&r=0" alt="Athletic Trainer 2">
                        </div>
                        <div class="testimonial-content">
                       
                            <div class="client-info">
                                <h3>Rishitah</h3>
                                <p>Athletics / Trainer</p>
                                <div class="stars">
                                    <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                </div>
                                <p class="testimonial-text">Include a balanced mix of cardiovascular exercises, strength training, flexibility work, and any specific activities.                        </p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="image">
                            <img src="https://th.bing.com/th/id/OIP.uup8-S3vv3ZAFuXOvGkK-gHaKs?w=665&h=960&rs=1&pid=ImgDetMain" alt="Athletic Trainer 2">
                        </div>
                        <div class="testimonial-content">
                       
                            <div class="client-info">
                                <h3>Rishitah</h3>
                                <p>Athletics / Trainer</p>
                                <div class="stars">
                                    <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                </div>
                                <p class="testimonial-text">Her dedication to fitness and a healthy lifestyle is truly inspiring. She has helped me achieve my goals with effective workouts.</p>
                            </div>
                        </div>
                    </div>
                
                </div>
               
            </section>
        </div>
    </div>
  
    </div>
    </div>
    <footer class="page-footer">
    <?php include(__DIR__ . '/../shared/footer.php'); ?>
    </footer>

<script >
    
document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".number2");

    counters.forEach(counter => {
        counter.innerText = '0';
        
        const updateCounter = () => {
            const target = +counter.getAttribute("data-target");
            const current = +counter.innerText;
            const increment = target / 100; 
            
            if (current < target) {
                counter.innerText = `${Math.ceil(current + increment)}`;
                setTimeout(updateCounter, 50); // Adjust timing here
            } else {
                counter.innerText = target;
            }
        };

        updateCounter();
    });
});
</script>
</body>
</html>
