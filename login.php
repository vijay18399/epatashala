<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <style>
  button{
    background-color: #59BD8B;
  }
  </style>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="container">    
        
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="row">                
            <div class="iconmelon">
          <img src='https://image.flaticon.com/icons/svg/1184/1184976.svg' height='175px' width='175px'>
            </div>
        </div>
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Epatashala.com</div>
            </div>     

            <div class="panel-body" >

                <form method="post" action="login.php">
                   <?php include('errors.php'); ?>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="user" type="text" class="form-control" name="username" value="" placeholder="User">                                        
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>                                                                  

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls ">
                        <br>
                          <center>  <button type="submit" class="btn" name="login_user"  class="btn btn-success pull-right"><i class="glyphicon glyphicon-log-in"></i> Log in</button>  </center>                        
                        </div>
                    </div>

                </form>     

            </div>                     
        </div>  
    </div>
</div>

</body>
</html>