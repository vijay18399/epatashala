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
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
        <main>
            <div class="section no-pad-bot" id="index-banner">
            <div class="card-panel center">
                <span class="green-text text-darken-2">Add Mateials</span>
                </div>
            <div class="container ">
                <div class="row hoverable">
                    <div class="col l8 s12 offset-l2">
                        <div class="row ">
                            <?php
if (isset($_POST['name']) & !empty($_POST)) {
    $subjectname = $_POST['subjectname'];
    $name = $_POST['name'];
    $url = $_POST['url'];
    $imgurl = $_POST['imgurl'];
    $category = $_POST['category'];
    $tags = $_POST['tags'];
    require_once ('connect.php');
    $sql = "INSERT INTO `uploads`  VALUES ('$url','$subjectname','$name','$category','$tags','$imgurl')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo ' <div class="card-panel">
    <span class="blue-text text-darken-2">Successfully Added</span>
  </div>';
    } else {
        echo '<div class="card-panel">
    <span class="red-text text-darken-2">Sorry Something Went Wrong</span>
  </div>';
    }
}
?>
                            <form method="post" action='index.php'>
                                <div class="input-field col s12">
                                    <input type="text" id="autocomplete-input" name='subjectname' class="autocomplete">
                                    <label for="autocomplete-input">Subject Name</label>
                                </div>
                                   <div class="input-field col s12">
                                
                                    <input type="text" name="name" >
                                    <label >Material name</label>
                          
                                </div>
                                <div class="input-field col s12">
                                    <select name="category">
                                        <option value="" disabled selected>Category</option>
                                        
                                        <option value="CSE">CSE</option>
                                        <option value="IT">IT</option>
                                        <option value="EEE">EEE</option>
                                        <option value="ECE">ECE</option>
                                        <option value="MECH">MECH</option>
                                        <option value="CIVIL">CIVIL </option>
                                        <option value="Other">Other </option>
                                    </select>
                                </div>
                                <div class="input-field col s12">
                               
                                  <input  type='text' name="tags">
                                   <label >tags</label>
                                </div>
                                <div class="input-field col s12">
                                
                                    <input type="text" name="url" >
                                    <label >URL</label>
                          
                                </div>
                                 <div class="input-field col s12">
                                
                                    <input type="text" name="imgurl" >
                                    <label >Image URL</label>
                          
                                </div>
                                <div class=" center input-field col s12">
                                    <input type="submit" href="#modal1" class="btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <?php
require_once ('connect.php');
$sql = "SELECT * FROM `uploads` ";
$res = mysqli_query($conn, $sql);
?>
                <div id="highlight" class="section scrollspy">
                    <h6 class="header center">Materials List </h6>
                    <div class="row">
                        <div class="col s12">

                            <table class="highlight stripped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Url</th>
                                       
                                        <th>name</th>
                                         <th>Subject</th>
                                        <th>category</th>
                                     <th>Image Url</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($r = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <td><a href="<?php echo $r['url']; ?>">view</a></td>
                                        <td><?php echo $r['name']; ?></td>
                                        <td><?php echo $r['subjectname']; ?></td>
                                        <td><?php echo $r['category']; ?></td>
                                        <td><img src="<?php echo $r['imgurl']; ?>" height="30px" width="30px"></td>
                                        <td><a href="/epatashala/admin/delete-material.php?id=<?php echo $r['url']; ?>">Delete</a></td>
                                    </tr><?php
} ?>
                                </tbody>
                            </table>
                        
       
                        </div>
       
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
        <script src="../js/init.js"></script>
        <script>
            $(document).ready(function(){
            $('input.autocomplete').autocomplete({
            data: {
            "English – I ": null,
            "Mathematics - I ": null,
            "Mathematics – II (Mathematical Methods)": null,
            "Applied Physics ": null,
            "Computer Programming ": null,
            "Engineering Drawing ": null,
            "English – II": null,
            "Mathematics - III ": null,
            "Applied Chemistry ": null,
            "Object Oriented Programming through C++":null,
            "Environmental Studies":null,
            "Engineering Mechanics":null,
            "Statistics with R Programming":null,
            "Mathematical Foundations of Computer Science":null,
            "Digital Logic Design":null,
            "Python Programming ":null,
            "Data Structures through C++":null,
            "Computer Graphics":null,
            "Software Engineering":null,
            "Java Programming ":null,
            "Advanced Data Structures ":null,
            "Computer Organization ":null,
            "Formal Languages and Automata Theory":null,
            "Principles of Programming Languages":null,
            "Compiler Design ":null,
            "Unix Programming":null,
            "Object Oriented Analysis and Design using UML ":null,
            "Database Management Systems":null,
            "Operating Systems ":null,
            "Unified Modeling Lab ":null,
            "Computer Networks":null,
            "Data Warehousing and Mining ":null,
            "Design and Analysis of Algorithms ":null,
            "Software Testing Methodologies":null,
            "Professional Ethics & Human Values":null,
            "Artificial Intelligence":null,
            "Internet of Things ":null,
            "Cyber Security ":null,
            "Digital Signal Processing":null,
            "Embbeded Systems":null,
            "Robotics ":null,
            "IPR & Patents":null,
            "Cryptography and Network Security ":null,
            "Software Architecture & Design Patterns":null,

            "Web Technologies":null,
            "Managerial Economics and Financial Analysis ":null,
            "Big Data Analytics":null,
            "Information Retrieval Systems ":null,
            "Mobile Computing ":null,
            "Cloud Computing ":null,
            "Software Project Management":null,
            "Scripting Languages":null,
            "Distributed Systems":null,
            "Management Science":null,
            "Machine Learning ":null,
            "Concurrent and Parallel Programming ":null,
            "Artificial Neural Networks":null,
            "Operations Research ":null
            },
            });
            });
            $(document).ready(function(){
            $('#myTable').pageMe({
              pagerSelector:'#myPager',
              activeColor: 'blue',
              prevText:'Anterior',
              nextText:'Siguiente',
              showPrevNext:true,
              hidePageNumbers:false,
              perPage:1
            });
          });

            
        </script>

    </body>
</html>
