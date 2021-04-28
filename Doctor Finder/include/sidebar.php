<?php 

  
if(($value['user']=="admin")) 
{
header("Location:admin-sidebar.php");
}
else if (($value['user']== "user")) 
{
header("Location:user-sidebar.php");
}
else if (($value['user']=="Doctor")) 
{
header("Location:Doctor-sidebar.php");

}
else{
  echo " Sidebar Problem! ";
}

?>