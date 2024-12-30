<!DOCTYPE html>
<html lang="en">
  <head>
   
  </head>
  <body>
<?php include(__DIR__ . '/../shared/navigationbar.php');?>
<style>:root {
    --color-yellow: hsl(0, 46%, 47%);
    --color-yellow-dark: hsl(0, 61%, 25%);
    --color-black: hsl(0, 0%, 15%);
    --color-black-light: hsl(0, 0%, 22%);
    --grid-column-gap: clamp(2rem, 6vw, 8rem);
}

*,
*::before,
*::after {
    margin: 0;
    padding: 0;
    box-sizing: inherit;
}

html {
    box-sizing: border-box;
    font-size: 62.5%;
    scroll-behavior: smooth;
}

body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 1.6rem;
    line-height: 1.6;
    color: #fff;
}

.container {
    max-width: clamp(50rem, 85vw, 114rem);
    padding: 0 2.4rem;
    margin: 0 auto;
}

.header {
    position: absolute;
    top: 0;
    right: 0;
    color: #fff;
    width: 100%;
    z-index: 100;
    background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9));
}

.header-navigation {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.2rem 0;
}

.header-navigation ul {
    display: flex;
    text-transform: capitalize;
    font-size: 1.7rem;
    list-style: none;
    font-weight: 700;
}

.header-navigation ul li {
    padding-left: 2.8rem;
}

.header-navigation ul li a {
    text-decoration: none;
    color: #fff;
    padding: 1.8rem 0;
    border-bottom: 2px solid transparent;
    transition: border 0.5s;
}

.header-navigation ul li a:hover {
    border-bottom: 2px solid var(--color-yellow);
}

.header-navigation .logo {
    font-size: 2.5rem;
    font-weight: 700;
}

.section-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
      url('https://i0.wp.com/www.muscleandfitness.com/wp-content/uploads/2016/09/Bodybuilder-Working-Out-His-Upper-Body-With-Cable-Crossover-Exercise.jpg?quality=86&strip=all');
    background-size: cover;
    background-position: top;
    height: max(100vh, 60rem);
}

.hero-box {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    height: 100%;
    letter-spacing: 0.1rem;
}

.hero-content .description {
    font-size: 1.7rem;
}

.btn {
    text-transform: uppercase;
    padding: 1rem clamp(1.2rem, 3vw, 3rem);
    border-radius: 3px;
    font-family: inherit;
    font-size: 1.5rem;
    font-weight: 700;
    border: none;
    cursor: pointer;
}

.btn__primary {
    background-color: #b61c1c;
    color: #000;
    border: 1px solid transparent;
    transition: background-color 0.3s;
}

.btn__primary:hover {
    background-color: var(--color-yellow-dark);
}

.btn__secondary {
    background-color: transparent;
    color: #fff;
    border: 1px solid #b61c1c;
    transition: all 0.3s;
}

.btn__secondary:hover {
    background-color: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: #000;
}

.section-footer {
    background-color: var(--color-black);
    padding: clamp(4rem, 10vw, 12rem) 0rem;
}

.footer-box {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    column-gap: var(--grid-column-gap);
}

.contact-details .contact-data {
    list-style: none;
    display: flex;
    flex-direction: column;
}

.contact-details .contact-data * {
    padding: 0.4rem 0;
}

.contact-details .contact-data .social {
    display: flex;
}

.contact-details .contact-data .social * {
    padding-right: 1rem;
}

.red {
    color: #b61c1c;
}

.margin-right {
    margin-right: 2rem;
}

.margin-bottom {
    margin-bottom: 2rem;
}</style>>
    <main>
      <section class="section-hero">
        <div class="container hero-box">
          <div class="hero-content margin-bottom">
            <h1 class="heading heading--1 margin-bottom">
              A place for your fitness goals
            </h1>
            <p class="description">
              We Offer Functional Training, Plyometric Boxes, Aerobics classes,
              TRX And Much More
            </p>
          </div>
          <div class="btn-group">
            <button onclick="gotologin()" class="btn btn__primary margin-right margin-bottom">
              SignUp
            </button>
            <button onclick="gotologin()" class="btn btn__secondary">LOgin</button>
          </div>
        </div>
      </section>
    </main>

    <footer class="section-footer" id="footer">
      <div class="footer-box container">
        <div class="contact-details">
          <h2 class="margin-bottom"><span class="red">F</span>GYM</h2>
          <ul class="contact-data">
            <li class="social">
              <img
                src="https://raw.githubusercontent.com/Manoranjan-D/responsive-website-gym/master/img/logo-whatsapp.svg"
                alt="whatsapp icon"
                width="35"
                height="35"
              />
              <img
                src="https://raw.githubusercontent.com/Manoranjan-D/responsive-website-gym/master/img/logo-facebook.svg"
                alt="facebook icon"
                width="35"
                height="35"
              />
              <img
                src="https://raw.githubusercontent.com/Manoranjan-D/responsive-website-gym/master/img/logo-instagram.svg"
                alt="instagram icon"
                width="35"
                height="35"
              />
              <img
                src="https://raw.githubusercontent.com/Manoranjan-D/responsive-website-gym/master/img/logo-twitter.svg"
                alt="twitter icon"
                width="35"
                height="35"
              />
            </li>
          </ul>
        </div>
      </div>
    </footer>
 </body>
 <script>
  function  gotologin(){
    window.location.href="sign";
  }
  </script>
</html>