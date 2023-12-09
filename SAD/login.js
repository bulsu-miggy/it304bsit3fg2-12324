function login() {
  // Retrieve values from local storage
  var storedEmail = localStorage.getItem("email");
  var storedPassword = localStorage.getItem("password");

  // Get values from the login form
  var loginEmail = document.getElementById("login-email").value;
  var loginPassword = document.getElementById("login-password").value;

  // Compare with stored values
  if (loginEmail === storedEmail && loginPassword === storedPassword) {
    alert("Login successful!");
  } else {
    alert("Login failed. Check your email and password.");
  }
}
