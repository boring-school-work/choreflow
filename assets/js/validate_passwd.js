/**
 * Checks if the password matches the confirm password
 *
 * @returns {boolean} true if the password matches the confirm password, false otherwise
 */
function validate_passwd() {
  var passwd0 = document.getElementById("passwd0").value;
  var passwd = document.getElementById("passwd").value;
  var msg = document.getElementById("error-msg");

  console.log(passwd0, passwd);

  if (passwd0 !== passwd) {
    document
      .getElementById("passwd")
      .setCustomValidity("Passwords do not match");

    msg.innerHTML = "Passwords do not match";
    return false;
  } else {
    document.getElementById("passwd").setCustomValidity("");
    msg.innerHTML = "";
    return true;
  }
}

/**
 * Prevents form submission if the password does not match the confirm password
 *
 * @returns {boolean} true if the password matches the confirm password, false otherwise
 */
function check() {
  return validate_passwd();
}
