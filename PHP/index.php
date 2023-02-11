<!DOCTYPE html>
<html>
<head>
	<title>Pin Code Information</title>
</head>
<body>
	<form action="" method="post">
		<textarea name="pincodes" rows="10" cols="30"></textarea>
		<br><br>
		<input type="submit" name="submit">
	</form>

	<?php
	if (isset($_POST['submit'])) {
		$pincodes = explode("\n", $_POST['pincodes']);
		echo '<table border="1">';
		echo '<tr><th>Pin Code</th><th>State</th><th>Circle</th><th>Region</th><th>District</th></tr>';
		foreach ($pincodes as $pincode) {
			$pincode = trim($pincode);
			$api_url = "https://api.postalpincode.in/pincode/{$pincode}";
			$response = file_get_contents($api_url);
			$data = json_decode($response, true);
			$state = $data[0]['PostOffice'][0]['State'];
			$circle = $data[0]['PostOffice'][0]['Circle'];
            $region = data[0]['PostOffice'][0]['Region'];
            $district = data[0]['PostOffice'][0]['District'];
			echo "<tr><td>{$pincode}</td><td>{$state}</td><td>{$circle}</td><td>{$region}</td><td>{$district}</td></tr>";
		}
		echo '</table>';
	}
	?>
</body>
</html>