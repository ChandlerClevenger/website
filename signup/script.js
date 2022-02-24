let form = document.getElementById("form");
let errors = [];
form.addEventListener("submit", (event) => {
  errors = [];
  validateUsername();
  validatePassword();

  if (errors.length != 0) {
    document.getElementById("error").innerText = errors.join("\n");
    event.preventDefault();
  }
});

function validatePassword() {
  let password = document.getElementById("password").value;
  let secondPassword = document.getElementById("confirm-password").value;

  if (password != secondPassword) {
    errors.push("Passwords must match!");
  }
  if (password.length < 12) {
    errors.push("Password is not at least 12 characters long.");
  }

  if (!/[A-Z]{2}/.test(password)) {
    errors.push("Password must have 2 capital letters.");
  }

  if (!/[!|@|#|\$|%|\^|&|\*|\(|\)|_|\+]{2}/.test(password)) {
    errors.push("Password must have 2 special characters.");
  }
}

function validateUsername() {
  let username = document.getElementById("username").value;

  if (username.length < 8) {
    errors.push("Username must be at least 8 characters long.");
  }

  if (!/[0-9]/.test(username)) {
    errors.push("Username must contain a number.");
  }

  if (!/[a-zA-Z]/.test(username)) {
    errors.push("Username must have letters.");
  }
}
