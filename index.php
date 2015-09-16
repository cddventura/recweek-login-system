<?php
  session_start();

  if(isset($_SESSION['valid_user']))
  {
    header('Location: login.php');
  }
  else
  {
    if (isset($_POST['login']) && isset($_POST['password']))
    {
      $login = $_POST['login'];
      $password = $_POST['password'];

      $db = new mysqli('localhost', 'root', 'root', 'Recweek');

      if(mysqli_connect_errno())
      {
        echo 'Error: Could not connect to database.  Please try again later.';
        exit;
      }

      $query = 'select * from user '."where username='$login' "." and password=sha1('$password')";
      $result = $db->query($query);

      if ($result->num_rows)
      {
        $_SESSION['valid_user'] = $login;
        session_set_cookie_params(0);
        header("Location: login.php");
      }
      else
      {
        echo '<script> alert("Invalid credentials!"); </script>';
        exit;
      }
      $result->free();
      $db->close();
    }
  }
?>
