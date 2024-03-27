// This script validates user entry, checking if all fields have been entered, then checks if the passwords match
// When form is submitted, registerUser.php is called to double check if user exists, then load user input to database

window.onload = function() {
  var fname = document.querySelector('input[name="inputFirstName"]');
  var lname = document.querySelector('input[name="inputLastName"]');
  var email = document.querySelector('input[name="inputEmail"]');
  var pass = document.querySelector('input[name="inputPassword"]');
  var confirmPass = document.querySelector('input[name="confirmPassword"]');


  document.getElementById("mainForm").addEventListener("submit", function(e) {
    e.preventDefault();
    var validationFailed = false; 
    var passwordsMatch = false;
    if (fname.value == null || fname.value == "") {
      document.getElementById("fname-error").textContent = "Please enter a valid name";
      validationFailed = true;
    }    
    if (lname.value == null || lname.value == "") {
      document.getElementById("lname-error").textContent = "Please enter a valid name";
      validationFailed = true;
    }
    if (email.value == null || email.value == "") {
      document.getElementById("email-error").textContent = "Please enter a valid email";
      validationFailed = true;
    }
    if (pass.value == null || pass.value == "") {
      document.getElementById("pass-error").textContent = "Please enter a password";
      validationFailed = true;
    }
    if (confirmPass.value == null || confirmPass.value == "") {
      document.getElementById("confirmpass-error").textContent = "Please confirm your password";
      validationFailed = true;
    }
    if (!validationFailed) {
      // check if passwords match
      if(pass.value !== confirmPass.value){
        e.preventDefault();
        alert("Passwords do not match");
      }else{
        this.submit(); 
      }
    };
  });

  email.addEventListener('input', function() {
    document.getElementById("fname-error").textContent = "";
  });  
  email.addEventListener('input', function() {
    document.getElementById("lname-error").textContent = "";
  });
  email.addEventListener('input', function() {
    document.getElementById("email-error").textContent = "";
  });
  pass.addEventListener('input', function() {
    document.getElementById("pass-error").textContent = "";
  });
  confirmPass.addEventListener('input', function() {
    document.getElementById("confirmpass-error").textContent = "";
  });
};
