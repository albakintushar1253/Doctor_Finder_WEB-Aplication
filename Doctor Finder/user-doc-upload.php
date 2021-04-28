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
<!-- ============================================== -->

<?php

//connect to DB


//Flash Message
$message="";
if(isset($dbh)){
//connection check
if(isset($_POST['submit'])){



$stmt = $dbh->prepare("INSERT INTO `doucument`(`doc_type`,`date`,`email`,`image`) VALUES (:doc_type, :date, :email,:image)");





//bindParam
$stmt->bindParam(':doc_type', $doc_type);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':image', $image);
$stmt->bindParam(':email', $email);


//insert File
$target_dir = "assets/img/user/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//Fatch data user form
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {


$doc_type= $_POST['doc_type'];
$date = $_POST['date'];
$image = $target_file;
$email=$_SESSION['email'];

//This variable data has been assigned by us



//check name 

//check name 

//checkpassword weather passwrod is same or not....

//confiramation of first value inseration ....


if($stmt->execute()){
  $message="Insert Row Scuccess";
 header("Location:view-document.php");
}
else{
 $message="Insert Row Fail";

}


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
          <form action="user-doc-upload.php" method="post" class="form-horizontal" enctype="multipart/form-data">

            


        
           <div class="message text-danger"><?php if($message!="") { echo $message; } ?></div> 
          <div class="form-group">


            <label class="control-label">Doucument Name:<span class="text-danger">*</span></label>
            <input type="text" name="doc_type" id="" class="form-control" placeholder=" Write your doucument title" autocomplete="off">
         
        
          <div class="form-group">
            <label class="control-label">Current Date:<span class="text-danger">*</span></label>
            <input type="date" name="date" id="confirmpassword" class="form-control" placeholder="RE-type Password" autocomplete="off">
            <span id='message'></span>
          </div>
          <div class="form-group">
            <label class="control-label">Image <span class="text-danger">*</span></label>
            <input type="file" name="image" id="" class="form-control">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Upload</button>
          </div>

        
            
        </form>
      </div>
    </div>
    
  </div>
      
    </main>

<?php
include_once('include/footer.php');
include_once('include/Hfooter.php');
}
?> 