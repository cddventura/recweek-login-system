<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Misa Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="wrapper" class="container">
      <div class="row">
        <div id="register" class="col-md-offset-7 col-md-4">
          <h1 id="registration">Registration</h1>
          <form id="form" action="submit.php" method="post">
            <div class="form-group">
              <label for="id_number">ID Number</label>
              <input type="number" class="form-control" id="id_number" name="id_number" min="110000" max="160000" autocomplete="off" placeholder="101010" required>
              <p id="idnumber_warning" class="warning">Please input a valid ID Number.</p>
            </div>
            <div class="form-group">
              <label for="full_name">Full Name</label>
              <input type="text" class="form-control" id="full_name" name="full_name" maxlength="64" autocomplete="off" placeholder="Ted Mosby" required>
              <p id="name_warning" class="warning">Please input a name.</p>
            </div>
            <div class="form-group">
              <label for="cellphone_number">Cellphone Number</label>
              <input type="number" class="form-control" id="cellphone_number" name="cellphone_number" min="09000000000" max="09999999999" autocomplete="off" placeholder="09171234123" required>
              <p id="cell_warning" class="warning">Please input a valid cellphone number.</p>
            </div>

            <button type="submit" id="submit" class="btn">Challenge Accepted!</button>
          </form>
        </div>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/application.js"></script>
  </body>
</html>