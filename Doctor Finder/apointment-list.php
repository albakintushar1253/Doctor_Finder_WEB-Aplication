
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
include('include/conn.php');
require_once('sql.php');

if(strlen($_SESSION['email'])==0)
{
header('location:login.php');
}


else{

    $dmail=$_SESSION['email'];
    $date=date("Y/m/d");

 
$sql = "SELECT * FROM  appointment_req WHERE  dmail='$dmail' AND date='$date'";

$message="";
if(isset($dbh)){
//connection check
$stmt = $dbh->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);



$result1 = mysqli_query($conn,$sql);
if (mysqli_num_rows($result1) > 0) {

 

?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Appointment list </h1>
     
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Dashbord</li>
      <li class="breadcrumb-item active"><a href="#">Appointment list</a></li>
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
                  
                 
                <th> DATE</th>
                  <th> USER EMAIL</th>
                  <th> Masage</th>
                  
                  <th align="center">Approve</th>
               
                </tr>
              </thead>
              <tbody>

 

                <?php
                
                $i=0;
                while($row = mysqli_fetch_assoc($result1)) {

             
                ?>

 

                <tr>
                 
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['umail']; ?></td>
                  <td><?php echo $row['text']; ?></td>
                  <?php
                  
                 
                  $vmail=$row['umail']; 
                  ?>
              
<td>

           <a href="approve_apointment.php ?id= <?php echo $row["umail"]; ?>" class="btn btn-success">Click Me</a>
                 
                 
                  <button type="submit" name="delete" class="btn btn-danger">Decline</button>
                
                
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

            
            echo "<center></br></br><h1> Sorry </br>There Is No Appointment Request Today.</h1></center>
            ";
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
include_once('include/Hfooter.php');
}
}


?>