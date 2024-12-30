
    

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gym Admin Panel</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/admin.css">
  <!-- <script src="<?php echo BASE_URL; ?>/assets/js/admin.js" defer></script> -->
  <style>
    .hidden {
      display: none;
    }

    #popupMessage {
      position: fixed;
      top: 20px;
      right: 20px;
      padding: 15px 25px;
      border-radius: 5px;
      font-size: 16px;
      color: white;
      z-index: 1000;
      transition: opacity 0.3s ease, transform 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      opacity: 0;
      transform: translateY(-10px);
    }

    #popupMessage.success {
      background-color: #4caf50;
    }

    #popupMessage.error {
      background-color: #f44336;
    }
    #edituserform18{
      display:none;
    }
    .dynamic-section.editforms.hidden {
      display: none !important;
    }
  </style>
</head>
<body>
  <div id="popupMessage" class="hidden"></div>

  <div class="admin-container">
    <!-- Sidebar Navigation -->
    <nav class="side-nav">
      <div class="logo">Gym Admin</div>
      <ul>
        <li><a href="#" onclick="showSection('user')">Manage Users</a></li>
        <li><a href="#" onclick="showSection('admin')">Manage Admins</a></li>
        <li><a href="#" onclick="showSection('coach')">Manage Coachs</a></li>
        <li><a href="#" onclick="showSection('addProduct')">Manage Products</a></li>
        <li><a href="#" onclick="showSection('workout')">Manage Workouts</a></li>
        <li><a href="#" onclick="showSection('payment')">Manage Payment Plans</a></li>

      </ul>
    </nav>

    <!-- Main Content -->
    <main class="content">
      <!-- Insights Section -->
      <section class="insights">
        <h1>Dashboard Insights</h1>
        <div class="insights-grid">
          <div class="card">
            <h2>Total Users</h2>
            <p id="totalUsers"><?php echo $totalUsers ?></p>
          </div>
          <div class="card">
            <h2>Active Memberships</h2>
            <p id="activeMemberships">120</p>
          </div>
          <div class="card">
            <h2>Monthly Revenue</h2>
            <p id="monthlyRevenue">$8,200</p>
          </div>
          <div class="card">
            <h2>Products Sold</h2>
            <p id="productsSold">75</p>
          </div>
        </div>
      </section>

      <!-- Dynamic Sections --><!-- Manage Users Section -->
<section id="user" class="dynamic-section hidden">
  <button type="button"  class="btn-sec" style="background-color: #1abc9c; color: white; transition: 0.3s;position:absolute;right:80px;" onclick="show('addUserForm')">Add User</button>
  <h2>User List</h2>
  <table id="userTable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Workout</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
if (!empty($users)) {
    foreach ($users as $user) {
      $workoutName = $model->getWorkoutNameById($user['workout_id']);
    
      echo "
      <tr id='user-{$user['ID']}'>
          <td>{$user['name']}</td>
          <td>{$user['email']}</td>
          <td>{$workoutName}</td>
          <td>
              <div style='display: flex; align-items: center;'>
                  <form>
                      <input type='hidden' name='userId' value='{$user['ID']}' />
                      <button type='button' class='btn-primary' onclick='show(\"editUserForm\", " . json_encode($user) . ")'>Edit</button>
                  </form>
                  <form action='' method='post' style='margin-left: 10px;'>
                      <input type='hidden' name='userId' value='{$user['ID']}'/>
                      <button name='deleteuser' type='submit' class='btn-danger'>Delete</button>
                  </form>
              </div>
          </td>
      </tr>
  ";  
    }
} else {
    echo "<tr><td colspan='3'>No users found.</td></tr>";
}
?>


    </tbody>
  </table>
</section>
<form id="addUserForm" class="dynamic-section hidden" action="" method="post">
    <button type="button" style="
    background-color: #1abc9c;
    color: white;
    transition: 0.3s;
    background-color: #16a085;
    padding: 10px;
    border-radius: 50%;
    width:40px;" class="back" onclick="back('user')">&#8592;</button>
    <input type="text" name="userName" id="userName" placeholder="User Name" />
    <input type="password" name="userPassword" id="userPassword" placeholder="Password"/>
    <input type="email" name="userEmail" id="userEmail" placeholder="User Email" />
    <select name="userworkoutId" id="userworkoutId" style="
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: #f9f9f9;
    color: #333;
    transition: border-color 0.3s ease;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
