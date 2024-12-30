function validatelogin() {

    let usernames = ["Omar", "Cristiano", "Mohsen"];
    let passwords = ["oo11", "oo22", "oo33"];
    let name = document.getElementById("user-name").value;
    let password = document.getElementById("pass-word").value;
    let x = usernames.indexOf(name); 
    if (x != -1 && passwords[x] == password) 
    {
        window.location.href = "home.php";
        return false;
    }
    if(name=="admin1"&&password=="admin123")
    {
        alert("Login successfully As Admin! Welcome " + name + "!");
        window.location.href = "admin.php";
        return false;
    } 
    else {
        alert("Invalid username or password, Please try again Later!");
    }
}

function validatesignup(){
}