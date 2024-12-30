<?php
require __DIR__ . '/../models/SignModel.php';
$model = new SignModel();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if ($model->registerUser($name, $password, $email)) {
        header("Location: home");
    } else {
        header("Location: sign");
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $model->loginUser($email, $password);
    if ($user) {

        session_start();
        
        $_SESSION['user'] = $user;
        if ($user['type'] === 'user') {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['plann'] = $user['payment_plan'];
            header("Location: home");
        } else {
            header("Location: admin");
        }
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password.";
    }
}
function renderIndex() {
    include __DIR__ . '/../views/sign/index.php';
}

renderIndex();
?>