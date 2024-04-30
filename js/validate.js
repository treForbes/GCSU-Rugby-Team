// Function to validate the form inputs
function validateSignupForm() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var username = document.getElementById("username");
    var pwd = document.getElementById("pwd");
    var cpwd = document.getElementById("cpwd");
    //var position = document.getElementById("position").value;
    //var weight = document.getElementById("weight").value;
    var email = document.getElementById("email");
    var phone = document.getElementById("phone");
    var team = document.getElementById("team");

    return (validfName(fname)&&validlName(lname)&&validUsername(username)&&validPassword(pwd)&&validCPassword(cpwd)&&validEmail(email)&&validPhone(phone))
}

function validateLoginForm()
{
    let username=document.getElementById("username")
    let pwd = document.getElementById("pwd")
    return (validPassword(pwd)&&validUsername(username))
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
    fInfo.innerHTML=""
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
    fInfo.innerHTML=""
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
        pInfo.className='text-danger'
        pInfo.innerHTML="Password must be only contain alphanumeric characters and be at least 6 characters long"
    }
    else{
        pInfo.innerHTML=""
        good=true;
    }
    return good;
    
}

function validCPassword(id)
{
    let pwd = id.value.trim()
    let pInfo = document.getElementById('cpwdMsg')
    let origPwd=document.getElementById('pwd').value.trim()

    good=false;
    if(origPwd!==pwd)
    {
        pInfo.className='text-danger'   
        pInfo.innerHTML="Passwords do not match"
    }
    else if(/[^a-zA-Z0-9]/.test(pwd)||pwd.length<6)
    {   
        pInfo.className='text-danger'
        pInfo.innerHTML="Password must be only contain alphanumeric characters and be at least 6 characters long"  
       
    }
    else{
        good=true;
        pInfo.innerHTML=""
    }
    return good;
    
}


function validUsername(id)
{   
    let name = id.value.trim()
    let nameInfo= document.getElementById('usernameMsg')
    good=false

    if(/^a-zA-Z0-9]/.test(name)||name.length<6)
    {
        nameInfo.className='text-danger'
        nameInfo.innerHTML="Username must only contain alphanumeric characters and be at least 6 characters long"
    }
    else{
        good=true
        nameInfo.innerHTML=""
    }
    return good;

}



function validEmail(id)
{
    let email = id.value.trim()
    let emailInfo = document.getElementById('emailMsg')
    let good = false

    if(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email))
    {
       good=true 
       emailInfo.innerHTML=""
    }
    else
    {
        emailInfo.className="text-danger"
        emailInfo.innerHTML="Please enter a valid email address"
    }

    return good
}

function validPhone(id)
{
    let phone=id.value.trim()
    let phoneInfo = document.getElementById('phoneMsg')
    good=false

    if(/[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(phone))
    {
        good=true
        phone.innerHTML=""
    }
    else
    {
        phoneInfo.className='text-danger'
        phoneInfo.innerHTML='Please enter a valid phone number'
    }
    return good
}