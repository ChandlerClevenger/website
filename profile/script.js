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
        tableBoundry.right - imageBoundry.right + "px"
      );
    }
    event.preventDefault();
  });
});

imgs.forEach((image) => {
  image.addEventListener("mouseleave", (event) => {
    root.style.setProperty("--translate-x", "0px");
    root.style.setProperty("--translate-y", "0px");
  });
});
