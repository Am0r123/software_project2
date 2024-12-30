<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
</head>
<body>
    <style>footer {
  background-color: #222223;
  color: #333;
  padding: 20px 0;
  position: relative;
  width: 100%;
  background-color: #222223;
}

.footer-content {
  display: flex;
  justify-content: space-between;
  margin: 0 auto;
  max-width: 1200px;
  padding: 0 20px;
  flex-wrap: wrap;
}

.footer-column {
  flex: 1;
  margin-bottom: 20px;
}

.footer-column h3 {
  color: #fff;
  margin-bottom: 15px;
}

.footer-column ul {
  list-style: none;
  padding: 0;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease;
}

.footer-column ul.show {
  max-height: 500px;
}
.footer-column ul li {
  padding: 3px 0px;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.footer-column ul.show li {
  opacity: 1;
}

.footer-column ul li a {
  color: #b6b6b6;
  text-decoration: none;
  transition: color 0.3s ease;
}

.footer-column ul li a:hover {
  color: rgb(236, 198, 92); 
}

.footer-bottom {
  border-top: 1px solid #ddd;
  padding: 0 20px; 
  padding-top: 20px;
  margin-top: 20px;
  justify-content: space-between;
  align-items: center;
  display: flex;
  flex-wrap: wrap;
}

.footer-bottom p {
  color: white;
  margin: 0;
}

.footer-bottom a {
  color: #333;
  text-decoration: none;
}

.footer-bottom a:hover {
  text-decoration: underline;
}

.social-icons {
  list-style: none;
  display: flex;
  margin: 0;
  padding: 0;
}

.social-icons li {
  display: inline-block;
  padding-right: 10px;
  margin-right: 10px;
}

.social-icons li:last-child {
  margin-right: 0;
}

.social-icons a {
  color: rgb(255, 255, 255);
  font-size: 20px;
}


@media (max-width: 480px) {
      .footer-content {
      flex-direction: column;
      padding: 0 10px;
  }

  .footer-column {
      border-bottom: 1px solid #d0d1d2;
      margin-bottom: 0px;
  }

  .footer-bottom {
      flex-direction: column;
      align-items: flex-start;
  }

  .footer-bottom p {
      margin-bottom: 10px;
  }

  .social-icons {
      justify-content: flex-start;
  }

  .social-icons li {
      margin-right: 10px; 
  }
}

@media (max-width: 768px) {
  .footer-content {
      flex-direction: column; 
      padding: 0 15px;
  }

  .footer-column {
      border-bottom: 1px solid #d0d1d2;
      margin-bottom: 0px;
  }

  .footer-bottom {
      flex-direction: column; 
      align-items: flex-start; 
  }

  .footer-bottom p {
      margin-bottom: 15px; 
  }

  .social-icons {
      justify-content: flex-start;
  }

  .social-icons li {
      margin-right: 15px;
  }
}

@media (max-width: 1024px) {
  .footer-content {
      flex-direction: column; 
      padding: 0 20px; 
  }

  .footer-column {
      border-bottom: 1px solid #d0d1d2;
      margin-bottom: 0px; 
  }

  .footer-bottom {
      flex-direction: column; 
      align-items: flex-start; 
  }

  .footer-bottom p {
      margin-bottom: 20px; 
  }

  .social-icons {
      justify-content: flex-start;
  }

  .social-icons li {
      margin-right: 20px;
  }
}
</style>
 <footer class="site-footer">
    <div class="footer-content">
      
        <div class="footer-column">
            <h3 class="toggle">Customer Service</h3>
            <ul>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Contact Us</a></li>                
            </ul>
        </div>
        <div class="footer-column">
            <h3 class="toggle">Services</h3>
            <ul>
                <li><a href="#">All Services</a></li>
        
            </ul>
        </div>
        <div class="footer-column">
            <h3 class="toggle">Manage</h3>
            <ul>
                <li><a href="#">My Profile</a></li>
                <li><a href="#">My Membership</a></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">My Details</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3 class="toggle">About Us</h3>
            <ul>
                <li><a href="#contactus.php">About FGYM</a></li>
                <li><a href="#contactus.php">Site Map</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; ALL RIGHTS RESERVED. 2024 F GYM</p>
        <ul class="social-icons">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </div>
</footer>   
</body> 
<script>

    
   document.addEventListener('DOMContentLoaded', function () {
    function handleToggle() {
        var toggles = document.querySelectorAll('.footer-column .toggle');
        toggles.forEach(function (toggle) {
            toggle.addEventListener('click', function () {
                var list = this.nextElementSibling;
                list.classList.toggle('show'); // Toggle 'show' class instead of inline style
            });
        });
    }

    function applyToggleForSmallScreens() {
        var mediaQuery = window.matchMedia('(max-width: 1350px)');
        var footerColumns = document.querySelectorAll('.footer-column ul');

        if (mediaQuery.matches) {
            footerColumns.forEach(function (ul) {
                ul.classList.remove('show'); // Ensure lists are hidden by default on small screens
            });
            handleToggle(); // Add toggle functionality
        } else {
            footerColumns.forEach(function (ul) {
                ul.classList.add('show'); // Ensure lists are shown by default on larger screens
            });
        }
    }

    // Apply toggle on load and on resize
    applyToggleForSmallScreens();
    window.addEventListener('resize', applyToggleForSmallScreens);
});
</script>
</html>
