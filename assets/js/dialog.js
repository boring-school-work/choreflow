//  Handle form dialog
document.getElementById("openDialog").addEventListener("click", function () {
  document.getElementById("dialog").showModal();
});

document.getElementById("closeDialog").addEventListener("click", function () {
  document.getElementById("dialog").close();
});

// create handler for multiple edit dialogs (add chore)
document.querySelectorAll(".add-chore").forEach((row) => {
  const cid = row.querySelector(".table-cell").textContent;
  const editButton = document.getElementById(`edit-${cid}`);
  const dialog = document.getElementById(`dialog-edit-${cid}`);
  const closeButton = document.getElementById(`close-edit-${cid}`);

  editButton.addEventListener("click", () => {
    dialog.classList.remove("hidden");
  });

  closeButton.addEventListener("click", () => {
    dialog.classList.add("hidden");
  });
});

// create handler for multiple edit dialogs (assign chore)
document.querySelectorAll(".assign-chore").forEach((row) => {
  const cid = row.querySelector(".table-cell").textContent;
  const editButton = document.getElementById(`edit-assign-${cid}`);
  const dialog = document.getElementById(`dialog-assign-${cid}`);
  const closeButton = document.getElementById(`close-assign-${cid}`);

  editButton.addEventListener("click", () => {
    dialog.classList.remove("hidden");
  });

  closeButton.addEventListener("click", () => {
    dialog.classList.add("hidden");
  });
});
