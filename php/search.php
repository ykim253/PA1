<?php
	require_once 'connect.php';
	$conn = dbConnect();

	if (isset($_GET['name'])) {

		$data = "%".$_GET['name']."%";
		$sql = "SELECT * FROM NBA WHERE PlayerName like '$data'";

		$stmt = $conn->prepare($sql);

		$results = $stmt->execute();

		$rows = $stmt->fetchAll();
		
	}

	if(empty($rows)) {
		echo "<tr>";
			echo "<td colspan='7'>There were no records</td>";
		echo "</tr>";
	} else {
		foreach ($rows as $row) {
			echo "<tr>";
				echo "<td>".$row["id"]."</td>";
				echo "<td>".$row['PlayerName']."</td>";
				echo "<td>".$row['GP']."</td>";
				echo "<td>".$row['FGP']."</td>";
				echo "<td>".$row['TPP']."</td>";
				echo "<td>".$row['FTP']."</td>";
				echo "<td>".$row['PPG']."</td>";
			echo "</tr>";
		}
	}
?>