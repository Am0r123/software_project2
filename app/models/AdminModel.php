<?php
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/ProductModel.php';

class AdminModel {
    private $con;

    public function __construct() {
        $this->con = getDatabaseConnection();
    }

    public function addAdmin($name, $email, $password) {
        $adminFactory = UserAdminFactory::create('admin');
        return $adminFactory->add($name, $email, $password);
    }

    public function deleteAdmin($id) {
        $adminFactory = UserAdminFactory::create('admin');
        return $adminFactory->delete($id);
    }

    public function editAdmin($id, $name, $email, $password) {
        $adminFactory = UserAdminFactory::create('admin');
        return $adminFactory->edit($id, $name, $email, $password);
    }

    public function getAllAdmins() {
        $adminFactory = UserAdminFactory::create('admin');
        return $adminFactory->getAll();
    }

    public function addUser($name, $email, $password, $workout_id) {
        $userFactory = UserAdminFactory::create('user');
        return $userFactory->add($name, $email, $password, $workout_id);
    }

    public function deleteUser($id) {
        $userFactory = UserAdminFactory::create('user');
        return $userFactory->delete($id);
    }

    public function editUser($id, $name, $email, $password, $workout_id) {
        $userFactory = UserAdminFactory::create('user');
        return $userFactory->edit($id, $name, $email, $password, $workout_id);
    }

    public function getAllUsers() {
        $userFactory = UserAdminFactory::create('user');
        return $userFactory->getAll();
    }

    public function addCoach($name, $email, $password) {
        $coachFactory = UserAdminFactory::create('coach');
        return $coachFactory->add($name, $email, $password);
    }

    public function deleteCoach($id) {
        $coachFactory = UserAdminFactory::create('coach');
        return $coachFactory->delete($id);
    }

    public function editCoach($id, $name, $email, $password) {
        $coachFactory = UserAdminFactory::create('coach');
        return $coachFactory->edit($id, $name, $email, $password);
    }

    public function getAllCoaches() {
        $coachFactory = UserAdminFactory::create('coach');
        return $coachFactory->getAll();
    }

    public function addProduct($name, $price, $description) {
        $product = Product::getInstance();
        return $product->addProduct($name, $price, $description);
    }

    public function editProduct($id, $name, $price, $description) {
        $product = Product::getInstance();
        return  $product->editProduct($id,$name,$price,$description);
    }

    public function deleteProduct($id) {
        $product = Product::getInstance();
        return $product->deleteProduct($id);

   }
   public function getAllProducts() {
        $product = Product::getInstance();
        $products = $product->getAllProducts();
        return $products;
  }
  public function addPayment($name,$description,$price) {
    $con = getDatabaseConnection();
    $sql = "INSERT INTO payment (payment_name, description, price) VALUES ('$name', '$description', '$price')";

    if ($con->query($sql) === TRUE) {
        $message = "Payment added successfully!";
        $type = "success";
    } else {
        $message = "Error: " . $con->error;
        $type = "error";
    }

    $con->close();

    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showPopupMessage('$message', '$type');
            showSection('payment')
        });
    </script>";
  }
  public  function editPayment($id, $name, $description, $price) {
    $con = getDatabaseConnection();
    
    $sql = "UPDATE payment SET payment_name = '$name', description = '$description', price = '$price' WHERE ID = $id";
    
    if ($con->query($sql) === TRUE) {
        $message = "Payment updated successfully!";
        $type = "success";
    } else {
        $message = "Error: " . $con->error;
        $type = "error";
    }
    
    $con->close();
    
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showPopupMessage('$message', '$type');
            showSection('payment');
        });
    </script>";
  }

  
  public function deletePayment($id) {
      $con = getDatabaseConnection();
      $sql = "DELETE FROM payment WHERE ID = $id";
      if ($con->query($sql) === TRUE) {
          $message =  "Payment deleted successfully!";
          $type = "success";
      } else {
          $message = "Error deleting Payment: " . $con->error;
          $type = "error";
      }
      $con->close();
      echo "<script>
          document.addEventListener('DOMContentLoaded', function() {
              showPopupMessage('$message', '$type');
              showSection('payment')
          });
      </script>";
      $payment = getAllPayments();
  }
  public function getAllPayments() {
    $con = getDatabaseConnection();
    $sql = "SELECT * FROM payment";
    $result = $con->query($sql);
    $payments = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $payments[] = $row;
        }
    }
    $con->close();
    return $payments;
}
  

    public function addWorkout($name, $description) {
        $sql = "INSERT INTO workout (name, description) VALUES ('$name', '$description')";
        return $this->executeQuery($sql, "Workout added successfully!");
    }

    public function editWorkout($id, $name, $description) {
        $sql = "UPDATE workout SET name = '$name', description = '$description' WHERE ID = $id";
        return $this->executeQuery($sql, "Workout updated successfully!");
    }

    public function deleteWorkout($id) {
        $sql = "DELETE FROM workout WHERE ID = $id";
        return $this->executeQuery($sql, "Workout deleted successfully!");
    }

    public function getAllWorkouts() {
        $sql = "SELECT * FROM workout";
        return $this->fetchAll($sql);
    }

    public function getWorkoutNameById($workoutId) {
        $workouts = $this->getAllWorkouts();
        foreach ($workouts as $workout) {
            if ($workout['ID'] == $workoutId) {
                return $workout['name'];
            }
        }
        return 'No Workout Assigned';
    }

    public function getTotalUsers() {
        $sql = "SELECT COUNT(*) as total FROM user";
        $result = $this->con->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            return $row['total'];
        }

        return 0;
    }

    private function executeQuery($sql, $successMessage) {
        if ($this->con->query($sql) === TRUE) {
            return $this->generateMessage($successMessage, "success");
        } else {
            return $this->generateMessage("Error: " . $this->con->error, "error");
        }
    }

    private function fetchAll($sql) {
        $result = $this->con->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    private function generateMessage($message, $type) {
        return "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showPopupMessage('$message', '$type');
            });
        </script>";
    }
}

function getDatabaseConnection() {
    $con = new mysqli('localhost', 'root', '', 'software_project');
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    return $con;
}