">
        <option value="" disabled selected>Select a Workout</option>
        <?php foreach ($workouts as $workout): ?>
            <option value="<?= $workout['ID'] ?>"><?= $workout['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="adduser" class="btn-primary">Add User</button>
</form>
<form id="editUserForm" class="dynamic-section hidden" action="" method="post">
    <button type="button" style="
    background-color: #1abc9c;
    color: white;
    transition: 0.3s;
    background-color: #16a085;
    padding: 10px;
    border-radius: 50%;
    width:40px;" class="back" onclick="back('user')">&#8592;</button>
    <input type="text" name="edituserid" id="edituserid" hidden/>
    <input type="text" name="userNameedit" id="userNameedit" placeholder="User Name" />
    <input type="password" name="userPasswordedit" id="userPasswordedit" placeholder="Password"/>
    <input type="email" name="userEmailedit" id="userEmailedit" placeholder="User Email" />
    <select name="userworkoutIdedit" id="userworkoutIdedit" style="
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: #f9f9f9;
    color: #333;
    transition: border-color 0.3s ease;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
">
        <option value="" disabled selected>Select a Workout</option>
        <?php foreach ($workouts as $workout): ?>
          <option value="<?= $workout['ID'] ?>"><?= $workout['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="edituser" class="btn-primary">Edit User</button>
</form>

<!-- Manage Admins Section -->
<section id="admin" class="dynamic-section hidden">
  <button type="button"  class="btn-sec" style="background-color: #1abc9c; color: white; transition: 0.3s;position:absolute;right:80px;" onclick="show('addAdminForm')">Add Admin</button>
  <h2>Admin List</h2>
  <table id="adminTable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
if (!empty($admins)) {
    foreach ($admins as $admin) {
      echo "
      <tr id='admin-{$admin['ID']}'>
          <td>{$admin['name']}</td>
          <td>{$admin['email']}</td>
          <td>
              <div style='display: flex; align-items: center;'>
                  <form>
                      <input type='hidden' name='adminId' value='{$admin['ID']}' />
                      <button type='button' class='btn-primary' onclick='show(\"editAdminForm\", " . json_encode($admin) . ")'>Edit</button>
                  </form>
                  <form action='' method='post' style='margin-left: 10px;'>
                      <input type='hidden' name='adminId' value='{$admin['ID']}'/>
                      <button name='deleteadmin' type='submit' class='btn-danger'>Delete</button>
                  </form>
              </div>
          </td>
      </tr>
  ";  
    }
} else {
    echo "<tr><td colspan='3'>No Admins found.</td></tr>";
}
?>
    </tbody>
  </table>
</section>
<form id="addAdminForm" class="dynamic-section hidden" action="" method="post">
    <button type="button" style="
    background-color: #1abc9c;
    color: white;
    transition: 0.3s;
    background-color: #16a085;
    padding: 10px;
    border-radius: 50%;
    width:40px;" class="back" onclick="back('admin')">&#8592;</button>
    <input type="text" name="adminName" id="adminName" placeholder="Admin Name" />
    <input type="password" name="adminPassword" id="adminPassword" placeholder="Password"/>
    <input type="email" name="adminEmail" id="adminEmail" placeholder="Admin Email" />
    <button type="submit" name="addadmin" class="btn-primary">Add Admin</button>
</form>
<form id="editAdminForm" class="dynamic-section hidden" action="" method="post">
    <button type="button" style="
    background-color: #1abc9c;
    color: white;
    transition: 0.3s;
    background-color: #16a085;
    padding: 10px;
    border-radius: 50%;
    width:40px;" class="back" onclick="back('admin')">&#8592;</button>
    <input type="text" name="editadminid" id="editadminid" hidden/>
    <input type="text" name="adminNameedit" id="adminNameedit" placeholder="Admin Name" />
    <input type="password" name="adminPasswordedit" id="adminPasswordedit" placeholder="Password"/>
    <input type="email" name="adminEmailedit" id="adminEmailedit" placeholder="Admin Email" />
    <button type="submit" name="editadmin" class="btn-primary">Edit Admin</button>
</form>

<!-- coach -->
<section id="coach" class="dynamic-section hidden">
  <button type="button"  class="btn-sec" style="background-color: #1abc9c; color: white; transition: 0.3s;position:absolute;right:80px;" onclick="show('addCoachForm')">Add Coach</button>
  <h2>Coach List</h2>
  <table id="CoachTable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
if (!empty($coachs)) {
    foreach ($coachs as $coach) {
      echo "
      <tr id='coach-{$coach['ID']}'>
          <td>{$coach['name']}</td>
          <td>{$coach['email']}</td>
          <td>
              <div style='display: flex; align-items: center;'>
                  <form>
                      <input type='hidden' name='coachId' value='{$coach['ID']}' />
                      <button type='button' class='btn-primary' onclick='show(\"editCoachForm\", " . json_encode($coach) . ")'>Edit</button>
                  </form>
                  <form action='' method='post' style='margin-left: 10px;'>
                      <input type='hidden' name='coachId' value='{$coach['ID']}'/>
                      <button name='deletecoach' type='submit' class='btn-danger'>Delete</button>
                  </form>
              </div>
          </td>
      </tr>
  ";  
    }
} else {
    echo "<tr><td colspan='3'>No Coachs found.</td></tr>";
}
?>
    </tbody>
  </table>
</section>
<form id="addCoachForm" class="dynamic-section hidden" action="" method="post">
    <button type="button" style="
    background-color: #1abc9c;
    color: white;
    transition: 0.3s;
    background-color: #16a085;
    padding: 10px;
    border-radius: 50%;
    width:40px;" class="back" onclick="back('coach')">&#8592;</button>
    <input type="text" name="coachName" id="coachName" placeholder="Coach Name" />
    <input type="password" name="coachPassword" id="coachPassword" placeholder="Password"/>
    <input type="email" name="coachEmail" id="coachEmail" placeholder="Coach Email" />
    <button type="submit" name="addcoach" class="btn-primary">Add Coach</button>
</form>
<form id="editCoachForm" class="dynamic-section hidden" action="" method="post">
    <button type="button" style="
    background-color: #1abc9c;
    color: white;
    transition: 0.3s;
    background-color: #16a085;
    padding: 10px;
    border-radius: 50%;
    width:40px;" class="back" onclick="back('coach')">&#8592;</button>
    <input type="text" name="editcoachid" id="editcoachid" hidden/>
    <input type="text" name="coachNameedit" id="coachNameedit" placeholder="Coach Name" />
    <input type="password" name="coachPasswordedit" id="coachPasswordedit" placeholder="Password"/>
    <input type="email" name="coachEmailedit" id="coachEmailedit" placeholder="Coach Email" />
    <button type="submit" name="editcoach" class="btn-primary">Edit Coach</button>
</form>

<!-- Products Section -->
<section id="addProduct" class="dynamic-section hidden">
  <button type="button"  class="btn-sec" style="background-color: #1abc9c; color: white; transition: 0.3s;position:absolute;right:80px;" onclick="show('addProductForm')">Add Product</button>
  <h2>Product List</h2>
  <table id="productTable">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
if (!empty($products)) {
    foreach ($products as $product) {
      echo "
      <tr id='product-{$product['ID']}'>
          <td>{$product['name']}</td>
          <td>{$product['price']}</td>
          <td>{$product['description']}</td>
          <td>
              <div style='display: flex; align-items: center;'>
                  <form>
                      <input type='hidden' name='productId' value='{$product['ID']}' />
                      <button type='button' class='btn-primary' onclick='show(\"editProductForm\", " . json_encode($product) . ")'>Edit</button>
                  </form>
                  <form action='' method='post' style='margin-left: 10px;'>
                      <input type='hidden' name='productId' value='{$product['ID']}'/>
                      <button name='deleteproduct' type='submit' class='btn-danger'>Delete</button>
                  </form>
              </div>
          </td>
      </tr>
  ";  
    }
} else {
    echo "<tr><td colspan='3'>No products found.</td></tr>";
}
?>
    </tbody>
  </table>
</section>
<form id="addProductForm" class="dynamic-section hidden" action="" method="post">
    <button type="button" style="
    background-color: #1abc9c;
    color: white;
    transition: 0.3s;
    background-color: #16a085;
    padding: 10px;
    border-radius: 50%;
    width:40px;" class="back" onclick="back('addProduct')">&#8592;</button>
    <input type="text" name="productName" id="productName" placeholder="Product Name" />
    <input type="number" name="productPrice" id="productPrice" placeholder="Price"/>
    <textarea id="productDescription" name="productDescription" placeholder="Description"></textarea>
    <button type="submit" name="addproduct" class="btn-primary">Add Product</button>
</form>
<form id="editProductForm" class="dynamic-section hidden" action="" method="post">
    <button type="button" style="
    background-color: #1abc9c;
    color: white;
    transition: 0.3s;
    background-color: #16a085;
    padding: 10px;
    border-radius: 50%;
    width:40px;" class="back" onclick="back('addProduct')">&#8592;</button>
    <input type="text" name="editproductid" id="editproductid" hidden/>
    <input type="text" name="productNameedit" id="productNameedit" placeholder="Product Name" />
    <input type="number" name="productPriceedit" id="productPriceedit" placeholder="Price"/>
    <textarea id="productDescriptionedit" name="productDescriptionedit" placeholder="Description"></textarea>
    <button type="submit" name="editproduct" class="btn-primary">Edit Product</button>
</form>
<!-- workouts  -->
<section id="workout" class="dynamic-section hidden">
  <button type="button"  class="btn-sec" style="background-color: #1abc9c; color: white; transition: 0.3s;position:absolute;right:80px;" onclick="show('addworkoutForm')">Add Workout</button>
  <h2>Workout List</h2>
  <table id="workoutTable">
    <thead>
      <tr>
        <th>Workout Name</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
if (!empty($workouts)) {
    foreach ($workouts as $workout) {
      echo "
      <tr id='workout-{$workout['ID']}'>
          <td>{$workout['name']}</td>
          <td>{$workout['description']}</td>
          <td>
              <div style='display: flex; align-items: center;'>
                  <form>
                      <input type='hidden' name='workoutId' value='{$workout['ID']}' />
                      <button type='button' class='btn-primary' onclick='show(\"editWorkoutForm\", " . json_encode($workout) . ")'>Edit</button>
                  </form>
                  <form action='' method='post' style='margin-left: 10px;'>
                      <input type='hidden' name='workoutId' value='{$workout['ID']}'/>
                      <button name='deleteworkout' type='submit' class='btn-danger'>Delete</button>
                  </form>
              </div>
          </td>
      </tr>
  ";  
    }
} else {
    echo "<tr><td colspan='3'>No workouts found.</td></tr>";
}
?>
    </tbody>
  </table>
</section>
<form id="addworkoutForm" class="dynamic-section hidden" action="" method="post">
    <button type="button" style="
    background-color: #1abc9c;
    color: white;
    transition: 0.3s;
    background-color: #16a085;
    padding: 10px;
    border-radius: 50%;
    width:40px;" class="back" onclick="back('workout')">&#8592;</button>
    <input type="text" name="workoutName" id="workoutName" placeholder="Workout Name" />
    <textarea id="workoutDescription" name="workoutDescription" placeholder="Description"></textarea>
    <button type="submit" name="addworkout" class="btn-primary">Add Workout</button>
</form>
<form id="editWorkoutForm" class="dynamic-section hidden" action="" method="post">
    <button type="button" style="
    background-color: #1abc9c;
    color: white;
    transition: 0.3s;
    background-color: #16a085;
    padding: 10px;
    border-radius: 50%;
    width:40px;" class="back" onclick="back('workout')">&#8592;</button>
    <input type="text" name="editworkoutid" id="editworkoutid" hidden/>
    <input type="text" name="workoutNameedit" id="workoutNameedit" placeholder="Workout Name" />
    <textarea id="workoutDescriptionedit" name="workoutDescriptionedit" placeholder="Description"></textarea>
    <button type="submit" name="editworkout" class="btn-primary">Edit Workout</button>
</form>
<section id="payment" class="dynamic-section hidden">
  <button type="button"  class="btn-sec" style="background-color: #1abc9c; color: white; transition: 0.3s;position:absolute;right:80px;" onclick="show('addpaymentForm')">Add Payment</button>
  <h2>Payment plan List</h2>
  <table id="paymentTable">
    <thead>
      <tr>
        <th>Payment plan Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
if (!empty($payments)) {
    foreach ($payments as $payment) {
      echo "
      <tr id='payment-{$payment['ID']}'>
          <td>{$payment['payment_name']}</td>
          <td>{$payment['description']}</td>
          <td>{$payment['price']}</td>
          <td>
              <div style='display: flex; align-items: center;'>
                  <form>
                      <input type='hidden' name='paymentId' value='{$payment['ID']}' />
                      <button type='button' class='btn-primary' onclick='show(\"editPaymentForm\", " . json_encode($payment) . ")'>Edit</button>
                  </form>
                  <form action='' method='post' style='margin-left: 10px;'>
                      <input type='hidden' name='paymentId' value='{$payment['ID']}'/>
                      <button name='deletepayment' type='submit' class='btn-danger'>Delete</button>
                  </form>
              </div>
          </td>
      </tr>
  ";  
    }
} else {
    echo "<tr><td colspan='3'>No payments found.</td></tr>";
}
?>
    </tbody>
  </table>
</section>
<form id="addpaymentForm" class="dynamic-section hidden" action="" method="post">
    <button type="button" style="
    background-color: #1abc9c;
    color: white;
    transition: 0.3s;
    background-color: #16a085;
    padding: 10px;
    border-radius: 50%;
    width:40px;" class="back" onclick="back('payment')">&#8592;</button>
    <input type="text" name="paymentName" id="paymentName" placeholder="Payment plan Name" />
    <textarea id="paymentDescription" name="paymentDescription" placeholder="Description"></textarea>
    <input type="number" name="paymentPrice" id="paymentPrice" />
    <button type="submit" name="addpayment" class="btn-primary">Add Payment</button>
</form>
<form id="editPaymentForm" class="dynamic-section hidden" action="" method="post">
    <button type="button" style="
    background-color: #1abc9c;
    color: white;
    transition: 0.3s;
    background-color: #16a085;
    padding: 10px;
    border-radius: 50%;
    width:40px;" class="back" onclick="back('payment')">&#8592;</button>
    <input type="text" name="editpaymentid" id="editpaymentid" hidden/>
    <input type="text" name="paymentNameedit" id="paymentNameedit" placeholder="Payment Name" />
    <textarea id="paymentDescriptionedit" name="paymentDescriptionedit" placeholder="Description"></textarea>
    <input type="number" name="paymentPriceedit" id="paymentPriceedit" placeholder="Payment Price" />
    <button type="submit" name="editpayment" class="btn-primary">Edit payment</button>
</form>

</section>
<script >function showSection(sectionId) {
    const sections = document.querySelectorAll('.dynamic-section');
    sections.forEach(section => {
        section.classList.add('hidden');
    });
    const selectedSection = document.getElementById(sectionId);
    if (selectedSection) {
        selectedSection.classList.remove('hidden');
    }
}
function show(id,userData){
  console.log(userData);
  if(userData?.type == 'user'){
    console.log(userData);
    document.getElementById('userPasswordedit').value = userData.password;
    document.getElementById('userworkoutIdedit').value = userData.workout_id;
    document.getElementById('edituserid').value = userData.ID;
    document.getElementById('userNameedit').value = userData.name;
    document.getElementById('userEmailedit').value = userData.email;
  }
  else if(userData?.type == 'admin'){
    console.log(userData);
    document.getElementById('adminPasswordedit').value = userData.password;
    document.getElementById('editadminid').value = userData.ID;
    document.getElementById('adminNameedit').value = userData.name;
    document.getElementById('adminEmailedit').value = userData.email;
  }
  else if(userData?.type == 'coach'){
    console.log(userData);
    document.getElementById('coachPasswordedit').value = userData.password;
    document.getElementById('editcoachid').value = userData.ID;
    document.getElementById('coachNameedit').value = userData.name;
    document.getElementById('coachEmailedit').value = userData.email;
  }
  else if(userData?.payment_name){
        console.log(userData);
        document.getElementById('editpaymentid').value = userData.ID;
        document.getElementById('paymentNameedit').value = userData.payment_name;
        document.getElementById('paymentPriceedit').value = userData.price;
        document.getElementById('paymentDescriptionedit').value = userData.description;
      }
  else if(userData?.price){
    console.log(userData);
    document.getElementById('editproductid').value = userData.ID;
    document.getElementById('productPriceedit').value =  userData.price;
    document.getElementById('productNameedit').value = userData.name;
    document.getElementById('productDescriptionedit').value = userData.description;
  }
  else if(userData?.description){
    console.log(userData);
    document.getElementById('editworkoutid').value = userData.ID;
    document.getElementById('workoutNameedit').value = userData.name;
    document.getElementById('workoutDescriptionedit').value = userData.description;
  }
  console.log(id);
    const sections = document.querySelectorAll('.dynamic-section');
    sections.forEach(section => {
        section.classList.add('hidden');
    });
    const selectedSection = document.getElementById(id);
    if (selectedSection) {
        selectedSection.classList.remove('hidden');
    }
}
function back(id){
  const sections1 = document.querySelectorAll('.dynamic-section');
  sections1.forEach(section => {
      section.classList.add('hidden');
  });
  const sections = document.querySelectorAll('.insights');
  sections.forEach(section => {
      section.classList.remove('hidden');
  });
  const selectedSection = document.getElementById(id);
    if (selectedSection) {
        selectedSection.classList.remove('hidden');
    }
}
let users = [];
let admins = [];
let products = [];
let workouts = [];
function addUser() {
const name = document.getElementById('userName').value;
const email = document.getElementById('userEmail').value;

if (name && email) {
    users.push({ name, email });
    updateUserTable();
    document.getElementById('addUserForm').reset();
}
}

function updateUserTable() {
const tableBody = document.getElementById('userTable').querySelector('tbody');
tableBody.innerHTML = '';

users.forEach((user, index) => {
    const row = `
    <tr>
        <td>${user.name}</td>
        <td>${user.email}</td>
        <td>
        <button onclick="deleteUser(${index})" class="btn-danger">Delete</button>
        </td>
    </tr>`;
    tableBody.innerHTML += row;
});
}

function deleteUser(index) {
users.splice(index, 1);
updateUserTable();
}

function addAdmin() {
const name = document.getElementById('adminName').value;
const email = document.getElementById('adminEmail').value;

if (name && email) {
    admins.push({ name, email });
    updateAdminTable();
    document.getElementById('addAdminForm').reset();
}
}

function updateAdminTable() {
const tableBody = document.getElementById('adminTable').querySelector('tbody');
tableBody.innerHTML = '';

admins.forEach((admin, index) => {
    const row = `
    <tr>
        <td>${admin.name}</td>
        <td>${admin.email}</td>
        <td>
        <button onclick="deleteAdmin(${index})" class="btn-danger">Delete</button>
        </td>
    </tr>`;
    tableBody.innerHTML += row;
});
}

function deleteAdmin(index) {
admins.splice(index, 1);
updateAdminTable();
}

function addProduct() {
const name = document.getElementById('productName').value;
const price = document.getElementById('productPrice').value;
const description = document.getElementById('productDescription').value;

if (name && price && description) {
    products.push({ name, price, description });
    updateProductTable();
    document.getElementById('addProductForm').reset();
}
}
function addworkout(){
const name = document.getElementById('workoutName').value;
const description = document.getElementById('workoutDescription').value;

if (name && description) {
    workouts.push({ name, description });
    updateworkoutTable();
    document.getElementById('addwokroutForm').reset();
}
}
function updateworkoutTable() {
const tableBody = document.getElementById('workoutTable').querySelector('tbody');
tableBody.innerHTML = '';

workouts.forEach((workout, index) => {
    const row = `
    <tr>
        <td>${workout.name}</td>
        <td>${workout.description}</td>
        <td>
        <button onclick="deleteworkout(${index})" class="btn-danger">Delete</button>
        </td>
    </tr>`;
    tableBody.innerHTML += row;
});
}
function deleteworkout(index) {
workouts.splice(index, 1);
updateworkoutTable();
}

function updateProductTable() {
const tableBody = document.getElementById('productTable').querySelector('tbody');
tableBody.innerHTML = '';

products.forEach((product, index) => {
    const row = `
    <tr>
        <td>${product.name}</td>
        <td>${product.price}</td>
        <td>${product.description}</td>
        <td>
        <button onclick="deleteProduct(${index})" class="btn-danger">Delete</button>
        </td>
    </tr>`;
    tableBody.innerHTML += row;
});
}

function deleteProduct(index) {
  products.splice(index, 1);
  updateProductTable();
  }
function showPopupMessage(message, type) {
  const popup = document.getElementById('popupMessage');
  popup.textContent = message;

  popup.className = type === 'success' ? 'success' : 'error';

  popup.style.opacity = '1';
  popup.style.transform = 'translateY(0)';
  popup.style.display = 'block';

  setTimeout(() => {
      popup.style.opacity = '0';
      popup.style.transform = 'translateY(-10px)';
      setTimeout(() => {
          popup.style.display = 'none';
          popup.className = 'hidden';
      }, 300);
  }, 3000);
}

</script>
</body>
</html>
