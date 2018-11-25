<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="description" content="Materialize is a modern responsive CSS framework based on Material Design by Google. ">
        <title>epatashala</title>
        <!-- Favicons-->
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <link rel="icon" href="images/logo.png" sizes="32x32">
        <!--  Android 5 Chrome Color-->
        <meta name="theme-color" content="#EE6E73">
        <!-- CSS-->
        <link href="css/prism.css" rel="stylesheet">
        <link href="css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="css/Inconsolata.css" rel="stylesheet" type="text/css">
        <link href="css/icon.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
                 <main>
            <div class="container"><a href="#" data-target="nav-mobile" class="top-nav sidenav-trigger full hide-on-large-only"><i class="material-icons">menu</i></a></div>
            <ul id="nav-mobile" class="sidenav sidenav-fixed">
                <ul class="no-padding">
                    <li class="logo "><a id="logo-container" href="/" class="brand-logo">
                        <img src="images/logo.png" height="75px" width="75px">
                        </a>
                    </li>
                    <li  class="version">
                        Epatashala
                    </li>
                </ul>
        <li class="search">
                <h6 class="center text-white back menu">Menu</h6>
                </li>
                <li class="bold"><a href="materials.php" class="waves-effect waves-green">Btech Materials</a></li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold active">
                            <a class="collapsible-header waves-effect waves-green">CSE Special</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="projects.php">Project Showcase</a></li>
                                    <li><a href="ideas.php">Project Ideas</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="bold"><a href="cheatsheets.php" class="waves-effect waves-green">Cheatsheets</a></li>
                <li class="bold"><a href="collaboration.php" class="waves-effect waves-green">Collaboration</a></li>
                <li class="bold"><a href="tech-bits.php" class="waves-effect waves-green">TechBits</a></li>
                <li class="bold"><a href="contact.php" class="waves-effect waves-green">Contact Us</a></li>

            </ul>
        </main>

        <main>
            <div class="row  card hoverable center">
                <div class="col s12 m10 offset-m1">
                    <h1 class="header  text-primarycolor ">Epatashala</h1>
                </div>
            </div>
            <?php
require_once ('connect.php');
$sql = "SELECT * FROM `ideas` ";
$res = mysqli_query($conn, $sql);
?>
            <div class="container">
                <div class="row">
                    <h4 class="header center ">Ideas</h4>
                     <?php while ($r = mysqli_fetch_assoc($res)) { ?>
                    <div class="col l6 s12 m6">
                        <h6 class="header center"><?php echo $r['idea']; ?></h6>
                        <div class="card-panel "> <span ><?php echo $r['description']; ?></span>
                        </div>
                    </div>
                      <?php
} ?>
                    
                </div>
            </div>
        </main>
               <footer class="page-footer docs-footer">
            <div class="container">
                <div class="row" style="margin-bottom: 0;">
                    <div class="col s7 m10 offset-m1">
                        <div class="row">
                            <div class="footer-copyright">
                                © 2019-
                                <noscript>2020</noscript>
                                <script type="text/javascript">document.write(new Date().getFullYear());</script> epatashala, All rights reserved.

                                
                            </div>

                        </div>
                    </div>
                    <div class="col s5 m1">
                    <iframe src="https://www.powr.io/plugins/hit-counter/view?unique_label=899ff642_1543115625&external_type=material" width="100%" height="600" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </footer>
        <!--  Scripts-->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script>if (!window.jQuery) { document.write('<script src="bin/jquery-3.2.1.min.js"><\/script>'); }</script>
        <script src="js/jquery.timeago.min.js"></script>
        <script src="js/prism.js"></script>
        <script src="js/lunr.min.js"></script>
        <script src="js/search.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large #696B77">
            <i class="material-icons right">view_agenda</i>
            </a>
            <ul>
                <li><a class="btn-floating #512da8 deep-purple darken-2" href="materials.php"><i class="material-icons right">school</i></a></li>
                <li><a class="btn-floating blue darken-1" href="contact.php"><i class="material-icons right">message</i></a></li>
                <li><a class="btn-floating #c6ff00 lime accent-3" href="ideas.php"><i class="material-icons right">lightbulb_outline</i></a></li>
                <li><a class="btn-floating green darken-1" href="collaboration.php"><i class="material-icons right">assignment_ind</i></a></li>
            </ul>
        </div>
    </body>
</html>