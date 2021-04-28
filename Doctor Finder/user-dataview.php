
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
		
		<div class="col-md-5 m-auto">
			<div class="tile">
				<h3 class="tile-title">User Profile</h3>
				<div class="tile-body">
					<form action="action/update-profile.php" method="post" class="form-horizontal" enctype="multipart/form-data">

						<input type="hidden" name="id" value="<?php echo $id ?>">

						
						<div class="form-group row">
							<label class="control-label col-md-3" for="name"> Date <span class="text-danger">*</span></label>
							<div class="col-md-9">
							<?php echo $row["date"]; ?>
							</div>
						</div>

			

<hr>
						<div class="form-group row">
							<label class="control-label col-md-3" for="email">Email <span class="text-danger">*</span></label>
							<div class="col-md-9">
              <?php echo $row["email"]; ?>

								
							</div>
						</div>

            <hr>
						<div class="form-group row">
							<label class="control-label col-md-3" for="email">Temperature <span class="text-danger">*</span></label>
							<div class="col-md-9">
              <?php echo $row["temperature"]; ?>

								
							</div>
						</div>
<hr>
						<div class="form-group row">
							<label class="control-label col-md-3" for="mobile">Pulse <span class="text-danger">*</span></label>
							<div class="col-md-9">

              <?php echo $row["pulse"]; ?>
							</div>
						</div>

            <hr>
						<div class="form-group row">
							<label class="control-label col-md-3" for="mobile">Suger <span class="text-danger">*</span></label>
							<div class="col-md-9">

              <?php echo $row["suger"]; ?>
							</div>
						</div>
            <hr>
            
						<div class="form-group row">
							<label class="control-label col-md-3" for="systolic"> Siastolic Blood Pressure <span class="text-danger">*</span></label>
							<div class="col-md-9">
                             <?php echo $row["systolic"]; ?>
							</div>
							</div>

							<hr>
            
			<div class="form-group row">
				<label class="control-label col-md-3" for="diastolic"> Diastolic Blood Pressure <span class="text-danger">*</span></label>
				<div class="col-md-9">

  			<?php echo $row["diastolic"]; ?>
				</div>

						</div>
				
						</div>
						
					</div>
					
				</form>
			</div>
		</div>

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

	echo '<div class="alert-danger text-danger">YOUR DIASTOLIC/LOWER BLOOD PRESSURE IS HIGH (HYPER TENSION STAGE 1).</br> </div>';
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

if ($TEMPERATURE==$temp_n || $TEMPERATURE<=99  ) {
	echo '<div class="alert-success text-success">Your Temperature is Normal </div>';
}
else if ($TEMPERATURE==$temp_l || $TEMPERATURE<$temp_l) {
	echo '<div class="alert-warning text-dark">Your Temperature is Low! </div>';
}
else if ($TEMPERATURE==$temp_h || $TEMPERATURE>$temp_h) {
	echo '<div class="alert-danger text-danger">Probably you are Suffering From fever! CONSULT WITH DOCTOR</div>';
}

//END OF TEMPERATURE
//



?>
		
<?php
include_once('include/footer.php');
// include_once('include/Hfooter.php');
}
}
?>


<!-- ================================================================================ -->

