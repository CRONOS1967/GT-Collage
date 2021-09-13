<?php

session_start();

include 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();
if (isset($_POST['submit'])) {

    $data = array();
    $data[0] = null;
    $data[1] = $_POST['q'];
    $data[2] = $_POST['ch1'];
    $data[3] = $_POST['ch2'];
    $data[4] = $_POST['ch3'];
    $data[5] = $_POST['ch4'];
    $data[6] = $_POST['ans'];
    // $data[7] = $_POST['sts'];
    $data[7] = $_POST['ex'];

    $obj->setAttrs($conn, 'Questions', $data);
    $succ = $obj->insert();
    if ($succ) {
        $_SESSION['msg'] = "Added Successfuly";
    } else {
        $_SESSION['msg'] = "Unable to add exam";
    }
    header('location:../exam-Provider/mng-q.php');
}
if (isset($_POST['edit'])) {
    # code...
    $q = "UPDATE `Questions` SET `Question`='" . $_POST['q'] . "',`Ch1`='" . $_POST['ch1'] . "',`Ch2`='" . $_POST['ch2'] . "',`Ch3`='" . $_POST['ch3'] . "',`Ch4`='" . $_POST['ch4'] . "',`Answer`='" . $_POST['ans'] . "',`Exams_idExams`=" . $_POST['ex'] . " WHERE `idQuestions`=" . $_SESSION['eid'] . "";
    if (mysqli_query($conn, $q)) {
        $_SESSION['msg'] = "Successfully Updated";
        unset($_SESSION['eid']);
    } else {
        $_SESSION['msg'] = $q  . "  unable to update";
    }
    header('location:../exam-Provider/mng-q.php');
}
