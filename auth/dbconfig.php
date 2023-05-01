<?php

try {
    $con = new PDO('mysql:host=localhost;dbname=bennyoop', 'root', '', array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    echo $e->getMessage();
}

include_once 'auth/Auth.php';

$user = new Auth($con);