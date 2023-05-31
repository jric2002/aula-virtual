<?php
  session_start();
  if (isset($_SESSION["user"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    session_destroy();
  }
  header("Location: ./start.php");
?>