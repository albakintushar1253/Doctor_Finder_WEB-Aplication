


<!-- ================================================================= -->
<?php
session_start();
 require_once('sql.php');


$_SESSION['email'];
$uamil=$_GET['id'];


$eamil=$_SESSION['email'];
//$umail=$_SESSION['umail'];
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
<!-- ================================================================= -->




<?php


include('include/conn.php');
include_once('sql.php');




$dmail=$_SESSION['email'];

//$umail=$_SESSION['umail'];



//Flash Message
$message="";
if(isset($dbh)){
//connection check
if(isset($_POST['submit'])){



$stmt = $dbh->prepare("INSERT INTO `apporved_appointment`(`dmail`,`umail`,`date`,`text`,`time`) VALUES (:dmail, :umail, :date, :text, :time)");

//bindParam
//$stmt->bindParam(':date', $date);
$stmt->bindParam(':dmail', $dmail);
$stmt->bindParam(':umail', $umail);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':text', $text);
$stmt->bindParam(':time', $time);

//$doc_type= $_POST['date'];
$dmail = $_POST['dmail'];
$umail = $_POST['umail'];
$text = $_POST['text'];
$date = $_POST['date'];
$time = $_POST['time'];
//This variable data has been assigned by us



if($stmt->execute()){
  $message="Insert Row Scuccess";

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
          <h1><i class="fa fa-dashboard"></i> User Dashboard</h1>
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
        <h3 class="tile-title">Approve Appointment </h3>
        <div class="tile-body">
          <form action="approve_apointment.php" method="post" class="form-horizontal" enctype="multipart/form-data">

    

            <label class="control-label">Doctor Email:<span class="text-danger">*</span></label>
            <input type="email" name="dmail" id="" class="form-control" value="<?php echo $dmail; ?>" placeholder=" Doctor Email" autocomplete="off">
          </div>
        
          <div class="form-group">
            <label class="control-label">User Email:<span class="text-danger">*</span></label>
            <input type="email" name="umail" id="" class="form-control"  value="<?php echo $uamil;?>"autocomplete="off">
            <span id='message'></span>
          </div>

          <div class="form-group">
            <label class="control-label"> DATE: <span class="text-danger">*</span></label>
            <input type="date" id="date" name="date" rows="4" cols="50" class="form-control"  placeholder="Write your message Here">
            
          </div>
          <div class="form-group">
            <label class="control-label"> Time: <span class="text-danger">*</span></label>
            <input type="time" id="time" name="time" rows="4" cols="50" class="form-control"  placeholder="Write your message Here">
            
          </div>



          <div class="form-group">
            <label class="control-label">Message: <span class="text-danger">*</span></label>
            <input type="text" id="text" name="text" rows="4" cols="50" class="form-control"  placeholder="Write your message Here">
            
          </div>

          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Sent Appointment</button>
          </div>

        
            
        </form>
      </div>
    </div>
    
  </div>
      
    </main>


    <?php 
      include_once('include/footer.php');
      include_once('include/Hfooter.php');
     ?>