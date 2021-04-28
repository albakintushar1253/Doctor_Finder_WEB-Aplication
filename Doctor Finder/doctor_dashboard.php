

<?php
session_start();
 require_once('sql.php');


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



//========================================================================================================




<?php
session_start();

include_once('include/conn.php');
include_once('sql.php');
$_SESSION['email'];

$eamil=$_SESSION['email'];
 
$result = mysqli_query($conn,"SELECT * FROM admin_registration Where email='$eamil'");


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



?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Doctor Dashboard</h1>
        </div>
        
     
                
        
      </div>
      <div class="row">
        <div class="col-md-5 col-lg-4">
          <div class="widget-small primary coloured-icon"> <i class="icon fa fa-users fa-3x"> </i>
            <div class="info">
              <h4>Todays Appointment</h4>
              <p><b>
                   <?php 

                  $admin=$dbh->prepare("SELECT count(id) FROM users");

                  $admin->execute();
                  $adminrow = $admin->fetch(PDO::FETCH_NUM);
                  $admincount = $adminrow[0];
                  echo $admincount;
                               
                  ?>

              </b></p>
            </div>
          </div>
        </div>
        <div class="col-md-5 col-lg-4">
          <div class="widget-small info coloured-icon"><i class=" icon fa fa-user-md"> </i>
            <div class="info">
              <h4>Approve Apointment</h4>
              <p><b>
                
                 5
              </b></p>
            </div>
          </div>
        </div>
        <div class="col-md-5 col-lg-4">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-bed" aria-hidden="true"></i>
            <div class="info">
              <h4>Users</h4>
              <p><b>

                  <?php 

                  $admin=$dbh->prepare("SELECT count(id) FROM users");
                  $admin->execute();
                  $adminrow = $admin->fetch(PDO::FETCH_NUM);
                  $admincount = $adminrow[0];
                  echo $admincount;
                               
                ?>
              

            </b></p>
            </div>
          </div>
        </div>

        
    
      
    </main>

<?php
include_once('include/footer.php');
include_once('include/Hfooter.php');
}
?> 