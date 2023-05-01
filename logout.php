<?php  

// Lampirkan dbconfig  
require_once "auth/dbconfig.php";  

// Logout! hapus session user  
$user->logout();  

// Redirect ke login  
header('location: login.php');