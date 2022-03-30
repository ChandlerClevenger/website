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
