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
if(isset($_POST['submit'])){
$stmt = $dbh->prepare("INSERT INTO `course`(`cname`,`cprice`,`cduration`,`cdescription`,`cimage`,`is_active`) VALUES (:cname, :cprice, :cduration, :cdescription, :cimage, :is_active)");
//bindParam
$stmt->bindParam(':cname', $cname);
$stmt->bindParam(':cprice', $cprice);
$stmt->bindParam(':cduration', $cduration);
$stmt->bindParam(':cdescription', $cdescription);
$stmt->bindParam(':cimage', $cimage);
$stmt->bindParam(':is_active', $is_active);
//insert File
$target_dir = "assets/img/course/";
$target_file = $target_dir . basename($_FILES["cimage"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//Fatch data user form
if (move_uploaded_file($_FILES["cimage"]["tmp_name"], $target_file)) {
$cname = $_POST['cname'];
$cprice = $_POST['cprice'];
$cduration = $_POST['cduration'];
$cdescription = $_POST['cdescription'];
$cimage = $target_file;
$is_active = $_POST['is_active'];
//checkpassword
if($stmt->execute()){
$message="Insert Course Scuccess";
header("Location:viewcourse.php");
}
else{
$message="Course Add Fail!";
}
}
else{
$message="You file is not an image!";
}
}
}
include_once('include/header.php');
include_once('include/sidebar.php');
?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-edit"></i> Add Course</h1>
			<p>insert a single Course</p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Course</li>
			<li class="breadcrumb-item"><a href="#">Add Course</a></li>
		</ul>
	</div>
	<div class="row">
		
		<div class="col-md-6 m-auto">
			<div class="tile">
				<h3 class="tile-title">Add Course</h3>
				<div class="tile-body">
					<form action="addcourse.php" method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="control-label col-md-3" for="cname">Course Title <span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="text" class="form-control"  placeholder="Course name" id="cname" name="cname">
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3" for="cprice">Course Fee <span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="text" class="form-control"  placeholder="Course Fee" id="cprice" name="cprice">
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3" for="cduration">Course Duration <span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="text" class="form-control"  placeholder="Course Duration" id="cduration" name="cduration">
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3" for="cdescription">Course Description <span class="text-danger">*</span></label>
							<div class="col-md-9">
								<textarea name="cdescription" id="cdescription" cols="30" rows="10" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3" for="cimage">Course Image <span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="file" class="form-control" id="cimage" name="cimage">
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-3" for="is_active">Course Status <span class="text-danger">*</span></label>
							<div class="col-md-9">
								<select name="is_active" id="is_active" class="form-control">
									<option value="0">Deactive</option>
									<option value="1">Active</option>
								</select>
							</div>
						</div>
					</div>
					<div class="tile-footer text-center">
						
						<button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Course</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="viewcourse.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
						
					</div>
				</form>
			</div>
		</div>
		
	</div>
</main>
<?php
include_once('include/footer.php');
}
?>