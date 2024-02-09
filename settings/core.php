<?php
session_start();

function check_session()
{
  // check if the user is logged in
  if (!isset($_SESSION['id'])) {
    header('Location: ../login/');
    die("You need to sign in first!");
  }
}
