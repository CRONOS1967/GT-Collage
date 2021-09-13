<?php
session_start();
include 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();
$data = array();
if (isset($_POST['submit'])) {
    $data[0] = null;
    $data[1] = $_POST['det'];
    $data[2] = $_POST['uname'];
    $data[3] = date('Y-m-d H:i:s');
    $obj->setAttrs($conn, 'Feedbacks', $data);
    $succ = $obj->insert();
    if ($succ) {
        $_SESSION['msg'] = "Sent Successfuly";
    } else {
        $_SESSION['msg'] = "Unable to send Feedback";
    }
    header('location:../Candidate/feedback.php');
}
