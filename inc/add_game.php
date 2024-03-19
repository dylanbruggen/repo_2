<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ 
    $_SESSION['shoppingcart_item' . count($_SESSION) - 2] = $_GET['id'];
    header('location:  ../index.php');
    exit;
} else {
    echo 'das nie de bedoeling heeeee';
}
?>