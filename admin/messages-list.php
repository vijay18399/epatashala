<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="description" content="Materialize is a modern responsive CSS framework based on Material Design by Google. ">
        <title>Admin Panel</title>
        <!-- Favicons-->
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <link rel="icon" href="../images/logo.png" sizes="32x32">
        <!--  Android 5 Chrome Color-->
        <meta name="theme-color" content="#EE6E73">
        <!-- CSS-->
        <link href="../css/prism.css" rel="stylesheet">
        <link href="../css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="../css/Inconsolata.css" rel="stylesheet" type="text/css">
        <link href="../css/icon.css" rel="stylesheet">
        <link href="../style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
                   <main>
            <div class="container"><a href="#" data-target="nav-mobile" class="top-nav sidenav-trigger full hide-on-large-only"><i class="material-icons">menu</i></a></div>
            <ul id="nav-mobile" class="sidenav sidenav-fixed">
                <ul class="no-padding">
                    <li class="logo "><a id="logo-container" href="/" class="brand-logo">
                        <img src="../images/logo.png" height="75px" width="75px">
                        </a>
                    </li>
                    <li  class="version">
                        Epatashala
                    </li>
                </ul>
        <li class="search">
                <h6 class="center text-white back menu">Menu</h6>
                </li>
                <li class="bold"><a href="index.php" class="waves-effect waves-teal">Materials</a></li>
                <li class="bold"><a href="add-project.php" class="waves-effect waves-teal">Projects</a></li>
                <li class="bold"><a href="add-idea.php" class="waves-effect waves-teal">Ideas</a></li>
                <li class="bold"><a href="tech-bit.php" class="waves-effect waves-teal">Learn New Things</a></li>
                <li class="bold"><a href="add-sheets.php" class="waves-effect waves-teal">Cheat Sheets</a></li>
                <li class="bold"><a href="messages-list.php" class="waves-effect waves-teal">Messages</a></li>
                
                 <li class="bold"><a href="index.php?logout='1'" class="center logout text-white #00695c teal " ><b>logout</b></a></li>

            </ul>
        </main>
        <main><?php
require_once ('connect.php');
$sql = "SELECT * FROM `messages` ";
$res = mysqli_query($conn, $sql);
?>
    
            <div id="highlight" class="section scrollspy">
                <h6 class="header center">Messages List </h6>
                <div class="row">
                    <div class="col s12">
                        <table class="highlight stripped">
                            <thead>
                                <tr>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>reason</th>
                                    <th>message</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody> <?php while ($r = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                       <td><?php echo $r['name']; ?></td>
                                       <td><?php echo $r['email']; ?></td>
                                       <td><?php echo $r['contact']; ?></td>
                                       <td><?php echo $r['reason']; ?></td>
                                       <td><?php echo $r['message']; ?></td>
                                    <td><a href="/epatashala/admin/delete-message.php?id=<?php echo $r['id']; ?>">Delete</a></td>
                                </tr>
                                   <?php
} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="page-footer docs-footer">
            <div class="container">
                <div class="row" style="margin-bottom: 0;">
                    <div class="col s12 m10 offset-m1">
                        <div class="row">
                            <div class="footer-copyright">
                                © 2019-
                                <noscript>2020</noscript>
                                <script type="text/javascript">document.write(new Date().getFullYear());</script> epatashala, All rights reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--  Scripts-->
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script>if (!window.jQuery) { document.write('<script src="../bin/jquery-3.2.1.min.js"><\/script>'); }</script>
        <script src="../js/jquery.timeago.min.js"></script>
        <script src="../js/prism.js"></script>
        <script src="../js/lunr.min.js"></script>
        <script src="../js/search.js"></script>
        <script src="../js/materialize.js"></script>
        <script src="../js/init.js"></script>../
    </body>
</html>