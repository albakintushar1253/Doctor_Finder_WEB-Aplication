<?php
    $host='localhost';
    $username='root';
    $password='';
    $dbname = "health_monitoring";
    $conn=mysqli_connect($host,$username,$password,"$dbname");
    if(!$conn)
        {
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>


<?php

session_start();

$_SESSION['email'];

$eamil=$_SESSION['email'];
 



$result1 = mysqli_query($conn,"SELECT * FROM doucument Where email='$eamil'");





if (mysqli_num_rows($result1) > 0) {
?>


<table class='table table-bordered table-striped'>
<tr>
<td>Title</td>
<td>date</td>
<td>email</td>
<td>doucument</td>

</tr>


<?php
$i=0;
while($row = mysqli_fetch_array($result1)) {
?>


<tr>
<td><?php echo $row["doc_type"]; ?></td>
<td><?php echo $row["date"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<img src="<?php echo $row["image"]; ?>" alt="Document">
</tr>
<?php
$i++;
}
//end of the first result...

?>



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
</body>
</html>