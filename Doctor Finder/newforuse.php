
<?php
session_start();
 require_once('sql.php');
 require_once('include/conn.php');


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










<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-search"></i> Search Doctor</h1>
			
		</div>
		<ul class="app-breadcrumb breadcrumb">
		
			User/Search Doctor
	
		</ul>

	</div>
	<div class="row">
		
		<div class="col-md-9 m-auto">
			<div class="tile">
				<h3 class="tile-title text-center text-primary">SEARCH  &nbsp; DOCTOR</h3>

				<div class="tile-body">
					

					
						<div class="row">
					    <div class="col-lg-12">
					       <div class="input-group">

						<div id="search_box">
						<form method="post" action="action/get_results.php" onsubmit="return do_search();">

							<input type="text" id="search_term" name="search_term" placeholder="Enter Search" onkeyup="do_search();">
							<input type="submit" name="search" value="SEARCH">

						</form>
						</div>


					       </div><!-- /input-group -->
					    </div><!-- /.col-lg-6 -->
					</div>

				
			
				</div>
			</div>
		</div>

</div>
</div>        
</div>
</div>
</body>



<script type="text/javascript">
function do_search()
{
 var search_term=$("#search_term").val();
 $.ajax
 ({
  type:'post',
  url:'action/get_results.php',
  data:{
   search:"search",
   search_term:search_term
  },
  success:function(response) 
  {
   document.getElementById("result_div").innerHTML=response;
  }
 });
 
 return false;
}
</script>



</html>

<?php
include_once('include/footer.php');
// include_once('include/Hfooter.php');

?>
