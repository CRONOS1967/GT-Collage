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
    include '../Backend/Backend.php';
    $obj = new Backend;
    $conn = $obj->connection();
    if (isset($_GET['edit'])) {
        // $get = $obj->fetch($conn, 'Exams', $_GET['edit'], 'idExams');
        // $_SESSION['eid'] = $get['idExams'];
    } ?>
    <div class="card-form">
        <form action="../Backend/scheduleadd.php" method="post">
            <div class="big-card" style="margin-left:1rem;">
                <h2 class="section-title" style="text-align:center;">Make Schedule
                </h2><br>
                <h2 class="section-title" style="text-align:center;"><?php if (isset($_SESSION['msg'])) {
                                                                            echo $_SESSION['msg'];
                                                                            unset($_SESSION['msg']);
                                                                        } ?>
                </h2><br>
                <div class="inputgroup">
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="Kebele">Start Date</label><br>
                        <input required type="Date" name="date" id="password" placeholder="Course Level here">
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="Kebele">Schedule id</label><br>
                        <input required type="id" name="exid" readonly value="<?php echo $retVal = (isset($_GET['edit'])) ? $_GET['edit']: null ?>" id="password" placeholder="Course Level here">
                    </div>
                </div>
                <div class="classbn">
                    <div class="buttt"><button type="submit" name="submit" class="bv sub"> Add Schedules </button>
                    </div>
                </div>
            </div>
        </form>
    </div><br>
    <div class="card-table" style="margin-top:5rem;">
        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
            <thead>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM Schedules right join Exams on Schedules_idSchedules=idSchedules join Courses on Courses_idCourses=idCourses") or die(mysqli_error($conn)); ?>
                <th>Schedule id</th>
                <th>Course id</th>
                <th>Course name</th>
                <th>Level</th>
                <th>Sector</th>
                <th>Exam Name</th>
                <th>Exam Date</th>
                <th>Action</th>

            </thead>
            <tbody>
                <?php while ($re = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td><?php echo $re['idSchedules']; ?></td>
                        <td><?php echo $re['Courses_idCourses']; ?></td>
                        <td><?php echo $re['Name']; ?></td>
                        <td><?php echo $re['Level']; ?></td>
                        <td><?php echo $re['Sector']; ?></td>
                        <td><?php echo $re['Title']; ?></td>
                        <td><?php echo $re['Date']; ?></td>
                        <td> <a href="?edit=<?php echo $re['idSchedules']; ?>"> <input type="submit" value="Edit" class="edit" style="color: white;"> </a> </td>
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