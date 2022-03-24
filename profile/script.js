const rows = document.querySelectorAll("tr");
rows.forEach((tr) => {
  let id = tr.getAttribute("data-id");
  if (id) {
    tr.addEventListener("click", () => {
      window.location.href = "../itemPage/index.php?id=" + id;
    });
  }
});
