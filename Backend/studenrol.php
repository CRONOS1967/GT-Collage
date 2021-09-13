<?php
session_start();
include 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();
$data = array();
if (isset($_GET['app'])) {
    $q = "UPDATE `Enrole` SET `Status`='approve' WHERE `idCandidates`=" . $_GET['app'] . "";
    if (mysqli_query($conn, $q)) {
        $r = $obj->fetch($conn, 'Enrole', $_GET['app'], 'idCandidates');
        $data[0] = null;
        $data[1] = $r['idCandidates'];
        $row = $obj->fetch($conn, 'Exams', $r['Courses_idCourses'], 'Courses_idCourses');
        $data[2] = $row['idExams'];
        $data[3] = 'pending';
        $obj->setAttrs($conn, 'exam_enrols', $data);
        if ($obj->insert()) {
            $_SESSION['msg'] = "Unable to enrole this candidate";
        }
    } else {
        $_SESSION['msg'] = "Unable to enrole this candidate";
    }
    header('location:../manager/mng-register-req.php');
}
if (isset($_GET['rej'])) {
    $q = "UPDATE `Enrole` SET `Status`='Disaprove' WHERE `idCandidates`=" . $_GET['rej'] . "";
   
    if ( mysqli_query($conn, $q)) {
        # code...
        $_SESSION['msg'] = "Candidate has been Rejected";
    }else{
        $_SESSION['msg'] = "Unable to Compelete transaction";

    }
    header('location:../manager/mng-register-req.php');
}
