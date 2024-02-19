<?php

function check_session()
{
  session_start();

  if (!isset($_SESSION['user_id'])) {
    header('Location: ../../../login');
    exit();
  }
}
