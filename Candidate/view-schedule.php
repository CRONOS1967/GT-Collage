<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Course</title>
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'sidebar.php';
    $obj = new Backend;
    $conn = $obj->connection();?>
    <div class="card-form">
        <div class="big-card" style="margin-left:1rem;">
            <h2 class="section-title" style="text-align:center;">View Schedule
            </h2>
        </div>
    </div><br>
    <div class="card-table" style="margin-top:5rem;">
        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM Enrole join Courses on idCourses = Enrole.Courses_idCourses join exam_enrols on idCandidates=exam_enrols.Candidates_idCandidates join Exams on Enrole.Courses_idCourses=Exams.Courses_idCourses join Schedules on Schedules_idSchedules= idSchedules WHERE Users_UserName='" . $_SESSION['user'] . "' and exam_enrols.Status='pending'") or die(mysqli_error($conn)); ?>

            <thead>
                <th>Course id</th>
                <th>Course name</th>
                <th>Level</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>

            </thead>
            <tbody>
                <?php while ($re = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                    <td><?php echo $re['idCourses']; ?></td>
                        <td><?php echo $re['Name']; ?></td>
                        <td><?php echo $re['Level']; ?></td>
                        <td><?php echo $re['Date']; ?></td>
                        <td><?php echo $re['Status'];
                        $q="Select * from Questions where Exams_idExams=".$re['idExams']."";
                                $count = mysqli_fetch_row(mysqli_query($conn,$q));
                                if ($re['Qamount']<= $count): ?></td>
                        <td><a href="approvere.php?yes=<?php echo $re['idExams']; ?>&en=<?php echo $re['idCandidates']; ?>">Take Exam</a></td>
                        <?php else:?><td>Not Yet</td>
                    </tr>
                <?php endif; endwhile; ?>
    </div>
    </tbody>
    </table>
    <br> <br> <br> <br> <br> <br>
    </div>
</body>
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