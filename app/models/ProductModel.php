<?php
class Product {
    private static $instance = null;
    private $con;

    private function __construct() {
        $this->con = getDatabaseConnection();
    }

    private function __clone() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Product();
        }
        return self::$instance;
    }

    public function addProduct($name, $price, $description) {
        $sql = "INSERT INTO product (name, price, description) VALUES ('$name', '$price', '$description')";

        if ($this->con->query($sql) === TRUE) {
            $message = "Product added successfully!";
            $type = "success";
        } else {
            $message = "Error: " . $this->con->error;
            $type = "error";
        }

        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showPopupMessage('$message', '$type');
                showSection('addProduct');
            });
        </script>";
    }

    public function editProduct($id, $name, $price, $description) {
        $sql = "UPDATE product SET name = '$name', price = '$price', description = '$description' WHERE ID = $id";

        if ($this->con->query($sql) === TRUE) {
            $message = "Product updated successfully!";
            $type = "success";
        } else {
            $message = "Error: " . $this->con->error;
            $type = "error";
        }

        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showPopupMessage('$message', '$type');
                showSection('addProduct');
            });
        </script>";
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM product WHERE ID = $id";
        if ($this->con->query($sql) === TRUE) {
            $message =  "Product deleted successfully!";
            $type = "success";
        } else {
            $message = "Error deleting product: " . $this->con->error;
            $type = "error";
        }

        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showPopupMessage('$message', '$type');
                showSection('addProduct');
            });
        </script>";

        $this->getAllProducts();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM product";
        $result = $this->con->query($sql);
        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }

    public function __destruct() {
        $this->con->close();
    }
}


?>