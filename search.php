<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search</title>
</head>

<body>
	<?php
	$mysqli = new mysqli("localhost", "root", "", "pgascom");

	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
		exit();
	};

	$sql = "SELECT * FROM cust";

	if ($result = $mysqli->query($sql)) {
		if (mysqli_num_rows($result) > 0) {
			// echo "<table>";
			// echo "<tr>";
			// 	echo "<th>ID</th>";
			// 	echo "<th>Status</th>";
			// 	echo "<th>Name</th>";
			// 	echo "<th>Prod</th>";
			// 	echo "<th>Service</th>";
			// 	echo "<th>Capacity</th>";
			// 	echo "<th>CID</th>";
			// 	echo "<th>Service Name</th>";
			echo "<tr>";
			echo "Search: ";
			echo "<select style='margin-bottom: 5cm' class='select' id='id'";
			while ($row = mysqli_fetch_array($result)) {
				echo "<option id='name' onclick='showCustomer()' value=" . $row['id'] . "  >"  . $row['id'] . "</option>";
			}

			echo "</select>";
			echo "<div id='show'>";
			echo "</div>";
			mysqli_free_result($result);
		}
	}


	$mysqli->close();
	?>

</body>



</html>