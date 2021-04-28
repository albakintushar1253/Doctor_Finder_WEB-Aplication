
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
include('include/conn.php');
$email=$_SESSION['email'];

$email=$_SESSION['email'];

//Flash Message
$message="";
if(isset($dbh)){
//connection check
if(isset($_POST['submit'])){



$stmt = $dbh->prepare("INSERT INTO `user_helth_status`(`email`,`date`,`temperature`,`pulse`,`suger`,`systolic`,`diastolic`) VALUES (:email, :date, :temperature, :pulse, :suger,:systolic,:diastolic)");



//bindParam
$stmt->bindParam(':email', $email);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':temperature', $temperature);
$stmt->bindParam(':pulse', $pulse);
$stmt->bindParam(':suger', $suger);
$stmt->bindParam(':diastolic', $diastolic);
$stmt->bindParam(':systolic', $systolic);



//keep data into to new variable


$date = $_POST['date'];
$temperature = $_POST['temperature'];
$pulse = $_POST['pulse'];
$suger = $_POST['suger'];
$systolic = $_POST['systolic'];
$diastolic = $_POST['diastolic'];



if($stmt->execute()){
  $message="Insert Row Scuccess";
 header("Location:user-dataview.php");
}
else{
 $message="Insert Row Fail";

}

}
}

?>


    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> user Dashboard</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
     
    <div class="row">
    
    <div class="col-md-6 m-auto">
      <div class="tile">
        <h3 class="tile-title">Input Report File </h3>
        <div class="tile-body">
          <form action="user-health-status-input.php" method="post" class="form-horizontal" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group row">
              <label class="control-label col-md-3" for="date">Date <span class="text-danger">*</span></label>
              <div class="col-md-9">

                <input type="date" class="form-control"   id="date" name="date" >
              </div>
            </div>

             <div class="form-group row">
              <label class="control-label col-md-3" for="temperature">Body Temperature  <span class="text-danger">*</span></label>
              <div class="col-md-9">

                <input type="text" class="form-control"   id="temperature" name="temperature" >
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3" for="pulserate">Pulse rate  <span class="text-danger">*</span></label>
              <div class="col-md-9">

                <input type="text" class="form-control"   id="pulse" name="pulse" >
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-md-3" for="bloodpressure"> Systolic/Upper Pressure  <span class="text-danger">*</span></label>
              <div class="col-md-9">

                <input type="text" class="form-control"   id="systolic" name="systolic" >
              </div>
               </div>


            <div class="form-group row">
              <label class="control-label col-md-3" for="bloodpressure"> Diastolic/Lower Pressure  <span class="text-danger">*</span></label>
              <div class="col-md-9">

                <input type="text" class="form-control"   id="diastolic" name="diastolic" >
              </div>

            </div>

            <div class="form-group row">
              <label class="control-label col-md-3" for="bloodsugar">Blood Sugar <span class="text-danger">*</span></label>
              <div class="col-md-9">

                <input type="text" class="form-control"   id="bloodsugar" name="suger" >
              </div>
            </div>


            <div class="tile-footer text-center">
            
            <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="user_dashbord.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            
          </div>
            
        </form>
      </div>
    </div>
    
  </div>
      
    </main>



<script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script>
<script>
	
	// bootstrapvalidate('#temperature','min:2:Enter at least 2 character');

	bootstrapValidate(
   '#temperature',
   'regex:^[0-9]+$:Enter valid tamperature'
   
    );

</script>


</html>

<?php 
include_once('include/footer.php');
include_once('include/Hfooter.php');

}

 ?>

