//  Handle form dialog
document.getElementById("openDialog").addEventListener("click", function () {
  document.getElementById("dialog").showModal();
});

document.getElementById("closeDialog").addEventListener("click", function () {
  document.getElementById("dialog").close();
});

// create handler for multiple edit dialogs
document.querySelectorAll(".table-row-group").forEach((row) => {
  const cid = row.querySelector(".table-cell").textContent;
  const editButton = document.getElementById(`edit-${cid}`);
  const dialog = document.getElementById(`dialog-${cid}`);
  const closeButton = document.getElementById(`close-${cid}`);

  editButton.addEventListener("click", () => {
    dialog.classList.remove("hidden");
  });

  closeButton.addEventListener("click", () => {
    dialog.classList.add("hidden");
  });
});
