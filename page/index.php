<?php 
session_start();

$_SESSION['fail_message'] = "Invalid Action"; 
header("Location:/");