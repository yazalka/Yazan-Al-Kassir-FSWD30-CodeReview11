<?php 
	session_start();

	if(!isset($_SESSION['name'])){ 		 // if not logged in go to home page.

    	header('location: index.php');
	}

	if(isset($_POST['officevisit'])) {    // if i press on visit then $office_name & $office_id exist.

		$office_name = $_POST['name'];
		$office_id = $_POST['id'];
	}
?>

<!DOCTYPE html>
	<html>
		<head>
			<title>Car list</title>
			<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="cars_listStyle.css">
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

<?php if(isset($office_name)) { ?>    <!-- if office name exist the show office name and the cars in the office --> 

			<h1>Here you can find our cars in <?= $office_name ?></h1>

				<table>
		
					<tr>
						<th>Car Model</th>
						<th>Car ID</th>
						<th>Car Status</th>
					</tr>
		
<?php } else { ?>     <!-- if not show all cars --> 

		 	<h1>Here is a list of all our cars</h1>

		 		<table>
		
					<tr>
						<th>Car Model</th>
						<th>Car ID</th>

					</tr>

<?php } ?>

<?php  
	 

	$conn = mysqli_connect('localhost' , 'root' , '' , 'cr11_yazan_al_kassir_php_car_rental');

		if(!isset($office_id)) {     // if $office_id does not exist then i will present all cars.
		$sql = "select * from cars";
		$result = mysqli_query($conn, $sql) or die("failed to query databases");
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

?>

					<tr>
						<td><?= $row['car_type']; ?></td>
						<td><?= $row['car_id']; ?></td>

					</tr>	
<?php } ?>
		</table>
<?php 

		} else {    // if it does !!  i will present the office and the cars in the office.
	

			$sql = "select * from cars where fk_office_id=".$office_id."";
			$result = mysqli_query($conn, $sql) or die("failed to query databases");
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

?>
		
					<tr>
						<td><?= $row['car_type']; ?></td>
						<td><?= $row['car_id']; ?></td>
						<td><?= $row['status']; ?></td>
					</tr>	


<?php  
		}
	}

	mysqli_close($conn);

?>
			</table>
				<div class="col-lg-7 col-md-7 col-sm-8 col-9">
					<form action="cars_locations.php" method="post" accept-charset="utf-8">
						<input type="submit" name="" value="Cars Locations">
					</form>
				</div>
			</body>
	</html>


