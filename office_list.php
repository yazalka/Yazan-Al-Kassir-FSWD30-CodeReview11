<?php 
	session_start();

	if(!isset($_SESSION['name'])) {   // if not logged in go to home page

    header('location: index.php');

	}
	
?>
   
	<!DOCTYPE html>
		<html>
			<head>
				<title>Office list</title>
				<meta charset="utf-8">
     			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
				<link rel="stylesheet" type="text/css" href="office_listStyle.css">
				<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		  		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
			</head>
			<body>
				 <header id="header">
					<img id="logo" src="car-rent-logo.png" alt="logo">
					<h3>Car Rental</h3>


					<div class="container-fluid row">
			    		<h4><?= $_SESSION['name'] .'&nbsp;' ?></h4>
						<a id="logout-btn" href="logout.php">| Logout</a>
					</div>
				</header>


<?php 


	$conn = mysqli_connect('localhost' , 'root' , '' , 'cr11_yazan_al_kassir_php_car_rental');
	$sql = "select * from offices ";
	$result = mysqli_query($conn, $sql) or die("failed to query databases");
	
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

?>
	<hr>
	<div class="row">
	<h1 class="col-lg-6 col-md-8 col-sm-8 col-9"> <?= $row['name'] ?> at <?= $row["address"] ?> </h1>
	<form action='cars_list.php' method='post'>
			<input id="visit" type='hidden' name='id' value="<?= $row['office_id'] ?>"> <!-- so we get office_id and office name in cars_list.php --> 
			<input id="visit" type='hidden' name='name' value="<?=$row['name'] ?>">
			<input id="visit" type='submit' name='officevisit' value='Visit Office'>
	</form>
	</div>


<?php  

	}

	mysqli_close($conn);

?>
<hr>
			<div class="col-lg-3" id="allcarsalign">
				<form action="cars_list.php" method="post" accept-charset="utf-8">
					<input id="allcars" type="submit" name="" value="Show all cars">
				</form>
			</div>
		</body>
	</html>
