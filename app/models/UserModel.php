<?php
class UserAdminFactory {
    public static function create($type) {
        if ($type === 'user') {
            return new User();
        } elseif ($type === 'admin') {
            return new Admin();
        } elseif ($type == 'coach') {
            return new Coach("", "", "");
        } else {
            throw new Exception("Invalid user type: $type");
        }


}}
class Admin {
    private $con;


    public function __construct() {
        $this->con = getDatabaseConnection();
    }

    public function add($name, $email, $password) {
        $sql = "INSERT INTO user (name, email, password, type) VALUES ('$name', '$email', '$password', 'admin')";
        if ($this->con->query($sql) === TRUE) {
            return $this->generateMessage("Admin added successfully!", "success");
        } else {
            return $this->generateMessage("Error: " . $this->con->error, "error");
        }
    }

    public function edit($id, $name, $email, $password) {
        $sql = "UPDATE user SET name = '$name', email = '$email', password = '$password', type = 'admin' WHERE ID = $id";
        if ($this->con->query($sql) === TRUE) {
            return $this->generateMessage("Admin updated successfully!", "success");
        } else {
            return $this->generateMessage("Error: " . $this->con->error, "error");
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM user WHERE ID = $id";
        if ($this->con->query($sql) === TRUE) {
            return $this->generateMessage("Admin deleted successfully!", "success");
        } else {
            return $this->generateMessage("Error deleting admin: " . $this->con->error, "error");
        }
    }

    public function getAll() {
        $con = getDatabaseConnection();
        $sql = "SELECT * FROM user WHERE type = 'admin'";
        $result = $con->query($sql);
        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        $con->close();
        return $users;
    }

    private function generateMessage($message, $type) {
        return "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showPopupMessage('$message', '$type');
                showSection('admin')
            });
        </script>";
    }
}
class User {
    private $con;

    public function __construct() {
        $this->con = getDatabaseConnection();
    }

    public function add($name, $email, $password, $workout_id) {
        $sql = "INSERT INTO user (name, email, password, type, workout_id) VALUES ('$name', '$email', '$password', 'user', $workout_id)";
        if ($this->con->query($sql) === TRUE) {
            return $this->generateMessage("User added successfully!", "success");
        } else {
            return $this->generateMessage("Error: " . $this->con->error, "error");
        }
    }

    public function edit($id, $name, $email, $password, $workout_id) {
        $sql = "UPDATE user SET name = '$name', email = '$email', password = '$password', type = 'user', workout_id = '$workout_id' WHERE ID = $id";
        if ($this->con->query($sql) === TRUE) {
            return $this->generateMessage("User updated successfully!", "success");
        } else {
            return $this->generateMessage("Error: " . $this->con->error, "error");
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM user WHERE ID = $id";
        if ($this->con->query($sql) === TRUE) {
            return $this->generateMessage("User deleted successfully!", "success");
        } else {
            return $this->generateMessage("Error deleting user: " . $this->con->error, "error");
        }
    }

    public function getAll() {
        $con = getDatabaseConnection();
        $sql = "SELECT * FROM user WHERE type = 'user'";
        $result = $con->query($sql);
        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        $con->close();
        return $users;
    }

    private function generateMessage($message, $type) {
        return "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showPopupMessage('$message', '$type');
                showSection('user')
            });
        </script>";
    }
}

class Coach {
    private $con;

    public function __construct() {
        $this->con = getDatabaseConnection();
    }

    public function add($name, $email, $password) {
        $sql = "INSERT INTO user (name, email, password, type) VALUES ('$name', '$email', '$password', 'coach')";
        if ($this->con->query($sql) === TRUE) {
            return $this->generateMessage("Coach added successfully!", "success");
        } else {
            return $this->generateMessage("Error: " . $this->con->error, "error");
        }
    }

    public function edit($id, $name, $email, $password) {
        $sql = "UPDATE user SET name = '$name', email = '$email', password = '$password', type = 'coach' WHERE ID = $id";
        if ($this->con->query($sql) === TRUE) {
            return $this->generateMessage("Coach updated successfully!", "success");
        } else {
            return $this->generateMessage("Error: " . $this->con->error, "error");
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM user WHERE ID = $id";
        if ($this->con->query($sql) === TRUE) {
            return $this->generateMessage("Coach deleted successfully!", "success");
        } else {
            return $this->generateMessage("Error deleting admin: " . $this->con->error, "error");
        }
    }

    public function getAll() {
        $con = getDatabaseConnection();
        $sql = "SELECT * FROM user WHERE type = 'coach'";
        $result = $con->query($sql);
        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        $con->close();
        return $users;
    }

    private function generateMessage($message, $type) {
        return "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showPopupMessage('$message', '$type');
                showSection('coach')
            });
        </script>";
    }
}

?>
