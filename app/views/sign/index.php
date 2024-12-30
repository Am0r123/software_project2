<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/sign.css">
    <script src="<?php echo BASE_URL; ?>/assets/js/sign.js"></script>
    <style>
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #f44336;
            color: white;
            padding: 15px;
            border-radius: 5px;
            z-index: 1000;
            opacity: 1;
            transition: opacity 0.5s ease-out;
        }
    </style>
</head>
<body>
    <img class="backimg" src="https://th.bing.com/th/id/R.c13de31a49b04a02214bc8e05ea6c86a?rik=d%2fuLzuBA9QrdCg&pid=ImgRaw&r=0">
    <?php session_start(); if (isset($_SESSION['error'])): ?>
        <div class="alert" id="alert-box"><?php echo $_SESSION['error']; ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <div class="container">
        <form action="" method="post">
             <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                <div class="login-form">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="user" class="label">Email</label>
                            <input id="user-name" type="email" name="email" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass-word" type="password" name="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" name="login" value="Sign In">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="#forgot">Forgot Password?</a>
                        </div>
                    </div>
                </form>
                <form action="" method="post">
                    <div class="sign-up-htm">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="userr" type="text" name="name" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="passs" type="password" name="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Confirm Password</label>
                            <input id="pass1" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email Address</label>
                            <input id="email" type="email" name="email" class="input">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" name="submit" value="Sign Up">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>    
    <script>
        window.onload = function() {
            const alertBox = document.getElementById("alert-box");
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.opacity = "0";
                    setTimeout(() => {
                        alertBox.remove();
                    }, 500);
                }, 3000);
            }
        };
    </script>
</body>
</html>