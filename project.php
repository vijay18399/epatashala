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
      <link rel="icon" href="https://image.flaticon.com/icons/svg/1184/1184976.svg" sizes="32x32">
      <!--  Android 5 Chrome Color-->
      <meta name="theme-color" content="#EE6E73">
      <!-- CSS-->
      <link href="css/prism.css" rel="stylesheet">
      <link href="css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
      <link href="css/Inconsolata.css" rel="stylesheet" type="text/css">
      <link href="css/icon.css" rel="stylesheet">
      <link href="style.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         .text-primarycolor{color:#2BBBAD;}
         .back{ background-color: #59BD8B; }
      </style>
   </head>
   <body>
      <main>
         <div class="container"><a href="#" data-target="nav-mobile" class="top-nav sidenav-trigger full hide-on-large-only"><i class="material-icons">menu</i></a></div>
         <ul id="nav-mobile" class="sidenav sidenav-fixed">
            <ul class="no-padding">
               <li class="logo "><a id="logo-container" href="/" class="brand-logo">
                  <img src="https://image.flaticon.com/icons/svg/1184/1184976.svg" height="95px" width="95px">
                  </a>
               </li>
               <li  class="version">
                  Epatashala Admin Dashboard
               </li>
            </ul>
            <li class="search">
               <div class="search-wrapper">
                  <input id="search" placeholder="Search"><i class="material-icons">search</i>
                  <div class="search-results"></div>
               </div>
            </li>
            <li class="bold"><a href="index.php" class="waves-effect waves-teal">Materials</a></li>
            <li class="bold"><a href="project.php" class="waves-effect waves-teal">Projects</a></li>
            <li class="bold"><a href="idea.php" class="waves-effect waves-teal">Ideas</a></li>
            <li class="bold"><a href="know.php" class="waves-effect waves-teal">Learn New Things</a></li>
            <li class="bold"><a href="sheets.php" class="waves-effect waves-teal">Cheat Sheets</a></li>
            <li class="bold"><a href="meassages.php" class="waves-effect waves-teal">Messages</a></li>
            <li class="bold"><a href="links.php" class="waves-effect waves-teal">Links</a></li>
            <li class="bold"><a href="index.php?logout='1'" style="color: red;">logout</a></li>
         </ul>
      </main>
      <!-- Sidebar BSA-->
      <script src="//m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
      <div class="bsa-cpc"></div>
      <script>
         (function(){
           if(typeof _bsa !== 'undefined' && _bsa) {
           _bsa.init('default', 'CKYD55QM', 'placement:materializecsscom', {
             target: '.bsa-cpc',
             align: 'horizontal',
             disable_css: 'true'
           });
             }
         })();
        
      </script>
      <main>
         <div class="card-panel center">
            <span class="green-text text-darken-2">Add Project</span>
         </div>
         <div class="container ">
            <div class="row hoverable">
               <div class="col l8 s12 offset-l2">
                  <div class="row ">
                     <?php
if (isset($_POST['name'])& !empty($_POST) ) {
    
    
    $name = $_POST['name'];
   // $filename = $_FILES['file']['name'];
	$description = $_POST['description'];
    $technologies = $_POST['technologies'];
    $url          = $_POST['url'];
    $imgurl          = $_POST['imgurl'];
    $submittedby  = $_POST['submittedby'];
    $rollno       = $_POST['rollno'];
    $college      = $_POST['college'];
    
    //$location = "images/";
    //$tmp_name = $_FILES['file']['tmp_name'];
   
   // if(move_uploaded_file($tmp_name, $location.$name)) 
    require_once('connect.php');
    $sql = "INSERT INTO `projects`  VALUES ('','$name','$description','$technologies','$url','$imgurl','$submittedby','$rollno','$college')";
       
    
    
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
    
//
}

?>
                    <form  method="post">
                        <div class="row">
                           <div class="input-field col s12">
                              <input type="text" name="name" >
                              <label >Project Name</label>
                           </div>
                           <div class="input-field col s12">
                              <input type="text" name="description">
                              <label >Description</label>
                           </div>
                           <div class="input-field col s12">
                              <input type="text" name="technologies">
                              <label >Techologies Used</label>
                           </div>
                           <div class="input-field col s12">
                              <input type="text" name="url">
                              <label for="autocomplete-input">Any Url to Share</label>
                           </div>
                            <div class="input-field col s12">
                              <input type="text" name="imgurl">
                              <label for="autocomplete-input">image url to Display</label>
                           </div>
                           <div class="input-field col s12">
                              <input type="text" name="submittedby" >
                              <label >Submitted By</label>
                           </div>
                           <div class="input-field col s12">
                              <input type="text" name="rollno" >
                              <label >Roll No</label>
                           </div>
                           <div class="input-field col s12">
                              <input type="text" name="college">
                              <label >College</label>
                           </div>
                           <div class=" center input-field col s12">
                              <input type="submit" class="btn">
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div>
                             <?php
require_once('connect.php'); 
$sql = "SELECT * FROM `projects` " ;
$res = mysqli_query($conn, $sql);
?>
            <div id="highlight" class="section scrollspy">
               <h6 class="header center">Project List </h6>
               <div class="row">
                  <div class="col s12">
                     <table class="highlight stripped">
                        <thead>
                           <tr>
                              <th>Project name</th>
                              <th>Description</th>
                              <th>Technology Tags</th>
                              <th>Links</th>
                              <th>image</th>
                              <th>submitted by</th>
                              <th>roll no</th>
                              <th>college</th>
                               <th>Delete</th>
                           </tr>
                        </thead>
                        <tbody>
                             <?php     while ($r = mysqli_fetch_assoc($res)) { ?>
                           <tr>
                              <td><?php echo $r['name']; ?></td>
                              <td><?php echo $r['description']; ?></td>
                              <td><?php echo $r['technologies']; ?></td>
                              <td><?php echo $r['url']; ?></td>
                              <td><?php echo $r['image']; ?></td>
                              <td><?php echo $r['submittedby']; ?></td>
                              <td><?php echo $r['rollno']; ?></td>
                               <td><?php echo $r['college']; ?></td>
                               <td><a href="/epatashala/deleteproject.php?id=<?php echo $r['id']; ?>">Delete</a></td>
                             							
                           </tr><?php } ?>
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
                        <!--  <a class="grey-text text-darken-1 right" href="https://github.com/Dogfalo/materialize/blob/master/LICENSE">MIT License</a>--->
                     </div>
                  </div>
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
      <script>
         $(document).ready(function(){
         $('input.autocomplete').autocomplete({
         data: {
         "Environmental Studies": null,
         "Computer Programming": null,
         "Physics": 'https://placehold.it/250x250'
         },
         });
         });
        
      </script>
      <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
         <a class="btn-floating btn-large #696B77">
         <i class="material-icons right">view_agenda</i>
         </a>
         <ul>
            <li><a class="btn-floating #ffb300 amber darken-1" href="projects.html"><i class="material-icons right">screen_share</i></a></li>
            <li><a class="btn-floating blue darken-1" href="telegram.html"><i class="material-icons right">send</i></a></li>
            <li><a class="btn-floating #1de9b6 teal accent-3" href="pdfs.html"><i class="material-icons right">library_books</i></a></li>
            <li><a class="btn-floating green darken-1" href="whatsapp.html"><i class="fa fa-whatsapp" style="font-size:48px;"></i></a></li>
         </ul>
      </div>
   </body>
</html>