// image translation logic
const imgs = document.querySelectorAll("table img");
const root = document.documentElement;
imgs.forEach((image) => {
  let table = image.closest("table");
  image.addEventListener("mouseover", (event) => {
    let imageBoundry = event.target.getBoundingClientRect();
    let tableBoundry = table.getBoundingClientRect();
    if (imageBoundry.top < tableBoundry.top) {
      root.style.setProperty(
        "--translate-y",
        tableBoundry.top - imageBoundry.top + "px"
      );
    }
    if (imageBoundry.right > tableBoundry.right) {
      root.style.setProperty(
        "--translate-x",
        imageBoundry.right - tableBoundry.right + "px"
      );
    }
    if (imageBoundry.bottom > tableBoundry.bottom) {
      root.style.setProperty(
        "--translate-y",
        tableBoundry.bottom - imageBoundry.bottom + "px"
      );
    }
    event.preventDefault();
  });
});
// reset properties when not hovering
imgs.forEach((image) => {
  image.addEventListener("mouseleave", (event) => {
    root.style.setProperty("--translate-x", "0px");
    root.style.setProperty("--translate-y", "0px");
  });
});

let rows = document.querySelectorAll("#cart tbody tr");
let currentQuantities = {};
rows.forEach((row) => {
  let newQuantityDiv = document.createElement("input");
  let quantityDiv = row.querySelector(".quantity");
  let quantityVal = quantityDiv.innerText;
  newQuantityDiv.type = "number";
  newQuantityDiv.value = quantityVal;
  newQuantityDiv.classList.add("change-quantity");
  quantityDiv.innerHTML = "";
  quantityDiv.appendChild(newQuantityDiv);
  currentQuantities[row.getAttribute("data-id")] = quantityVal;
});

let updateButton = document.querySelector("#update");
updateButton.addEventListener("click", () => {
  rows.forEach((row) => {
    let newQuantity = row.querySelector(".change-quantity").value;
    let id = row.getAttribute("data-id");
    let difference = newQuantity - currentQuantities[id];
    if (newQuantity <= 0) {
      deleteBook(id);
    } else if (currentQuantities[id] != newQuantity) {
      updateBookQuantity(id, difference);
    }
  });
});

function deleteBook(id) {
  let req = new XMLHttpRequest();
  let params = "id=" + id;
  req.open("POST", "../model/deleteBook.php");
  req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  req.send(params);
  delete currentQuantities[id];
  window.location.href = ".";
}

function updateBookQuantity(id, newQuantity) {
  let req = new XMLHttpRequest();
  let params = "id=" + id + "&quantity=" + newQuantity;
  req.open("POST", "../model/updateCart.php");
  req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  req.send(params);
  currentQuantities[id] = newQuantity;
  window.location.href = ".";
}
