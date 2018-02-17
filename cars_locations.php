<?php 
	session_start();
	if(!isset($_SESSION['name'])){   // if not logged in go to home page

    header('location: index.php');

	}	
 ?>
<!DOCTYPE html>
		<html>
			<head>
				<title>Car list</title>
				<meta charset="utf-8">
     			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
				<link rel="stylesheet" type="text/css" href="cars_locationStyle.css">
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

			<table>
		
					<tr>
						<th>Car Model</th>
						<th>Car Location</th>
						<th>Car Status</th>
					</tr>
		
<?php
		$conn = mysqli_connect('localhost' , 'root' , '' , 'cr11_yazan_al_kassir_php_car_rental'); 
		$sql = "select * from cars";
		$result = mysqli_query($conn, $sql) or die("failed to query databases");
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>


	
					<tr>
						<td><?= $row['car_type']; ?></td>
						<td><?= $row['location']; ?></td>
						<td><?= $row['status']; ?></td>
					</tr>										
	
			
	

<?php 

	}
	mysqli_close($conn);
?>
	</table>
				<div class="col-lg-7 col-md-8 col-sm-8 col-8">
					<form action="office_list.php" method="post" accept-charset="utf-8">
						<input type="submit" name="" value="Offices list">
					</form>
				</div>
	</body>
</html>
