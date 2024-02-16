<?php

session_start();

// unset the two session ids
$_SESSION['user_id'] = null;
$_SESSION['role_id'] = null;

header("Location: ./../login");
exit();
