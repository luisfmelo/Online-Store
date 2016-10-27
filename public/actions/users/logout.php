<?php
  include_once('../../config/init.php');

  session_destroy();
  session_start();

  $_SESSION['success_messages'][] = 'Logout successful';

  header('Location: ' . $BASE_URL );
?>
