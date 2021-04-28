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


include_once('include/header.php');
include_once('include/admin-sidebar.php');

?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Admin Dashboard</h1>
      
          
        </div>
        
     
        <a href="logout.php">Logout</a> 
          
        
      </div>
      <div class="row">
        <div class="col-md-5 col-lg-4">
          <div class="widget-small primary coloured-icon"> <i class="icon fa fa-users fa-3x"> </i>
            <div class="info">
              <h4>Admin</h4>
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
              <h4>Doctor</h4>
              <p><b>
                
                  <?php 

                  $admin=$dbh->prepare("SELECT count(id) FROM admin_registration");
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

        <div class="col-md-7 m-auto">
      <div class="tile">
        <h3 class="tile-title">Admin Profile</h3>
        <div class="tile-body">
          <form action="action/update-profile.php" method="post" class="form-horizontal" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

            
            <div class="form-group row">
              <label class="control-label col-md-3" for="name">Name <span class="text-danger">*</span></label>
              <div class="col-md-9">
              <?php echo $row["name"]; ?>
              </div>
            </div>
            <hr>
            <div class="form-group row">
              <label class="control-label col-md-3" for="name">Admin id <span class="text-danger">*</span></label>
              <div class="col-md-9">
              <?php echo $row["id"]; ?>
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
              <label class="control-label col-md-3" for="mobile">Mobile <span class="text-danger">*</span></label>
              <div class="col-md-9">

              <?php echo $row["mobile"]; ?>
              </div>
            </div>
<hr>




            <div class="form-group row">
              <label class="control-label col-md-3" for="image"> Image <span class="text-danger">*</span></label>
              <div class="col-md-9">
                
              <img src="<?php echo $row["image"]; ?>"  alt="User Image" style="height: 70px; width: 70px;">
                
              </div>
            </div>
            
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