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
    $obj = new Backend;
    $conn = $obj->connection(); ?>
    <br> <br><label style="color:black; font-weight: bold; margin-left: 35rem; font-size: 30px;" for="Qustion">My result</label><br>

    <div class="card-table" style="margin-top:5rem;">
        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM Results join Exams on Exams_idExams = idExams join Enrole on Candidates_idCandidates=idCandidates join Courses on Enrole.Courses_idCourses=idCourses WHERE Users_UserName='" . $_SESSION['user'] . "'") or die(mysqli_error($conn)); ?>

            <thead>
                <th>id</th>
                <th>Course</th>
                <th>Sector</th>
                <th>Level</th>
                <th>out of</th>
                <th>result</th>
                <th>Passed</th>
            </thead>
            <tbody>
                <?php while ($re = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td><?php echo $re['idResults']; ?></td>
                        <td><?php echo $re['Name']; ?></td>
                        <td><?php echo $re['Sector']; ?></td>
                        <td><?php echo $re['Level']; ?></td>
                        <td><?php echo $re['Qamount']; ?></td>
                        <td><?php echo $re['Mark']; ?></td>
                        <td><?php echo $retVal = ($re['Mark'] >= $re['Qamount']/2) ? "Passed": "Failed" ; ?></td>
                    </tr>
                <?php endwhile; ?>
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