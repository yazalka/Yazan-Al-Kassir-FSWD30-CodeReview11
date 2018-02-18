<?php 

session_start();

if(isset($_SESSION['name'])){   // if logged in cant go to home page :D

    header('location: office_list.php');

}


	$conn = mysqli_connect('localhost' , 'root' , '' , 'cr11_yazan_al_kassir_php_car_rental');

	    if (isset($_POST['register'])){

	      $first_name = $_POST['first_name'];
	      $last_name = $_POST['last_name'];
	      $email = $_POST['email'];
	      $password = $_POST['password'];
	      $error = false;

	    //validtion for first name

	    if (!$first_name) {

	        $error_first_name="<p>*Please enter your first name</p>";
	        $error = true;

	    }

	    //validtion for last name

	    if (!$last_name) {

	      $error_last_name="<p>*Please enter your last name</p>";
	      $error = true;

	    }

	    //validtion for password

	    if (!$password) {

	      $error_password = "<p>*Please enter your password</p>";
	      $error = true;

	     } else {

	        if (strlen($password) < 8){

	            $error_password = "<p>*Password can't be under 8 character</p>";
	            $error = true;
	        }

	    }

	    //validtion for email

	    if (!$email) {           //if email empty

	        $error_email="<p>*Please enter your email</p>";
	        $error = true;

	       } else {

	           if (!strpos($email,'@')) {         //if @ not exist // strpos() Find the position of the first occurrence of a substring in a string

	              $error_email="<p>*Please enter a valid email address</p>";
	              $error = true;  

	               } else {                //check if email user in database

	                   $check = "select * from customers where email='$email' ";

	                   $result=mysqli_query($conn , $check)or die("Failed to query database");

	                   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


	                    if($row['email']== $email) {

	                               $error_email = "<p>*The email you enterd already exist!</p>";
	                               $error = true;
	                    }

	              }

	        }



	    if (!$error) {

	       $email = trim($_POST['email']);
	       $email = strip_tags($email);
	       $email = htmlspecialchars($email);

	       $password = hash('sha256', $password);
	       $password = trim($password);
	       $password = strip_tags($password);
	       $password = htmlspecialchars($password);


     	  $sql = "insert into customers (first_name, last_name, email, password) values
                 ('$first_name','$last_name' ,'$email' ,'$password')";

	       $result = mysqli_query($conn , $sql);

	       if(!$result){

	         die ("query failed" . mysqli_errno());

	          } else {

	            $error_register ="<p>*You have been successfully registered!</p>";

	        }
	     }   
	  }



	  if (isset($_POST['signin'])) {

	    $email = trim($_POST['email']);           // escape email injection
	    $email = strip_tags($email);
	    $email = htmlspecialchars($email);

	    $password = hash('sha256', $_POST['password']);      // encrypt password and escape password injection
	    $password = trim($password);
	    $password = strip_tags($password);
	    $password = htmlspecialchars($password);

	    $check = "select * from customers where email='$email' and password='$password'";

	    $result=mysqli_query($conn , $check)or die("Failed to query databases");

	    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	         if($row['email'] === $email && $row['password'] === $password) {
	                
	                  $_SESSION['name'] = $row['first_name']." ".$row['last_name'];

	                  header('location: office_list.php');

	                 } else {

	                    $signin_error = "<p>*User does not exist.</p>";

	                 }

	  }

	    mysqli_close($conn);
	 
	?>

	<!DOCTYPE html>

  <html>

    <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Home Page</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="indexStyle.css">

      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
      <script type="text/javascript" src="script.js"></script>

    </head>
    <body>
       <!-- /header -->
        <header id="header">

          <img src="car-rent-logo.png" alt="logo">
          <h3>Car Rental</h3>

        </header>

       <div class="row" style="margin-right: 1px;">
            <div id="card" class="col-lg-7 col-md-7 col-sm-12">
              <h1>Welcome To Our Car rental</h1>
              <div id="content">Please Sign Up To View Our Content.</div>
              <div>
                <input id="signin_botton" type="submit" name="" value="Sign in">
                <input id="register_botton" type="submit" name="" value="Register">
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
               <!-- register-->
               <div id="register_form" <?php if (isset($error)): ?>
                style="display: block;"
               <?php endif ?>>
                <form action="" method="post">
                  <div>
                    <input type="text" name="first_name" placeholder="First name">
                    <?php if (isset($error_first_name)){echo $error_first_name;} ?>
                  </div>
                  <div>
                    <input type="text" name="last_name" placeholder="Last name">
                    <?php if (isset($error_last_name)){echo $error_last_name;} ?>
                  </div>
                  <div>
                    <input type="text" name="email" placeholder="Email">
                    <?php if (isset($error_email)){echo $error_email;} ?>
                  </div>
                  <div>
                    <input type="password" name="password" placeholder="Password">
                    <?php if (isset($error_password)){echo $error_password;} ?>
                  </div>
                    <input class="register_botton" type="submit" name="register">
                    <?php if (isset($error_register)){echo $error_register;} ?>
                </form>
              </div>
              <div id="signin_form" <?php if (isset($signin_error)): ?>
                  style="display: block;"
                 <?php endif ?>>
                  <!--signin -->
                  <form action="" method="post">
                    <input type="text" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <input class="signin_botton" type="submit" name="signin">
                    <?php if (isset($signin_error)){echo $signin_error;} ?>
                  </form>
          </div>
    </body>

   </html>