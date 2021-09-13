<?php
include 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();
$data = array();
if (isset($_POST['submit'])) {
  $q = "UPDATE `Schedules` SET `Date`='".$_POST['date']."',`Status`='set' WHERE `idSchedules`=".$_POST['exid']."";
  if(mysqli_query($conn,$q)){
      $_SESSION['msg']="Date set Succussfuly";
  }else{
      $_SESSION['msg']="Plese try again";
  }
  header('location:../manager/schedule.php');

} 