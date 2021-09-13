<?php
    include 'Backend.php';
    if (isset($_POST['submit'])) {

    $obj = new Backend;
    $conn = $obj->connection();
    $data = array();
    $data[0]= null;
    $data[1]= $_POST['name'];
    $data[2]= $_POST['date'];
    $data[3]= $_POST['time'];
    $data[4]= $_POST['sts'];


    $obj->setAttrs($conn,'Schedules',$data);
    $obj->insert();
  
    }