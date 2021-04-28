<?php
session_start();
include('include/conn.php');
if(strlen($_SESSION['alogin'])==0)
{
header('location:login.php');
}

$stmt = $dbh->prepare("INSERT INTO `users`(`password`) VALUES (:password)");

$stmt->bindParam(':password', $password);


//insert File



$passwordtest = $_POST['password'];

$confirmpassword = $_POST['confirmpassword'];
//checkpassword
if($passwordtest == $confirmpassword){
  $password = ($passwordtest);
  if($stmt->execute()){
       $message="Insert Row Scuccess";
      header("Location:profile.php");
    }
    else{
      $message="Insert Row Fail";
    }
  
}
else{
  $message="confirm password Not match!";
  header("Location:register.php");
}


include_once('include/header.php');
include_once('include/sidebar.php');
?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-edit"></i> Profile Details</h1>
			<p>profile show </p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">profile</li>
			<li class="breadcrumb-item"><a href="#">view profile</a></li>
		</ul>
	</div>
	<div class="row">
		
		<div class="col-md-6 m-auto">
			<div class="tile">
				<h3 class="tile-title">Information</h3>
				
					<div class="tile-footer text-center">


							<?php
						    if(isset($_SESSION["image"])){
						      ?>
						      <img class="app-sidebar__user-avatar" src="<?php echo $_SESSION["image"];  ?>" alt="User Image" style="height: 150px; width: 150px;">
						      <?php
						    }
						    else{
						      ?>
						    <img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
						   <?php  }?>
						    <div>
						      <?php
						      if(isset($_SESSION["name"])){
						        echo "<p class='app-sidebar__user-name'>".$_SESSION["name"]."</p>";
						      }
						      else{
						      ?>
						      <p class="app-sidebar__user-name">Name problem!</p>
						      <?php
						      }
						      ?>
						      <p class="app-sidebar__user-designation">Admin </p>
						    </div>


					     <div class="login-box2">
							    <h1>Change Password </h1>
							    <div class="form-group">
					            <label class="control-label">PASSWORD <span class="text-danger">*</span></label>
					            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" id="password">
					          </div>


					          <div class="form-group">

					            <label class="control-label">RE-TYPE PASSWORD <span class="text-danger">*</span></label>


					            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="RE-type Password" autocomplete="off">
								
					            <span id='message'></span>
					          </div>
				         </div>

						  

						
							<a href="dashboard.php"> <button class="btn btn-secondary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</button></a>

						
					</div>
				</form>
			</div>
		</div>
		
	</div>
</main>
<?php
include_once('include/footer.php');

?>