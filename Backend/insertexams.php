<?php session_start();
include 'Backend.php';
if (isset($_POST['submit'])) {

    $obj = new Backend;
    $conn = $obj->connection();
    $data = array();
    $data2 = array();
    $data2[0] = null;
    $data2[1] = 'pending';
    $data2[2] = 'pending';
    $obj->setAttrs($conn, 'Schedules', $data2);
    $succ = $obj->insert();

    $data[0] = null;
    $data[1] = $_POST['ti'];
    $data[2] = $_POST['am'];
    $data[3] = $_POST['time'];
    $data[4] = $_POST['desc'];
    $data[5] = date('Y-m-d');
    $data[6] = $_POST['cid'];
    $data[7] = $conn->insert_id;

    $obj->setAttrs($conn, 'Exams', $data);
    $succ = $obj->insert();
    if ($succ) {
        $_SESSION['msg'] = "Added Successfuly";
    } else {
        $_SESSION['msg'] = "Unable to add exam";
    }
    header('location:../exam-Provider/mng-exam.php');
}
if (isset($_POST['edit'])) {
    # code...
    $q = "UPDATE `Exams` SET `Title`='" . $_POST['ti'] . "',`Qamount`=" . $_POST['am'] . ",`Timelimit`='" . $_POST['time'] . "',`Desc`='" . $_POST['desc'] . "',`Createdon`='" . date('Y-m-d') . "',`Courses_idCourses`=" . $_POST['cid'] . ",`Schedules_idSchedules`='" . $_POST['sid'] . "' WHERE `idExams`=" . $_SESSION['eid'] . "";
    if (mysqli_query($conn, $q)) {
        $_SESSION['msg'] = "Successfully Updated";
        unset($_SESSION['eid']);
    } else {
        $_SESSION['msg'] = "unable to update";
    }
    header('location:../exam-Provider/mng-exam.php');
}
