

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

$doctoramil=$_GET['id'];
?>





<?php
session_start();
include('include/conn.php');
include_once('sql.php');







$mail=$_SESSION['email'];

//Flash Message
$message="";
if(isset($dbh)){
//connection check
if(isset($_POST['submit'])){



$stmt = $dbh->prepare("INSERT INTO `appointment_req`(`dmail`,`umail`,`text`,`date`) VALUES (:dmail, :umail, :mtext, :date)");

//bindParam
//$stmt->bindParam(':date', $date);
$stmt->bindParam(':dmail', $dmail);
$stmt->bindParam(':umail', $umail);
$stmt->bindParam(':mtext', $mtext);
$stmt->bindParam(':date', $date);


//$doc_type= $_POST['date'];
$dmail = $_POST['dmail'];
$umail = $_POST['umail'];
$mtext = $_POST['mtext'];
$date=date("Y/m/d");
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
        <h3 class="tile-title">Doctor Appointment </h3>
        <div class="tile-body">
          <form action="find-docor.php" method="post" class="form-horizontal" enctype="multipart/form-data">

    

            <label class="control-label">Doctor Email:<span class="text-danger">*</span></label>
            <input type="email" name="dmail" id="" class="form-control" placeholder=" Doctor Email" autocomplete="off"  value="<?php echo $doctoramil;?>">
          </div>
        
          <div class="form-group">
            <label class="control-label">User Email:<span class="text-danger">*</span></label>
            <input type="email" name="umail" id="" class="form-control" placeholder="User Email" autocomplete="off" value="<?php echo$mail; ?>">
            <span id='message'></span>
          </div>

          <div class="form-group">
            <label class="control-label">Message: <span class="text-danger">*</span></label>
            <input type="text" id="mtext" name="mtext" rows="4" cols="50" class="form-control"  placeholder="Write your message Here">
            
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

      }
      include_once('include/footer.php');
      include_once('include/Hfooter.php');
     ?>
