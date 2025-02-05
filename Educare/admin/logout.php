<?php
// STARTING AND DESTROYING SESSION
session_start();

session_destroy();

// REDIRECTING
header("Location: ../html/login.php");
exit;
