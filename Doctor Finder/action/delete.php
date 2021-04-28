

<?php
$conn=mysqli_connect($host,$username,$password,"$dbname");
if(!$conn)
    {
      die('Could not Connect MySql Server:' .mysql_error());
    }
 
$sql = "DELETE FROM users WHERE email='$udoc'" ;
$data=mysqli_query($conn,$sql);
if($data){
 
echo "data deleted successfully";
header("Location:view-document.php");
}
else{
 
echo "Something is wrong!";
}
 
?>