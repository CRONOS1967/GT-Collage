<?php
    $row = $obj->fetch($conn, 'Users', $_SESSION['user'], 'UserName');
switch ($_SESSION['role']) {
    case 'manager':
        # code...
        if ($row['Status'] == 'Active') {
            header("location:../manager/manageacc.php");
            # code...
            // $_SESSION['empid'] = $row['idE'];
        }else{
            $error = "Your Account Has beed Deactivated Please contact Your Manager";
        }
        break;
    case 'ec':
        # code...
        if ($row['Status'] == 'Active') {
        header('location:../exam-Provider/result.php');}else{
            $error = "Your Account Has beed Deactivated Please contact Your Manager";
        }
        break;
    case 'candidate':
        # code...
        // $row = $obj->fetch($conn, 'Employees', $_SESSION['id'], 'idUsers');
        if ($row['Status'] == 'Active') {
        header("location:../Candidate/view-schedule.php");}else{
            $error = "Your Account Has beed Deactivated Please contact Your Manager";
        }
        break;

    
    default:
        header("location:../public/login.php");
        break;
}
    // echo "<script> console.log(".$result['Fname'].")</script>";
