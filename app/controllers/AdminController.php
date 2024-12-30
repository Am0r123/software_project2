<?php
require __DIR__ . '/../models/AdminModel.php';

class AdminController {
    private $model;

    public function __construct() {
        $this->model = new AdminModel();
    }

    public function handleRequest() {
        if (isset($_POST['adduser'])) {
            $name = $_POST['userName'];
            $password = $_POST['userPassword'];
            $email = $_POST['userEmail'];
            $workout_id = $_POST['userworkoutId'];
            echo $this->model->addUser($name, $email, $password, $workout_id);
        }

        if (isset($_POST['deleteuser'])) {
            $deletedId = $_POST['userId'];
            echo $this->model->deleteUser($deletedId);
        }

        if (isset($_POST['edituser'])) {
            $id = $_POST['edituserid'];
            $name = $_POST['userNameedit'];
            $password = $_POST['userPasswordedit'];
            $email = $_POST['userEmailedit'];
            $workout_id = $_POST['userworkoutIdedit'];
            echo $this->model->editUser($id, $name, $email, $password, $workout_id);
        }

        if (isset($_POST['addadmin'])) {
            $name = $_POST['adminName'];
            $password = $_POST['adminPassword'];
            $email = $_POST['adminEmail'];
            echo $this->model->addAdmin($name, $email, $password);
        }

        if (isset($_POST['deleteadmin'])) {
            $deletedId = $_POST['adminId'];
            echo $this->model->deleteAdmin($deletedId);
        }

        if (isset($_POST['editadmin'])) {
            $id = $_POST['editadminid'];
            $name = $_POST['adminNameedit'];
            $password = $_POST['adminPasswordedit'];
            $email = $_POST['adminEmailedit'];
            echo $this->model->editAdmin($id, $name, $email, $password);
        }

        if (isset($_POST['addcoach'])) {
            $name = $_POST['coachName'];
            $password = $_POST['coachPassword'];
            $email = $_POST['coachEmail'];
            echo $this->model->addCoach($name, $email, $password);
        }

        if (isset($_POST['deletecoach'])) {
            $deletedId = $_POST['coachId'];
            echo $this->model->deleteCoach($deletedId);
        }

        if (isset($_POST['editcoach'])) {
            $id = $_POST['editcoachid'];
            $name = $_POST['coachNameedit'];
            $password = $_POST['coachPasswordedit'];
            $email = $_POST['coachEmailedit'];
            echo $this->model->editCoach($id, $name, $email, $password);
        }

        if (isset($_POST['addproduct'])) {
            $name = $_POST['productName'];
            $price = $_POST['productPrice'];
            $description = $_POST['productDescription'];
            echo $this->model->addProduct($name, $price, $description);
        }

        if (isset($_POST['deleteproduct'])) {
            $deletedId = $_POST['productId'];
            echo $this->model->deleteProduct($deletedId);
        }

        if (isset($_POST['editproduct'])) {
            $id = $_POST['editproductid'];
            $name = $_POST['productNameedit'];
            $price = $_POST['productPriceedit'];
            $description = $_POST['productDescriptionedit'];
            echo $this->model->editProduct($id, $name, $price, $description);
        }

        if (isset($_POST['addworkout'])) {
            $name = $_POST['workoutName'];
            $description = $_POST['workoutDescription'];
            echo $this->model->addWorkout($name, $description);
        }

        if (isset($_POST['deleteworkout'])) {
            $deletedId = $_POST['workoutId'];
            echo $this->model->deleteWorkout($deletedId);
        }

        if (isset($_POST['editworkout'])) {
            $id = $_POST['editworkoutid'];
            $name = $_POST['workoutNameedit'];
            $description = $_POST['workoutDescriptionedit'];
            echo $this->model->editWorkout($id, $name, $description);
        }
        
        if(isset($_POST['addpayment'])){
            $name=$_POST['paymentName'];
            $description=$_POST['paymentDescription'];
            $price=$_POST['paymentPrice'];
            addPayment($name,$description,$price);
        }
        if(isset($_POST['deletepayment'])){
            $deletedId = $_POST['paymentId'];
            deletePayment($deletedId);
        }
        if(isset($_POST['editpayment'])){
            $id = $_POST['editpaymentid'];
            $name = $_POST['paymentNameedit'];
            $description = $_POST['paymentDescriptionedit'];
            $price=$_POST['paymentPriceedit'];
            editPayment($id,$name,$description,$price);
        }
    }

    public function index() {
       $users = $this->model->getAllUsers();
        $admins = $this->model->getAllAdmins();
        $coachs = $this->model->getAllCoaches();
        $products = $this->model->getAllProducts();
        $workouts = $this->model->getAllWorkouts();
        $totalUsers = $this->model->getTotalUsers();
        $payments = $this->model->getAllPayments();
        $model= $this->model;
        require_once __DIR__ . '/../views/user/admin.php';
    }
}
$controller = new AdminController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handleRequest();
} else {
    $controller->index();
}
?>
<script>
function showSection(sectionId) {
    const sections = document.querySelectorAll('.dynamic-section');
    sections.forEach(section => {
        section.classList.add('hidden');
    });
    const selectedSection = document.getElementById(sectionId);
    if (selectedSection) {
        selectedSection.classList.remove('hidden');
    }
}</script>