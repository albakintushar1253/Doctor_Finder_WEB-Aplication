<?php
session_start();
include('include/conn.php');
if(strlen($_SESSION['alogin'])==0)
{
header('location:login.php');
}
else{
$message="";
if(isset($dbh)){
//connection check
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = :id";
    $statement = $dbh->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $profile = $statement->fetch(PDO::FETCH_ASSOC);
    extract($profile);
}



include_once('include/header.php');
include_once('include/sidebar.php');
?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-edit"></i> Edit Profile</h1>
			<p>Edit a single Profile</p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Admin Profile</li>
			<li class="breadcrumb-item"><a href="#">Edit Profile</a></li>
		</ul>
	</div>
	<div class="row">
		
		<div class="col-md-6 m-auto">
			<div class="tile">
				<h3 class="tile-title">Edit Profile</h3>
				<div class="tile-body">
					<form action="action/update-profile.php" method="post" class="form-horizontal" enctype="multipart/form-data">

						<input type="hidden" name="id" value="<?php echo $id ?>">
						<div class="form-group row">
							<label class="control-label col-md-3" for="name">Name <span class="text-danger">*</span></label>
							<div class="col-md-9">

								<input type="text" class="form-control"  placeholder="Name" id="name" name="name" value="<?php echo $name ?>">
							</div>
						</div>

						<div class="form-group row">
							<label class="control-label col-md-3" for="email">Email <span class="text-danger">*</span></label>
							<div class="col-md-9">

								<input type="text" class="form-control"  placeholder="Eamil" id="email" name="email" value="<?php   echo $email ?>">
							</div>
						</div>

						<div class="form-group row">
							<label class="control-label col-md-3" for="mobile">Mobile <span class="text-danger">*</span></label>
							<div class="col-md-9">

								<input type="text" class="form-control"  placeholder="Mobile" id="mobile" name="mobile" value="<?php   echo $mobile ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3" for="password">Password <span class="text-danger">*</span></label>
							<div class="col-md-9">

								<input type="text" class="form-control"  placeholder="Password" id="password" name="password" value="<?php   echo $password ?>">
							</div>
						</div>


						
					
						<div class="form-group row">
							<label class="control-label col-md-3" for="image"> Image <span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="file" class="form-control" id="image" name="image">
								<img src="assets/<?php echo $image ?>" alt="!" style="max-height: 100px;margin-top: 10px;">
								<input type="hidden" name="oldfile" value="<?php echo $image ?>">
							</div>
						</div>
						
					</div>
					<div class="tile-footer text-center">
						
						<button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Course</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="view-profile.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
						
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
}
?>