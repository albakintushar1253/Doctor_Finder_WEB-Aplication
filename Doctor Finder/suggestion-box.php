
<?php
session_start();
include('include/conn.php');
include_once('sql.php');

if(strlen($_SESSION['email'])==0)
  { 
header('location:login.php');
}
else{ 
$_SESSION['email'];

$eamil=$_SESSION['email'];
 
$result = mysqli_query($conn,"SELECT * FROM users Where email='$eamil'");


if (mysqli_num_rows($result) > 0) {

  $i=0;
  $row = mysqli_fetch_array($result);

  
  }
  else{
  echo "No result found";
  }


include_once('include/header.php');
include_once('include/user-sidebar.php');


?>



<?php
session_start();
require_once('sql.php');

if(strlen($_SESSION['email'])==0)
  { 
header('location:login.php');
}
else{ 
$_SESSION['email'];

$eamil=$_SESSION['email'];
 
$result = mysqli_query($conn,"SELECT * FROM user_helth_status Where email='$eamil'");


if (mysqli_num_rows($result) > 0) {

	$i=0;
	$row = mysqli_fetch_array($result);

	
	}
	else{
	echo "No result found";
	}

?>



<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-bed"></i> User Profile</h1>
			
		</div>
		<ul class="app-breadcrumb breadcrumb">
		
			<a href="docUpload.php">Add Document</a>  /  

      <a href="logout.php">Logout</a>  
			
		</ul>
	</div>
	<div class="row">
		
		<div class="col-md-9 m-auto">
			<div class="tile">
				<h3>Sugestion Medicine List Based on your Problems</h3><hr>

<?PHP
//PUT  DATA INTO VARIABLE
$BLOOD_S=$row["systolic"];
$BLOOD_D=$row["diastolic"];

$PULSE=$row["pulse"];
$TEMPERATURE=$row["temperature"];
$SUGER=$row["suger"];
//Upper data of bood preessure machine 
$standard_s=120;
$elevent_s=129;
$high_s_stage1=139;
$hypertensive_s_stage2=140;
$hypertensive_s_consult=180;

//lower data of bood preessure machine 
$standard_d=80;
$elevent_d=80;
$high_d_stage1=89;
$hypertensive_d_stage2=90;
$hypertensive_d_consult=120;


//CHECK SYSTOLIC  BLOOD PRESSURE FOR STANDARD  
if ($BLOOD_S>=$standard_s & $BLOOD_S<=$elevent_s ){

 
echo '<div class="alert-success text-dark">YOUR SYSTOLIC/UPPER BLOOD PRESSURE IS STANDARD.</br></div>';


}

//CHECK SYSTOLIC  BLOOD PRESSURE FOR LOW   
 else if ($BLOOD_S<=$standard_s  ){

	echo '<div class="alert-warning text-warning">YOUR SYSTOLIC/UPPER BLOOD PRESSURE IS LOW.</br></div>';

	}


//CHECK SYSTOLIC  BLOOD PRESSURE FOR HIGH  (HYPER TENSION STAGE 1)

else if ($BLOOD_S>=$elevent_s & $BLOOD_S<=$high_s_stage1 ){

	echo '<div class="alert-danger text-danger"> YOUR SYSTOLIC/UPPER BLOOD PRESSURE IS HIGH (HYPER TENSION STAGE 1).<br> </div>';

	}

	//CHECK SYSTOLIC BLOOD PRESSURE FOR HIGH (HYPER TENSION STAGE 2) 

else  if($BLOOD_S>=$high_s_stage2 & $BLOOD_S<=$hypertensive_s_consult ){

	echo '<div class="alert-danger text-danger">YOUR SYSTOLIC/UPPER BLOOD PRESSURE IS HIGH (HYPER TENSION STAGE 2.</br></div>';
	}

	//CHECK SYSTOLIC  BLOOD PRESSURE FOR HIGH (HYPER TENSION CRISIS CONSULT WITH DOCTOR) 

else if($BLOOD_S>=$hypertensive_s_consult){

	echo "YOUR SYSTOLIC/UPPER BLOOD PRESSURE IS HIGH (HYPER TENSION CRISIS CONSULT WITH DOCTOR).<br>";
	}



//CHECK  DIASTOLIC BLOOD PRESSURE FOR STANDARD  

 if($BLOOD_D>=$standard_d & $BLOOD_D<=$elevent_d ){

	echo '<div class="alert-success text-success">YOUR DIASTOLIC/LOWER BLOOD PRESSURE IS STANDARD.</br></div>';
	}

//CHECK SYSTOLIC  BLOOD PRESSURE FOR LOW   

	 else if($BLOOD_D<=$standard_d  ){
	
		echo '<div class="alert-warning text-warning">YOUR DIASTOLIC/LOWER BLOOD PRESSURE IS LOW.</br></div>';
		}
	
//CHECK DIASTOLIC BLOOD PRESSURE FOR HIGH  (HYPER TENSION STAGE 1)

 else if ($BLOOD_S>=$elevent_s & $BLOOD_S<=$high_s_stage1 ){

	echo '<div class="alert-warning text-dark">  

		<h4 class="text-primary"> High Pressure medicie list:</h4>
		<table class="table table-hover table-bordered"   align=center>
			
			<thead>
				<tr>
					<th>Medicine name</th>
					<th>Power</th>
					<th>need to take </th>
					<th>total medicin</th>
					<th>Order online</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="text-danger">Tetocine</td>
					<td>500mg</td>
					<td>7 day</td>
					<td>14</td>
					<td><a href="emedicine.com">Emedicine</a></td>
				</tr>
				<tr>
					<td class="text-danger">letocine</td>
					<td>10mg</td>
					<td>7 day</td>
					<td>14</td>
					<td><a href="emedicine.com">Ubar|medicine</a></td>
				</tr>
			</tbody>
		</table>

	</div>';


	}
	
	 
//CHECK DIASTOLIC BLOOD PRESSURE FOR HIGH (HYPER TENSION STAGE 2) 

 else if($BLOOD_S>=$hypertensive_s_stage2 & $BLOOD_S<=$hypertensive_s_consult ){

	echo '<div class="alert-danger text-danger">YOUR DIASTOLIC/LOWER BLOOD PRESSURE IS HIGH (HYPER TENSION STAGE 2).</br></div>';
	}
	

//CHECK  DIASTOLIC BLOOD PRESSURE FOR HIGH (HYPER TENSION CRISIS CONSULT WITH DOCTOR) 

 
	 else if($BLOOD_D>=$high_d_stage1 ){
	
		echo '<div class="alert-danger text-danger">YOUR DIASTOLIC/LOWER BLOOD PRESSURE IS HIGH (HYPER TENSION CRISIS CONSULT WITH DOCTOR).</br></div>';
		}	
	
//END OF BLOOD PRESSURE 

//START OF Temperature
		$temp_n=97;
		$temp_l=95;
		$temp_h=100;

//=======================For Standerd Temperature===================================
if ($TEMPERATURE==$temp_n || $TEMPERATURE<=99  ) {

	echo '<div class="alert-success text-success">No need any medicine! Your temperature is Normal </div>';
}
//========================For low temperature======================================================
else if ($TEMPERATURE==$temp_l || $TEMPERATURE<$temp_l) {
	echo '<div class="alert-warning text-dark">Your Temperature is Low! </div>';
}
//===========================For High temperature===================================================
else if ($TEMPERATURE==$temp_h || $TEMPERATURE>$temp_h) {
	echo '<div class="alert-warning text-dark">  

		<h4 class="text-primary"> Fever medicine list:</h4>
		<table class="table table-hover table-bordered"  border="1" align=center>
			
			<thead>
				<tr>
					<th>Medicine name</th>
					<th>Power</th>
					<th>need to take </th>
					<th>Total medicin</th>
					<th>order online </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="text-danger">Napa Extra</td>
					<td>00</td>
					<td>7 day</td>
					<td>14</td>
					<td><a href="#">Ubar|medicine</a></td>
				</tr>
				<tr>
					<td class="text-danger">parasitamol</td>
					<td>00</td>
					<td>7 day</td>
					<td>14</td>
					<td><a href="#">Ubar|medicine</a></td>
				</tr>
			</tbody>
		</table>

	</div>';
}

//=====================end of temperature section========================================================================



// ==========================================DOCTOR SUGGESION START=======================================================


	
?>
	


</div>
</div>
</div>

<div class="row">
		
<div class="col-md-9 m-auto">
<div class="tile">
	<h3>Sugestion Doctor List</h3><hr>

	<table class="table table-hover table-bordered"   align=center>
			
			<thead>
				<tr>
					<th>Doctor name</th>
					<th>Specialist </th>
					<th>location</th>
					<th>Apointment time</th>
					
					<th> online appointment  </th>
				</tr>
			</thead>
			<?php
$DOCTOR = mysqli_query($conn,"SELECT * FROM doctor_reg ");


if (mysqli_num_rows($DOCTOR) > 0) {

	$i=0;

	while($row = mysqli_fetch_assoc($DOCTOR)) {
	
	
?>


			<tbody>
				<tr>
				<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['specialist']; ?></td>

					<td><?php echo $row['address']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td> <a href="find-docor.php?id= <?php echo $row["email"]; ?>" class="btn btn-success">Take Appointmenn</a>
                 </td>
				</tr>
			
			</tbody>
		


<?php
$i++;
}
}
}

}
?>
</table>

	
</div>
</div>
</div>

 


<?php
include_once('include/footer.php');
// include_once('include/Hfooter.php');

?>



<!-- ================================================ -->

