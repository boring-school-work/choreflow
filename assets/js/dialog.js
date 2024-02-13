//  Handle form dialog
document.getElementById("openDialog").addEventListener("click", function () {
  document.getElementById("dialog").showModal();
});

document.getElementById("closeDialog").addEventListener("click", function () {
  document.getElementById("dialog").close();
});
