let form = document.getElementById("form");
form.addEventListener("submit", (event) => {
  let errors = [];
  let password = document.getElementById("password").value;

  if (password.length < 10) {
    errors.push("Password is not at least 10 characters long.");
  }

  if (!/[A-Z]/.test(password)) {
    errors.push("No capital is in your password.");
  }

  if (!/!|@|#|\$|%|\^|&|\*|\(|\)|_|\+/.test(password)) {
    errors.push("Must have a special character.");
  }

  if (errors.length != 0) {
    document.getElementById("error").innerText = errors.join("\n");
    event.preventDefault();
  }
});
