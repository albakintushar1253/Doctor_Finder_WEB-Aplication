<?php
session_start();
include_once('include/conn.php');
include_once('sql.php');



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



if(strlen($_SESSION['email'])==0)
{
header('location:login.php');
}
else{
$message="";
if(isset($dbh)){
//connection check
if (isset($_post['submit'])) {
 
 
 

    $result1 = mysqli_query($conn,"UPDATE doctor_reg SET name = '$name', title= '$title' , specialist='$specialist', bmdc='$bmdc', mobile='$mobile', address='$address' Where email='$eamil'");


  
    
    $name = $_POST['name'];
    $title = $_POST['title']; 
    $specialist = $_POST['specialist'];
    $bmdc = $_POST['bmdc'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
  
    if($result1->execute()){
      $message="Insert Row Scuccess";
     header("Location:home.php");
    }
    else{
     $message="";
    } 
   

  }
}
}







include_once('include/header.php');
include_once('include/Doctor-sidebar.php');

?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-user-md"></i> Doctor Profile</h1>
			
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Dashbord</li>
			
		</ul>
	</div>

	<div class="row">
    
    <div class="col-md-6 m-auto">
      <div class="tile">
        <h3 class="tile-title"> MY PROFILE </h3>

        <div class="tile-body">
          <form action="doctor-profile.php" method="post" class="form-horizontal" enctype="multipart/form-data">

          	<div class="form-group" align="center" >
            
            <img src="<?php echo $row["image"]; ?>" alt="User Image" style="height: 100px; width: 100px; border-radius: 50%; "> 
  
          </div>
          <div class="form-group">
            <label class="control-label text-dark" >TITLE: <span class="text-danger">*</span></label>

  
			  <select id="title" name="title" class="form-control">
        <option value=""><?php echo $row["title"]; ?></option>
			    <option value="dr">Dr.</option>
			    <option value="Prof">Prof. Dr.</option>
			    <option value="Assoc">Assoc. Prof. Dr.</option>
			    <option value="Asst">Asst. Prof. Dr.</option>
			    
			  </select>
		  </div>
          	<div>
            <label class="control-label">Doctor Name:<span class="text-danger">*</span></label>
            <input type="text" name="name" id="" class="form-control" value="<?php echo $row["name"]; ?>"  autocomplete="off">
          </div>
          <div>
            <label class="control-label">Doctor Email:<span class="text-danger">*</span></label>
            <input type="email" name="dmail" id="" class="form-control" value="<?php echo $row["email"]; ?>"autocomplete="off">
          </div>
        

          <div class="form-group">
            <label class="control-label text-dark" > SPECIALIST: <span class="text-danger">*</span></label>


			  <select id="specialist" name="specialist" class="form-control">
        <option value="database"><?php echo $row['specialist']; ?></option>
			    <option value="Allergists">Allergists/Immunologists</option>
			    <option value="Anesthesiologists">Anesthesiologists</option>
			    <option value="Cardiologists">Cardiologists</option>
			    <option value="Medicine ">Medicine Specialists</option>
			    <option value="Dermatologists ">Dermatologists </option>
			    <option value="Hematologists ">Hematologists </option>
			    <option value="Neurologists ">Neurologists </option>
			    <option value="Sleep Medicine Specialists ">Sleep Medicine Specialists </option>
			  </select>
		  </div>


          <div class="form-group">
            <label class="control-label">BMDC No:<span class="text-danger">*</span></label>
            <input type="text" name="bmdc" id="" class="form-control"  value="<?php echo $row["bmdc"]; ?>"autocomplete="off">
            <span id='message'></span>
          </div>
          <div class="form-group">
            <label class="control-label">Mobile No:<span class="text-danger">*</span></label>
            <input type="text" name="mobile" id="" class="form-control"  value="<?php echo $row["mobile"]; ?>"autocomplete="off">
            <span id='message'></span>
          </div> 
           <div class="form-group">
            <label class="control-label">Address :<span class="text-danger">*</span></label>
            <input type="text" name="mobile" id="" class="form-control"  value="<?php echo $row["address"]; ?>"autocomplete="off">
            <span id='message'></span>
          </div>
          
          

          	
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Edit Profile</button>
          </div>

        
            
        </form>
      </div>
    </div>
    
  </div>

<?php

include_once('include/footer.php');


?>