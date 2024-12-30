function showSection(sectionId) {
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
