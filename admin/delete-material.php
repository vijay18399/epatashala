<?php
require_once ('connect.php');
if (isset($_GET) & !empty($_GET)) {
    $url = $_GET['id'];
    $delsql = "DELETE FROM `uploads` WHERE url='$url'";
    if (mysqli_query($conn, $delsql)) {
        header('location: index.php');
    }
}
?>