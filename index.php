<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration System Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6" id="loginarea">
          <img src="img/misa.png" id="misalogo"/>

          <form class="form-horizontal formz" role="form" method="post">
            <div class="form-group">               
              <div class="col-md-8 col-md-offset-2">
              <input type="text" class="form-control col-md-2" id="inputLogin" name="login" required="true">
              <p class="loginp">USERNAME</p>
              </div>
            </div>   

            <div class="form-group">               
              <div class="col-md-8 col-md-offset-2">
              <input type="password" class="form-control col-md-2" id="inputPassword" name="password" required="true">
              <p class="loginp">PASSWORD</p>
              </div>
            </div>           
            
            <div class="form-group">
              <div class="col-sm-2 col-md-2 col-lg-2"></div>
              <button type="submit" class="btn btn-default col-xs-12 col-sm-8 col-md-8 col-lg-8 input-lg" id="loginButton" name="loginbutton">LOGIN</button>
              <div class="col-sm-2 col-md-2 col-lg-2">
            </div>            

            
         </form> 
        

        </div>
        <div class="row bottom">
            <img src="img/eservs.png" alt="eServices logo" id="eservslogo" align="middle">
            <h6 class="text-center">Ateneo Management Information Systems Association. All Rights Reserved.</h6>
      </div> 
      </div>  
          
    </div>

    <?php
      if ($_POST) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        $hash = "root";
        if (($password == "root") && ($login == "root")) {
          header("Location: login.php");
        }
        else {
          echo '<script> alert("Invalid credentials!"); </script>';
          exit;
        }   
      }
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>