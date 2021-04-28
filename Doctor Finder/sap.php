<?php
	//sleep(3);
    require_once('sql.php');
	$name = $_REQUEST['name'];

	$con = mysqli_connect('localhost', 'root', '', 'Doctor-finder');
	$sql = "select * from apporved_appointment where date like '%{$name}%'";
	$result = mysqli_query($con, $sql);

	$response = "<table border=1>
					<tr>

						<td>user email</td>

						<td>date</td>
					
						<td>massage </td>

						
						
				
					</tr>";

	while ($row = mysqli_fetch_assoc($result)) {
		$response .= 	"<tr>
							
							<td>{$row['umail']}</td>
							<td>{$row['date']}</td>
							<td>{$row['text']}</td>
							
							
							
							
						
						</tr>";
	}

	$response .= "</table>";

	echo $response;

?>