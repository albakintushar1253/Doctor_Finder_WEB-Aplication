

<?php
session_start();
//connect to DB
require_once('include/conn.php');

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


//This variable data has been assigned by us
$email="nadim@gmail.com";


//check name 

//check name 

//checkpassword weather passwrod is same or not....



//confiramation of first value inseration ....


if($stmt->execute()){
  $message="Insert Row Scuccess";
 header("Location:login.php");
}
else{
 $message="Insert Row Fail";

}

//STMT1 FOR LOGIN TABLE
if($stmt1->execute()){
  $message="Insert Row Scuccess";
 header("Location:dashboard.php");
}
else{
 $message="Insert Row Fail";
} 
//end of the second condition
}

}
}
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login -  Admin</title>
  
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        
      </div>
      <div class="login-box2">
        <!-- <form action="" method="post" enctype="multipart/form-data"> -->
          
       
        <form action="docUpload.php" method="post" class="login-form" enctype="multipart/form-data">

          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-users"></i>Register</h3>
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
            <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN UP</button>
          </div>

        </form>
        
      </div>

    </section>
    <!-- Essential javascripts for application to work-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugins/pace.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#password, #confirmpassword').on('keyup', function () {
          if ($('#password').val() == $('#confirmpassword').val()) {
            $('#message').html('Matching').css('color', 'green');
          } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
      });
    </script>
  </body>
</html>