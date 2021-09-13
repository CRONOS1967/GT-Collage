<?php
session_start();
include 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();
$data = array();
if (isset($_POST['submit'])) {
    $data[0] = $_POST['uname'];
    $data[1] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $data[2] = $_POST['fname'];
    $data[3] = $_POST['lname'];
    $data[4] = $_POST['mail'];
    $data[5] = $_POST['ph'];
    $data[6] = $_POST['age'];
    $data[7] = $_POST['role'];
    $data[8] = $_POST['sts'];
    $obj->setAttrs($conn, 'Users', $data);
    // $_SESSION['msg'] = $obj->check_insert_query();
    $succ = $obj->insert();
    if ($succ) {
        $_SESSION['msg'] = "Inserted Successfuly";
    } else {
        $_SESSION['msg'] = "Same UserName found please change username";
    }
    if ($data[7] == "candidate") {
        $_SESSION['msg'] = $_SESSION['msg'] . " Please Goto login page";
        # code...
        header('location:../public/req-register.php');
    } else {

        header('location:../manager/manageacc.php');
    }
}
if (isset($_POST['edit'])) {
    # code...
    $q = "UPDATE `Users` SET `Fname`='" . $_POST['fname'] . "',`Lname`='" . $_POST['lname'] . "',`Email`='" . $_POST['mail'] . "',`Phone`='" . $_POST['ph'] . "',`Age`='" . $_POST['age'] . "',`Role`='" . $_POST['role'] . "',`Status`='" . $_POST['sts'] . "' WHERE `UserName` ='" . $_SESSION['eid'] . "'";
    if (mysqli_query($conn, $q)) {
        $_SESSION['msg'] = "Successfully Updated";
        unset($_SESSION['eid']);
    } else {
        $_SESSION['msg'] = "Unable to Updated please try again";
    }
    header('location:../manager/manageacc.php');
}
