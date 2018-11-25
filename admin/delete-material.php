<?php
require_once ('connect.php');
if (isset($_GET) & !empty($_GET)) {
    $url = $_GET['id'];
    echo $url;
    $delsql = "DELETE FROM `uploads` WHERE url='$url'";
    echo $delsql;
    if (mysqli_query($conn, $delsql)) {
        header('location: index.php');
    }
}
?>