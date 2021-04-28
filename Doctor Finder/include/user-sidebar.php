
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

  

      <p class="app-sidebar__user-designation bg-danger">User</p>
  </div>
  </div>

  <ul class="app-menu">
    <li>
      <a class="app-menu__item active" href="user-dashbord.php">
        <i class="app-menu__icon fa fa-dashboard"></i>
        <span class="app-menu__label">Dashboard</span>
      </a>
    </li>

    <li>
      <a class="app-menu__item active" href="user-profile.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">Profile</span>
      </a>
    </li>
     <li>
      <a class="app-menu__item active" href="user-doc-upload.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">Upload Document</span>
      </a>
    </li> 
    <li>
      <a class="app-menu__item active" href="view-document.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">User History</span>
      </a>
    </li>

     <li>
      <a class="app-menu__item active" href="user-health-status-input.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">Menually Data input</span>
      </a>
    </li>

    <li>
      <a class="app-menu__item active" href="user-dataview.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">Veiw Data </span>
      </a>
    </li>

    <li>
      <a class="app-menu__item active" href="search-doctor.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">Search Doctor</span>
      </a>
    </li>

      <li>
      <a class="app-menu__item active" href="find-docor.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">Take Appointment  </span>
      </a>
    </li>

     <li>
      <a class="app-menu__item active" href="suggestion-box.php">
       <i class="app-menu__icon fa fa-edit"></i>
        <span class="app-menu__label">suggestion Box</span>
      </a>
    </li>

     




     

       


  </ul>
</aside>