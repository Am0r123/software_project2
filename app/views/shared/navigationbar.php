<?php
session_start();
function co() {
    $con = new mysqli("localhost", "root", "", "software_project");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    return $con;
}
function getAllPages() {
    $con = co();
    if (isset($_SESSION['plann']))
    {
        $plan = $_SESSION['plann'];
        if($plan == 0 || $plan == null)
        {
            $sql = "SELECT * FROM pages WHERE payment_plan = 'Standard'";
            $result = $con->query($sql);
            $pages = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $pages[] = $row;
                }
            }
            $con->close();
            return $pages;
        }
        $sql = "SELECT * FROM pages WHERE payment_plan = '$plan'";  
        $result = $con->query($sql);
        $pages = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $pages[] = $row;
            }
        }
        $con->close();
        return $pages;
    }
    else{
        $sql = "SELECT * FROM pages WHERE payment_plan = 'Standard'";
        $result = $con->query($sql);
        $pages = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $pages[] = $row;
            }
        }
        $con->close();
        return $pages;
    }
}

$pages = getAllPages();

?>

<style>
/* General reset for the header */
.header {
    position: absolute;
    top: 0;
    width: 100%;
    background-color: #000; /* Black background */
    color: #fff; /* White text color */
    padding: 10px 0;
    z-index: 1000; /* Keeps the header on top */
}

/* Navigation styling */
.header-navigation {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px; /* Optional: Set a max width */
    margin: auto; /* Center the nav */
    padding: 0 20px; /* Padding to give some space on the sides */
}

/* Logo styling */
.header-navigation .logo {
    font-size: 24px;
    font-weight: bold;
    color: #fff; /* White logo color */
}

/* Logo red span styling */
.header-navigation .logo .red {
    color: red; /* Red color for logo */
}

/* Unordered list styles */
.header-navigation ul {
    list-style: none; /* Remove default bullet points */
    display: flex; /* Display items in a line */
    margin: 0;
    padding: 0;
}

/* List item styles */
.header-navigation ul li {
    margin-left: 20px; /* Space between menu items */
}

/* Link styles */
.header-navigation ul li a {
    text-decoration: none; /* Remove underline */
    color: #fff; /* White link color */
    padding: 5px 10px; /* Padding around links */
    transition: background-color 0.3s; /* Smooth transition */
}

/* Hover effect for links */
.header-navigation ul li a:hover {
    background-color: #444; /* Darker background on hover */
    border-radius: 5px; /* Rounded corners */
}

/* Prevent external styles from affecting the header */
header * {
    box-sizing: border-box; /* Ensure padding is included in width/height */
}
</style>
<header class="header" id="home">
    <div class="container">
        <nav class="header-navigation" aria-label="navigation">
            <div class="logo"><span class="red">F</span>GYM</div>
            <ul>
                
            <?php 
                foreach ($pages as $page): 
            ?>
                <li><a href="<?= htmlspecialchars($page['url']) ?>"><?= htmlspecialchars($page['name']) ?></a></li>
            <?php 
                endforeach; 
            ?>
            </ul>
        </nav>
    </div>
</header>
