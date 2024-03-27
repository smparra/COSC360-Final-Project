window.onload = function() {
  var fname = document.querySelector('input[name="inputFirstName"]');
  var lname = document.querySelector('input[name="inputLastName"]');
  var email = document.querySelector('input[name="inputEmail"]');
  var pass = document.querySelector('input[name="inputPassword"]');
  var confirmPass = document.querySelector('input[name="confirmPassword"]');

  var nameError = document.getElementById("name-error");
  var emailError = document.getElementById("email-error");
  var passError = document.getElementById("pass-error");
  var confirmPassError = document.getElementById("confirmpass-error");

// validate names
  document.getElementById("changeName").addEventListener("submit", function(e) {
    e.preventDefault();
    if ((fname.value == null || fname.value == "") && (lname.value == null || lname.value == "")) {
      nameError.textContent = "Please enter either first or last name";
    }else{
      this.submit(); 
    }
  });

// validate email
  document.getElementById("changeEmail").addEventListener("submit", function(e) {
    e.preventDefault();
    if (email.value == null || email.value == "") {
      emailError.textContent = "Please enter a new email";
    }else{
      this.submit(); 
    }
  });

// validate passwords
  document.getElementById("changePassword").addEventListener("submit", function(e) {
    e.preventDefault();
    var validationFailed = false; 
    var passwordsMatch = false;
    if (pass.value == null || pass.value == "") {
      passError.textContent = "Please enter a password";
      validationFailed = true;
    }
    if (confirmPass.value == null || confirmPass.value == "") {
      confirmPassError.textContent = "Please confirm your password";
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
    document.getElementById("email-error").textContent = "";
  });
  pass.addEventListener('input', function() {
    document.getElementById("pass-error").textContent = "";
  });
  confirmPass.addEventListener('input', function() {
    document.getElementById("confirmpass-error").textContent = "";
  });
};