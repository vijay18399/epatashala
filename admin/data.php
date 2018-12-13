 <?php
session_start();
if (!isset($_SESSION['username'])) {
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
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

  
<div class="container">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#table1">Materials</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#table3">Techbits</a>
    </li>
     <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#table4">messages</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#table5">cheat sheets</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#table6">Ideas</a>
    </li>
       <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#table7">projects</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  <div id="table1" class="container tab-pane "><br>
        <?php
require_once ('connect.php');
$sql = "SELECT * FROM `uploads` ";
$res = mysqli_query($conn, $sql);
?>
   <div class="row border">
      <div class="col s12 m12 l6 offset-l2 center">
      <h1>Materials</h1>
  
        <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
          <thead>
            <tr>
              <th>url</th>
              <th>name</th>
              <th>subject</th>
              <th>category</th>
              <th>delete</th>
            </tr>
          </thead>
          <tbody >
          <?php
while ($r = mysqli_fetch_assoc($res)) {
?>
           <tr>
              <td><a href="<?php
    echo $r['url'];
?>">view</a></td>
                                        <td><?php
    echo $r['name'];
?></td>
                                        <td><?php
    echo $r['subjectname'];
?></td>
                                        <td><?php
    echo $r['category'];
?></td>
                                        <td><a href="/epatashala/admin/deleteupload.php?id=<?php
    echo $r['url'];
?>">Delete</a></td>
            </tr><?php
}
?>
           
            </tbody>
          </table>
      </div>
 
    </div>
    <hr><hr>
    </div>
    <div id="table3" class="container tab-pane fade"><br>
                       <?php
require_once ('connect.php');
$sql = "SELECT * FROM `learn` ";
$res = mysqli_query($conn, $sql);
?>
               <div id="highlight" class="section scrollspy">
                    <h6 class="header center">Ideas List </h6>
                    <div class="row">
                        <div class="col s12">
                            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example1">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th> description</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php
while ($r = mysqli_fetch_assoc($res)) {
?>
                                   <tr>
                                        <td><?php
    echo $r['name'];
?></td>
                                        <td><?php
    echo $r['description'];
?></td>
                                        <td><a href="/epatashala/admin/deletelearn.php?id=<?php
    echo $r['id'];
?>">Delete</a></td>
                                    </tr>
                 <?php
}
?>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>
     <div id="table4" class="container tab-pane fade"><br>
      <?php
require_once ('connect.php');
$sql = "SELECT * FROM `messages` ";
$res = mysqli_query($conn, $sql);
?>
   
            <div id="highlight" class="section scrollspy">
                <h6 class="header center">Messages List </h6>
                <div class="row">
                    <div class="col s12">
                        <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example2">
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
                            <tbody> <?php
while ($r = mysqli_fetch_assoc($res)) {
?>
                               <tr>
                                       <td><?php
    echo $r['name'];
?></td>
                                       <td><?php
    echo $r['email'];
?></td>
                                       <td><?php
    echo $r['contact'];
?></td>
                                       <td><?php
    echo $r['reason'];
?></td>
                                       <td><?php
    echo $r['message'];
?></td>
                                    <td><a href="/epatashala/admin/delete-message.php?id=<?php
    echo $r['id'];
?>">Delete</a></td>
                                </tr>
                                   <?php
}
?>
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
     <div id="table5" class="container tab-pane fade"><br>
                                                   <?php
require_once ('connect.php');
$sql = "SELECT * FROM `sheets` ";
$res = mysqli_query($conn, $sql);
?>
   
                <div id="highlight" class="section scrollspy">
                    <h6 class="header center">Project List </h6>
                    <div class="row">
                        <div class="col s12">
                            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example3">
                                <thead>
                                    <tr>
                                        <th>pdf name</th>
                                        <th>Category</th>
                                        <th>image</th>
                                        <th>pdf link</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
while ($r = mysqli_fetch_assoc($res)) {
?>
                                   <tr>
                                        <td><?php
    echo $r['name'];
?></td>
                                        <td><?php
    echo $r['category'];
?></td>
                                        <td><img src="<?php
    echo $r['imgurl'];
?>" width="30px" height="30px"></td>
                                        <td><a href="<?php
    echo $r['fileurl'];
?>">View</a></td>
                                        <td><a href="/epatashala/admin/delete-sheets.php?id=<?php
    echo $r['id'];
?>">Delete</a></td>
                                    </tr>
                                    <?php
}
?>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>
    <div id="table6" class="container tab-pane fade">
    <?php
                        require_once("connect.php");
                        $sql = "SELECT * FROM `ideas` ";
                        $res = mysqli_query($conn, $sql);
                  ?>
                <div id="highlight" class="section scrollspy">
                    <h6 class="header center">Ideas List </h6>
                    <div class="row">
                        <div class="col s12">
                            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example4">
                                <thead>
                                    <tr>
                                        <th>Project name</th>
                                        <th>Description</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($r = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <td><?php echo $r['idea']; ?></td>
                                        <td><?php echo $r['description']; ?></td>
                                        <td><a href="/epatashala/admin/delete-idea.php?id=<?php echo $r['id']; ?>">Delete</a></td>
                                    </tr>
                                    <?php
} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
             <div id="table7" class="container tab-pane fade">
             <?php
require_once ('connect.php');
$sql = "SELECT * FROM `projects` ";
$res = mysqli_query($conn, $sql);
?>
            <div id="highlight" class="section scrollspy">
               <h6 class="header center">Project List </h6>
               <div class="row">
                  <div class="col s12">
                     <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example5">
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
                             <?php while ($r = mysqli_fetch_assoc($res)) { ?>
                           <tr>
                              <td><?php echo $r['name']; ?></td>
                              <td><?php echo $r['description']; ?></td>
                              <td><?php echo $r['technologies']; ?></td>
                              <td><a href="<?php echo $r['url']; ?>">View</a></td>
                              <td><img src="<?php echo $r['image']; ?>" width="30px" height="30px"></td>
                              <td><?php echo $r['submittedby']; ?></td>
                              <td><?php echo $r['rollno']; ?></td>
                               <td><?php echo $r['college']; ?></td>
                               <td><a href="/epatashala/admin/delete-project.php?id=<?php echo $r['id']; ?>">Delete</a></td>
                                          
                           </tr><?php
} ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
             </div>
    </div>
  </div>
</div>
  <script>
    $(document).ready(function() {
  //Only needed for the filename of export files.
  //Normally set in the title tag of your page.
  document.title='Simple DataTable';
  // DataTable initialisation
  $('#example1').DataTable(
    {
      "dom": '<"dt-buttons"Bf><"clear">lirtp',
      "paging": true,
      "autoWidth": true,
      "buttons": [
        'colvis',
        'copyHtml5',
        'csvHtml5',
        'excelHtml5',
        'pdfHtml5',
        'print'
      ]
    }
  );
});   
 $(document).ready(function() {
  //Only needed for the filename of export files.
  //Normally set in the title tag of your page.
  document.title='Simple DataTable';
  // DataTable initialisation
  $('#example').DataTable(
    {
      "dom": '<"dt-buttons"Bf><"clear">lirtp',
      "paging": true,
      "autoWidth": true,
      "buttons": [
        'colvis',
        'copyHtml5',
        'csvHtml5',
        'excelHtml5',
        'pdfHtml5',
        'print'
      ]
    }
  );
});   
 $(document).ready(function() {
  //Only needed for the filename of export files.
  //Normally set in the title tag of your page.
  document.title='Simple DataTable';
  // DataTable initialisation
  $('#example2').DataTable(
    {
      "dom": '<"dt-buttons"Bf><"clear">lirtp',
      "paging": true,
      "autoWidth": true,
      "buttons": [
        'colvis',
        'copyHtml5',
        'csvHtml5',
        'excelHtml5',
        'pdfHtml5',
        'print'
      ]
    }
  );
});   
 $(document).ready(function() {
  //Only needed for the filename of export files.
  //Normally set in the title tag of your page.
  document.title='Simple DataTable';
  // DataTable initialisation
  $('#example3').DataTable(
    {
      "dom": '<"dt-buttons"Bf><"clear">lirtp',
      "paging": true,
      "autoWidth": true,
      "buttons": [
        'colvis',
        'copyHtml5',
        'csvHtml5',
        'excelHtml5',
        'pdfHtml5',
        'print'
      ]
    }
  );
});   
 $(document).ready(function() {
  //Only needed for the filename of export files.
  //Normally set in the title tag of your page.
  document.title='Simple DataTable';
  // DataTable initialisation
  $('#example4').DataTable(
    {
      "dom": '<"dt-buttons"Bf><"clear">lirtp',
      "paging": true,
      "autoWidth": true,
      "buttons": [
        'colvis',
        'copyHtml5',
        'csvHtml5',
        'excelHtml5',
        'pdfHtml5',
        'print'
      ]
    }
  );
});   
 $(document).ready(function() {
  //Only needed for the filename of export files.
  //Normally set in the title tag of your page.
  document.title='Simple DataTable';
  // DataTable initialisation
  $('#example5').DataTable(
    {
      "dom": '<"dt-buttons"Bf><"clear">lirtp',
      "paging": true,
      "autoWidth": true,
      "buttons": [
        'colvis',
        'copyHtml5',
        'csvHtml5',
        'excelHtml5',
        'pdfHtml5',
        'print'
      ]
    }
  );
}); 
  </script>
</body>
</html>