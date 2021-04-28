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



  

      <p class="app-sidebar__user-designation">Doctor</p>
  </div>
  </div>

  <ul class="app-menu">
    <li>
      <a class="app-menu__item active" href="doctor_dashboard.php">
        <i class="app-menu__icon fa fa-dashboard"></i>
        <span class="app-menu__label">Dashboard</span>
      </a>
    </li>
     <li>
      <a class="app-menu__item active" href="doctor-profile.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">view Profile</span>
      </a>
    </li>
     
      <li>
      <a class="app-menu__item active" href="apointment-list.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">Apointment List </span>
      </a>
    </li> 
   
    <li>
      <a class="app-menu__item active" href="approve_apointment.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label"> Approve Apointment</span>
      </a>
    </li>

  

     <li>
      <a class="app-menu__item active" href="search_approve_pataint.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label"> Search approve patient </span>
      </a>
    </li> 
   

     

       


  </ul>
</aside>