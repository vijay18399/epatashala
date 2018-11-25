<?php
require_once ('connect.php');
if (isset($_GET) & !empty($_GET)) {
    $id = $_GET['id'];
    echo $id;
    $delsql = "DELETE FROM `ideas` WHERE id='$id'";
    if (mysqli_query($conn, $delsql)) {
        header('location: add-idea.php');
    }
}
?>