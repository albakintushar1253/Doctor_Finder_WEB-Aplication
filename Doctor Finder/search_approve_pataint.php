<?php

session_start();
 require_once('sql.php');
 require_once('include/conn.php');


$_SESSION['email'];

$eamil=$_SESSION['email'];
 
$result = mysqli_query($conn,"SELECT * FROM doctor_reg Where email='$eamil'");


if (mysqli_num_rows($result) > 0) {

	$i=0;
	$row = mysqli_fetch_array($result);

	
	}
	else{
	echo "No result found";
	}

include_once('include/header.php');
include_once('include/Doctor-sidebar.php');

?>




<!DOCTYPE html>
<html>
<head>
	<title>JS Example</title>
	<script type="text/javascript" src="sap_script.js"></script>
</head>
<body>

	<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-search"></i> Search Doctor</h1>
			
		</div>
		<ul class="app-breadcrumb breadcrumb">
		
			User/Search Doctor
	
		</ul>

	</div>
	<div class="row">
		
		<div class="col-md-9 m-auto">
			<div class="tile">
				<h3 class="tile-title text-center text-primary">SEARCH  &nbsp; Approve patient </h3>

				<div class="tile-body">
					

					
						<div class="row">
					    <div class="col-lg-12">
					       <div class="input-group">
									
									<input type="text" name="name" id="name" onkeyup="ajax()" autocomplete="off" class="form-control" placeholder="Search aprove patient By Date" />

							</div>

								<div id="result" class="table-warning table-hover"> 
										
							    </div>
						</div>
					</div>


</body>
</html>