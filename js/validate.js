// Function to validate the form inputs
function validateSignupForm() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var username = document.getElementById("username").value;
    var pwd = document.getElementById("pwd").value;
    var cpwd = document.getElementById("cpwd").value;
    var position = document.getElementById("position").value;
    var weight = document.getElementById("weight").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var team = document.getElementById("team").value;

    // Simple validation examples, you can expand as needed
    if (fname.trim() == ""||/[^a-zA-z]/.test(lname)) {
        alert("Please enter your first name");
        return false;
    }
    if (lname.trim() == "") {
        alert("Please enter your last name");
        return false;
    }
    if (username.trim() == "") {
        alert("Please enter a username");
        return false;
    }
    // Add more validation rules for other fields as needed

    // Example: Checking if passwords match
    if (pwd !== cpwd) {
        alert("Passwords do not match");
        return false;
    }

    // Example: Validating email format
    if (!isValidEmail(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    // Example: Validating phone number format
    var phonePattern = /^\d{10}$/; // Assuming a 10-digit phone number
    if (!phonePattern.test(phone)) {
        alert("Please enter a valid 10-digit phone number");
        return false;
    }

   
    return true;
}
 function isValidEmail(email) {
    var input = document.createElement('input');
    input.type = 'email';
    input.value = email;
    return input.validity.valid;
}


function validfName(id)
{
    let name=id.value.trim()
    let fInfo = document.getElementById("fNameMsg")
    good=false;

    if(name=="")
    {
        
        fInfo.className="text-danger"
        fInfo.innerHTML="Field must not be empty"
        
    }
    else if(/[^a-zA-z]/.test(name))
    {
        
        fInfo.className="text-danger"
        fInfo.innerHTML="Field must only contain letters"
    }
    else
    {
    
    good=true;
    }
    return good;

}

function validlName(id)
{
    let name=id.value.trim()
    let fInfo = document.getElementById("lNameMsg")
    good=false;

    if(name=="")
    {
        
        fInfo.className="text-danger"
        fInfo.innerHTML="Field must not be empty"
        
    }
    else if(/[^a-zA-z]/.test(name))
    {
        
        fInfo.className="text-danger"
        fInfo.innerHTML="Field must only contain letters"
    }
    else
    {
    
    good=true;
    }
    return good;
}

function validPassword(id)
{
    let pwd = id.value.trim()
    let pInfo = document.getElementById('pwdMsg')
    good=false;

    if(/[^a-zA-Z0-9]/.test(pwd)||pwd.length<6)
    {   
        pInfo.innerHTML="bad"
    }
    else{
        pInfo.innerHTML="good"
        good=true;
    }
    return good;
    
}