<?php
session_start();
include('../include/conn.php');
if(isset($dbh)){
//connection check
if(isset($_POST['submit'])){
//
$newimage = $_FILES["cimage"]["name"];
//file check
if($newimage != null){
	$oldfile = $_POST['oldfile'];
	unlink($oldfile);
	$sql = "UPDATE `course` SET `cname`= :cname,`cprice`= :cprice,`cduration`= :cduration, `cdescription`= :cdescription, `cimage`= :cimage, `is_active`= :is_active where id = :id";
	//fatch image
	$target_dir = "../assets/img/course/";
	$target_file = $target_dir . basename($_FILES["cimage"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$cimage = $target_file;
	move_uploaded_file($_FILES["cimage"]["tmp_name"], $target_file);
}
else{
	$sql = "UPDATE `course` SET `cname`= :cname,`cprice`= :cprice,`cduration`= :cduration, `cdescription`= :cdescription, `is_active`= :is_active where id = :id";
}
$stmt = $dbh->prepare($sql);
//insert File
//bindParam
$stmt->bindParam(':cname', $cname);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':cprice', $cprice);
$stmt->bindParam(':cduration', $cduration);
$stmt->bindParam(':cdescription', $cdescription);
if($newimage != null){
	$stmt->bindParam(':cimage', $cimage);
}
$stmt->bindParam(':is_active', $is_active);

//Fatch data user form

$id = $_POST['id'];
$cname = $_POST['cname'];
$cprice = $_POST['cprice'];
$cduration = $_POST['cduration'];
$cdescription = $_POST['cdescription'];
$is_active = $_POST['is_active'];
//checkpassword
if($stmt->execute()){
$message="Update Course Scuccess";
header("Location:../viewcourse.php");
}
else{
$message="Course Update Fail!";
// header("Location:../editcourse.php");
}
}
}