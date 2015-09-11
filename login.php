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
    <?php
      session_start();

      if(isset($_SESSION['valid_user']))
      {

        /*
          to design, use the html code
          inside the echo statement. Be careful
          not to mess things up.
        */
        echo '
          <div id="wrapper" class="container">

              <div id="register" class="col-md-offset-5 col-md-7">
                <h1 id="registration">REGISTRATION</h1>
                <form id="form" action="submit.php" method="post" class="form-horizontal">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label for="id_number">ID Number</label>
                    </div>
                    <div class="col-md-9">
                      <input type="number" class="form-control" id="id_number" name="id_number" min="110000" max="160000" autocomplete="off" placeholder="101010" required>
                      <p id="idnumber_warning" class="warning">MISSING</p>
                    </div>
                  </div>
		   <div class="form-group">
                    <div class="col-md-2">
                      <label for="full_name">Full Name</label>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="full_name" name="full_name" maxlength="64" autocomplete="off" placeholder="Loyola, Ignacio A." required>
                      <p id="name_warning" class="warning">MISSING</p>
                    </div>


                    <div class="col-md-2">
                      <label for="nickname">Nickname</label>
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="form-control" id="nickname" name="nickname" maxlength="64" autocomplete="off" placeholder="Iggy" required>
                      <p id="nickname_warning" class="warning">MISSING</p>
                    </div>
		  </div>


                  <div class="form-group">
                    <div class="col-md-2">
                      <label for="year">Year</label>
                    </div>
                    <div class="col-md-1">
                      <select class = "dropdown" name="year" id="year">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label for="course">Course</label>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="course" name="course" maxlength="64" autocomplete="off" placeholder="BS MIS" required>
                      <p id="course_warning" class="warning">MISSING</p>
                    </div>

                    <div class="form-group">
                      <div class="col-md-2">
                        <label for="school">School</label>
                      </div>
                      <div class="col-md-2">
                        <select class="dropdown" name="school">
                          <option value="SOSE">SOSE</option>
                          <option value="SOSS">SOSS</option>
                          <option value="SOM">SOM</option>
                          <option value="SOH">SOH</option>
                        </select>
                      </div>
                    </div>
</div>



                    <div class="form-group">
                      <div class="col-md-2">
                        <label for="cellphone_number">Cellphone Number</label>
                      </div>
                      <div class="col-md-10">
                        <input type="number" class="form-control" id="cellphone_number" name="cellphone_number" min="09000000000" max="09999999999" autocomplete="off" placeholder="09171234123" required>
                        <p id="cell_warning" class="warning">MISSING</p>
                      </div>
                    </div>

                  <div class="form-group">
                    <div class="col-md-2">
                      <label for="email">Email</label>
                    </div>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="email" name="email" maxlength="64" autocomplete="off" placeholder="tedmosby@gmail.com" required>
                      <p id="email_warning" class="warning">MISSING</p>
                    </div>
                  </div>
                  <div class="form-inline col-md-offset-4">
		   <div class="form-group">
                    <div class="col-md-1">
                      <input type="radio" name="memStat" value="old">
                    </div>
                    <div class="col-md-4">
                      <label for="old">Old Member</label>
                    </div>
                    <div class="col-md-1">
                      <input type="radio" name="memStat" value="new">
                    </div>
                    <div class="col-md-4">
                      <label for="new">New Member</label>
                    </div>
		    <p id="member_warning" class="warning">MISSING</p>
		   </div>

                   <div class="form-group">

                    <div class="col-md-1">
                      <input type="radio" name="paid" value="yes">
                    </div>
                    <div class="col-md-4">
                      <label for="yes">Paid</label>
                    </div>
                    <div class="col-md-1">
                      <input type="radio" name="paid" value="n">
                    </div>
                    <div class="col-md-4">
                      <label for="no">Hasnt Paid</label>
                    </div>
<p id="paid_warning" class="warning">MISSING</p>
		   </div>
                  </div>

                  <div class="col-md-12">
                    <button type="submit" id="submit" class="btn">Submit!</button>
                  </div>
                </form>
                <div class="col-md-12">

                </div>
              </div>

          </div>
          	        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="accepted">
  			<div class="modal-dialog modal-lg">
    				<div class="modal-content">
     				 <h2>Welcome to MISA!</h2>
				 <h3 id="member_nickname"></h3>
				 <h3 id="member_year"></h3>
				<div class="modal-footer">
        			 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      				</div>
    				</div>
  			</div>
		</div>
<a href="logout.php">Log out</a>
        ';
      }
      else
      {
        header("Location: index.php");
      }
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/application.js"></script>
  </body>
</html>
