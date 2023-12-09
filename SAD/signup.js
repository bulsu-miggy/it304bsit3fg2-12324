function signup() {
  // Get values from the sign-up form
  var name = document.getElementById("signup-name").value;
  var email = document.getElementById("signup-email").value;
  var password = document.getElementById("signup-password").value;

  // Validate email format using a regular expression
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    console.log("Invalid email format");
    return; // Stop execution if the email format is invalid
  }

  // Store the values securely (consider using a more secure method for passwords)
  localStorage.setItem("name", name);
  localStorage.setItem("email", email);
  // Hash and salt the password before storing it in a real-world scenario

  // Switch to the sign-in form
  document.getElementById("login-email").value = email;
  document.getElementById("login-password").value = password;

  if (email === null || email.trim() === "") {
    console.log("Email is null or empty");
  } else {
    console.log("Email has a value");
  }
}
