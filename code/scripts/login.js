// This script validates user entry, checking if all fields have been entered, adding an error message below input box if there is missing data

window.onload = function() {
  var email = document.getElementById("inputEmail");
  var pass = document.getElementById("inputPassword");

  document.getElementById("mainForm").addEventListener("submit", function(e) {
    e.preventDefault();
    var validationFailed = false; 
    if (email.value == null || email.value == "") {
      document.getElementById("email-error").textContent = "Please enter a valid email";
      validationFailed = true;
    }
    if (pass.value == null || pass.value == "") {
      document.getElementById("pass-error").textContent = "Please enter a password";
      validationFailed = true;
    }
    if (!validationFailed) {
        this.submit(); 
      }
  });

  email.addEventListener('input', function() {
    document.getElementById("email-error").textContent = "";
  });
  pass.addEventListener('input', function() {
    document.getElementById("pass-error").textContent = "";
  });
};
