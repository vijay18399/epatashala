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

  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdn.rawgit.com/Dogfalo/materialize/fc44c862/dist/css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    <script src="https://cdn.rawgit.com/Dogfalo/materialize/fc44c862/dist/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/pinzon1992/materialize_table_pagination/f9a8478f/js/pagination.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>epatashala</title>
  </head>
  <body>
     <?php
require_once ('connect.php');
$sql = "SELECT * FROM `uploads` ";
$res = mysqli_query($conn, $sql);
?>
    <div class="row border">
      <div class="col s12 m12 l6 offset-l2 center">
      <h1>Materials</h1>
	<!--<input type="text" id="search" placeholder="Type to search..." />-->
        <table cellpadding="1" cellspacing="1" class="table table-hover" id="myTable">
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
          <?php while ($r = mysqli_fetch_assoc($res)) { ?>
            <tr>
            	<td><a href="<?php echo $r['url']; ?>">view</a></td>
                                        <td><?php echo $r['name']; ?></td>
                                        <td><?php echo $r['subjectname']; ?></td>
                                        <td><?php echo $r['category']; ?></td>
                                        <td><a href="/epatashala/admin/deleteupload.php?id=<?php echo $r['url']; ?>">Delete</a></td>
            </tr><?php
} ?>
            
            </tbody>
          </table>
          <div class="col-md-12 center text-center">
	    <span class="left" id="total_reg"></span>
            <ul class="pagination pager" id="myPager"></ul>
          </div>
      </div>
 
    </div>
    <hr><hr>
                      <?php
                        require_once("connect.php");
                        $sql = "SELECT * FROM `ideas` ";
                        $res = mysqli_query($conn, $sql);
                  ?>
                <div id="highlight" class="section scrollspy">
                    <h6 class="header center">Ideas List </h6>
                    <div class="row">
                        <div class="col s12">
                            <table class="highlight stripped" id="myTable1">
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
                                 <div class="col-md-12 center text-center">
      <span class="left" id="total_reg"></span>
            <ul class="pagination pager" id="myPager1"></ul>
          </div>
      </div>
                        </div>
                    </div>
                </div>

  </body>
  <script>
        $(document).ready(function(){
  $('#myTable').pageMe({
    pagerSelector:'#myPager',
    activeColor: 'blue',
    prevText:'previous',
    nextText:'next',
    showPrevNext:true,
    hidePageNumbers:false,
    perPage:3
  });
});
         $(document).ready(function(){
  $('#myTable4').pageMe({
    pagerSelector:'#myPager3',
    activeColor: 'blue',
    prevText:'previous',
    nextText:'next',
    showPrevNext:true,
    hidePageNumbers:false,
    perPage:3
  });
});
          $(document).ready(function(){
  $('#myTable3').pageMe({
    pagerSelector:'#myPager3',
    activeColor: 'blue',
    prevText:'previous',
    nextText:'next',
    showPrevNext:true,
    hidePageNumbers:false,
    perPage:3
  });
});
           $(document).ready(function(){
  $('#myTable2').pageMe({
    pagerSelector:'#myPager2',
    activeColor: 'blue',
    prevText:'Previous',
    nextText:'NEXT',
    showPrevNext:true,
    hidePageNumbers:false,
    perPage:3
  });
});
            $(document).ready(function(){
  $('#myTable1').pageMe({
    pagerSelector:'#myPager1',
    activeColor: 'blue',
    prevText:'Previous',
    nextText:'Next',
    showPrevNext:true,
    hidePageNumbers:false,
    perPage:1
  });
});

  </script>