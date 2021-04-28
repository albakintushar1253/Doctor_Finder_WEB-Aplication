<?php
session_start();
include('include/conn.php');
if(strlen($_SESSION['alogin'])==0)
{
header('location:login.php');
}
else{
$sql = 'SELECT * FROM `users` ';
$message="";
if(isset($dbh)){
//connection check
$stmt = $dbh->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
include_once('include/header.php');
include_once('include/admin-sidebar.php');
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Profile list </h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">admin profile</li>
      <li class="breadcrumb-item active"><a href="#">veiw profile</a></li>
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
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Image</th>
         
                  <th align="center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count = 1;
                foreach ($row as  $value) {
                ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['email']; ?></td>
                  <td><?php echo $value['mobile']; ?></td>
                  <td><?php echo $value['image']; ?></td>

                  
                  <td align="center">
                    <a href="edit-profile.php?id=<?php echo $value['id']; ?>" class="btn btn-success">
                      <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                    <a href="action/deletecourse.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                  </td>
                </tr>
                <?php
                $count++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
include_once('include/footer.php');
// include_once('include/Hfooter.php');
}
}
?>