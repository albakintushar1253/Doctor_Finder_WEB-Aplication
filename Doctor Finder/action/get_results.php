// Database Structure 

CREATE TABLE `search` (
 `title` text NOT NULL,
 `description` text NOT NULL,
 `link` text NOT NULL,
 FULLTEXT KEY ('title','description')
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1

<?php
if(isset($_POST['search']))
{
 $host="localhost";
 $username="root";
 $password="";
 $databasename="doctor_reg";
 $connect=mysql_connect($host,$username,$password);
 $db=mysql_select_db($databasename);

 $search_val=$_POST['search_term'];
	
 $get_result = mysql_query("SELECT * from search where MATCH(name) AGAINST('$search_val')");
 while($row=mysql_fetch_array($get_result))
 {
  echo "<li> <a href='#".$row['name']."'> <span class='title'>".$row['name']." </a></li>";
 }
 exit();
}
?>