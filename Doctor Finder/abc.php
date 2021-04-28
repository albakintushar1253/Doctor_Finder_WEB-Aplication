<?php
	//sleep(3);
    require_once('sql.php');
	$name = $_REQUEST['name'];

	$con = mysqli_connect('localhost', 'root', '', 'Doctor-finder');
	$sql = "select * from doctor_reg where address like '%{$name}%'";
	$result = mysqli_query($con, $sql);

	$response = "<table border=1>
					<tr>

						<td>Title</td>

						<td>Name</td>
					
						<td>Email</td>

						<td> Specialist </td> 
						<td> Address </td> 
						
				
					</tr>";

	while ($row = mysqli_fetch_assoc($result)) {
		$response .= 	"<tr>
							
							<td>{$row['title']}</td>
							<td>{$row['name']}</td>
							<td>{$row['email']}</td>
							<td>{$row['specialist']}</td>
							<td>{$row['address']}</td>
							
							
							
						
						</tr>";
	}

	$response .= "</table>";

	echo $response;

?>