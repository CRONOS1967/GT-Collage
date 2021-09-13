<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'sidebar.php';
    include '../Backend/Backend.php';
    $obj = new Backend;
    $conn = $obj->connection(); ?>
    <div class="card-form">
        <div class="big-card" style="margin-left:1rem;">
            <div align="center">
                <h1 class="section-title" style="margin-top:3rem;">Manage Candidate Registration</h1>
                <h2 class="section-title" style="text-align:center;"><?php if (isset($_SESSION['msg'])) {
                                                                            echo $_SESSION['msg'];
                                                                            unset($_SESSION['msg']);
                                                                        } ?>
                </h2>
            </div>
            <div class="card-table" style="margin-top:5rem;">
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
                    <thead>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM Enrole join Users on UserName = Users_UserName join Courses on Courses_idCourses=idCourses where Enrole.Status='pending'") or die(mysqli_error($conn));
                        ?>
                        <th>id</th>
                        <th>username</th>
                        <th>full Name</th>
                        <th>Course</th>
                        <th>Level</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>Certificate</th>
                        <th>Payement</th>
                        <th>Action</th>


                    </thead>
                    <tbody>
                        <?php while ($re = mysqli_fetch_assoc($query)) : ?>
                            <tr>
                                <td><?php echo $re['idCandidates']; ?></td>
                                <td><?php echo $re['Users_UserName']; ?></td>
                                <td><?php echo $re['Fname'] . " " . $re['Fname']; ?></td>
                                <td><?php echo $re['Name']; ?></td>
                                <td><?php echo $re['Level']; ?></td>
                                <td><?php echo $re['Email']; ?></td>
                                <td><?php echo $re['Phone'];
                                    if ($re['Certeficate'] == null) :
                                    ?></td>
                                <td>First time</a> </td>
                            <?php else : ?>
                                <td id="myBtn"><a href="../uploads/<?php echo $re['Certeficate']; ?>" target="_blank" rel="noopener noreferrer"><img class="responsive" src="../uploads/<?php echo $re['Certeficate']; ?>" alt="First time" srcset=""></a> </td>
                            <?php endif; ?>
                            <td id="myBtn1"><a href="../uploads/<?php echo $re['Paym']; ?>" target="_blank" rel="noopener noreferrer"><img class="responsive"  src="../uploads/<?php echo $re['Paym']; ?>" alt="" srcset=""></a> </td>
                            <td> <a href="../Backend/studenrol.php?app=<?php echo $re['idCandidates']; ?>" name="app" class="edit" name=""> Accept</a> <br> &spar;&spar; &spar;&spar;<br> <a href="../Backend/studenrol.php?rej=<?php echo $re['idCandidates']; ?>" class="delete" name="rej" style="color: white;">Reject</a> </td>
                            </tr>
                            
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <br> <br> <br> <br> <br> <br>
            </div>

        </div>
        <style>
.responsive {
  width: 100%;
  max-width: 80px;
  height: auto;
}
</style>
        <script src="../assets/datatable/scripts/jquery-1.9.1.min.js"></script>
        <script src="../assets/datatable/scripts/jquery-ui-1.10.1.custom.min.js"></script>

        <script src="../assets/datatable/scripts/datatables/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('.datatable-1').dataTable();
                $('.dataTables_paginate').addClass("btn-group datatable-pagination");
                $('.dataTables_paginate > a').wrapInner('<span />');
                $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
                $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
            });
        </script>


</html>