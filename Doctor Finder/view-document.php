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
<?php

$result1 = mysqli_query($conn,"SELECT * FROM doucument Where email='$eamil'");


if (mysqli_num_rows($result1) > 0) {
  
?>



<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Table</h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>

          <tr>

          <td>Title</td>
					<td>Date</td>
					<td>Email</td>
					<td>Doucument</td>
					<th align="center">Action</th>

          </tr>
              </thead>
              <tbody>
                <?php
					$i=0;
					while($row = mysqli_fetch_array($result1)) {
					?>
					                
				<tr>
                 
           <td><?php echo $row["doc_type"]; ?></td>
					<td><?php echo $row["date"]; ?></td>
					<td><?php echo $row["email"]; ?></td>

					<td><img src="<?php echo $row["image"]; ?>" alt="Document" style="height: 400px;width: 300px;"></td>
                 
                  <td align="center">
                  <a href="delete.php ?id= <?php echo $row["email"]; ?>" class="btn btn-success">EDIT</a>
                    <a href="delete.php ?id= <?php echo $row["email"]; ?>" class="btn btn-danger">DELETE</a>
                  </td>
                </tr>
                <?php
					$i++;
					}
				 ?>
              </tbody>
            </table>

<?php
	}
	else{
	echo "No result found";
	}
?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include_once('include/footer.php');
}
?>