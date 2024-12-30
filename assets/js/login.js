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
        window.location.href = "admin1.php";
        return false;
    } 
    else {
        alert("Invalid username or password, Please try again Later!");
    }
}
function validatesignup(){
    let u = document.getElementById("userr").value;
    let p = document.getElementById("passs").value;
    let p1 = document.getElementById("pass1").value;
    let e = document.getElementById("email").value; 
    let errMeg = "";
    if (!validateEmail(e)) 
        {
        errMeg += "Error Please Enter a Valid Email\n";
    }
    if(!validatePassword(p))
    {
        errMeg += "Error: Password must contain at least 8 characters and at least 1 uppercase letter.\n";
    }
    if (u=="") {
        errMeg += "Error! Please Enter Your UserName\n";
    }
    if (p=="") {
        errMeg += "Error! Please Enter Your password\n";
    }
    if (p1=="") {
        errMeg += "Error! Please Enter Your Confirm password\n";
    }
    if(p!=p1)
    {
        errMeg += "Error! Make sure the password and the confirm are the same!\n";
    }
    if (e=="") {
        errMeg += "Error! Please Enter Email \n";
    }
    if (errMeg !== "") {
        alert(errMeg);
        return false;
    }
    alert("Signed Up Succesfully, Welcome "+ u +"!")
}