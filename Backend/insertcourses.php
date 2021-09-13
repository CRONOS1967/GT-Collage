<?php
session_start();
include 'Backend.php';

$obj = new Backend;
$conn = $obj->connection();
if (isset($_POST['submit'])) {
    $data = array();
    $data[0] = null;
    $data[1] = $_POST['name'];
    $data[2] = $_POST['level'];
    $data[3] = $_POST['sec'];
    $obj->setAttrs($conn, 'Courses', $data);
    // $_SESSION['msg'] = $obj->check_insert_query();
    $succ = $obj->insert();
    if ($succ) {
        $_SESSION['msg'] = "Inserted Successfuly";
    } else {
        $_SESSION['msg'] = "Unable to Insert Please try again";
    }
    header('location:../manager/manage-course.php');
}
if (isset($_POST['edit'])) {
    $q = "UPDATE `Courses` SET `Name`='" . $_POST['name'] . "', `Level`='" . $_POST['level'] . "', `Sector`='" . $_POST['sec'] . "' WHERE `idCourses` =" . $_SESSION['eid'] . ";";
    if (mysqli_query($conn, $q)) {
        $_SESSION['msg'] = "Successfully Updated";
        unset($_SESSION['eid']);
    } else {
        $_SESSION['msg'] = "Unable to Updated please try again";
    }
    header('location:../manager/manage-course.php');
}
