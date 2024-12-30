<?php
class SignModel {
    private $con;

    public function __construct() {
        $this->con = new mysqli("localhost", "root", "", "software_project");
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }

    public function registerUser($name, $password, $email) {
        $sql = "INSERT INTO user (name, password, email) VALUES (?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sss", $name, $password, $email);
        return $stmt->execute();
    }

    public function loginUser($email, $password) {
        $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>