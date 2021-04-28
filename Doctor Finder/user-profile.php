
<?php
session_start();
 require_once('sql.php');


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
							<label class="control-label col-md-3" for="name">Name <span class="text-danger">*</span></label>
							<div class="col-md-9">
							<?php echo $row["name"]; ?>
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label class="control-label col-md-3" for="name">User id <span class="text-danger">*</span></label>
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


		
<?php
include_once('include/footer.php');
// include_once('include/Hfooter.php');

?>


<!-- ================================================================================ -->


</div>
</div>        
</div>
</div>
</body>
</html>