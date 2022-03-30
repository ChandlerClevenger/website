// give rows click functionality
const rows = document.querySelectorAll("tr");
rows.forEach((tr) => {
  let id = tr.getAttribute("data-id");
  if (id) {
    tr.addEventListener("click", () => {
      window.location.href = "../itemPage/index.php?id=" + id;
    });
  }
});

// slide animation
const arrowDiv = document.querySelector("#arrow");
arrowDiv.addEventListener("click", (event) => {
  let actionsDiv = document.querySelector("#actions");
  let direction = event.target.classList.contains("next") ? "prev" : "next";
  if (direction == "next") {
    actionsDiv.style.animationName = "slidein";
    console.log();
    event.target.classList.remove("prev");
    event.target.classList.add("next");
  } else {
    actionsDiv.style.animationName = "slideout";
    event.target.classList.remove("next");
    event.target.classList.add("prev");
  }
});

// checkout button functionality
const checkout = document.querySelector("#checkout");
checkout.addEventListener("click", (event) => {
  event.preventDefault();
  window.location.href = "../cart";
});
