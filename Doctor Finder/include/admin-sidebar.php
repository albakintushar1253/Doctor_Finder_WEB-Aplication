<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <?php
    if(isset($_SESSION["email"])){
      ?>
     <img src="<?php echo $row["image"]; ?>"  alt="User Image" style="height: 50px; width: 50px; border-radius: 50%"> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
      <?php
    }
    else{
      ?>
    <img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">

   <?php  }?>
    <div>
      <?php
      if(isset($_SESSION["email"])){
        echo "<p class='app-sidebar__user-name'>".$row["name"]."</p>";
      }
      else{
      ?>
      <p class="app-sidebar__user-name">Name problem!</p>
      <?php
      }
      ?>



  

  <p class="app-sidebar__user-designation">Admin</p>
  </div>
  </div>

  <ul class="app-menu">
    <li>
      <a class="app-menu__item active" href="dashboard.php">
        <i class="app-menu__icon fa fa-dashboard"></i>
        <span class="app-menu__label">Dashboard</span>
      </a>
    </li>

    <li>
      <a class="app-menu__item active" href="doctor-registration.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">Add Doctor</span>
      </a>
    </li>
     <li>
      <a class="app-menu__item active" href="register.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">Add Patient</span>
      </a>
    </li> 
     <li>
      <a class="app-menu__item active" href="admin_registration.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">Add Admin</span>
      </a>
    </li> 
    <li>
      <a class="app-menu__item active" href="view-profile.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">view users</span>
      </a>
    </li>


     

       


  </ul>
</aside>