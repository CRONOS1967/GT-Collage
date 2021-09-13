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
     $conn = $obj->connection();?>
    <br> <br><label style="color:black; font-weight: bold; margin-left: 35rem; font-size: 30px;"
                        for="Qustion">Student result</label><br>
                 
    <div class="card-table" style="margin-top:5rem;">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
            <thead>
            <?php
                    $q = "SELECT * from Results join Exams on idExams = Exams_idExams join Enrole on idCandidates = Candidates_idCandidates join Users on Users_UserName = UserName join Courses on idCourses = Enrole.Courses_idCourses";
                    $query = mysqli_query($conn, $q) or die(mysqli_error($conn));

                    ?>
                <th>id</th>
                <th>first name</th>
                <th>last name</th>
                <th>Course</th>
                <th>Level</th>
                <th>Sector</th>
                <th>out of</th>
                <th>Mark</th>
                <th>Result</th>
               

            </thead>
            <tbody>
            <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?php echo $res['idResults']?></td>
                    <td><?php echo $res['Fname']?></td>
                    <td><?php echo $res['Lname']?></td>
                    <td><?php echo $res['Name']?></td>
                    <td><?php echo $res['Level']?></td>
                    <td><?php echo $res['Sector']?></td>
                    <td><?php echo $res['Qamount']?></td>
                    <td><?php echo $res['Mark']?></td>
                    <td><?php echo $retVal = ($res['Mark'] >= $res['Qamount']/2) ? "Passed": "Failed" ; ?></td>
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