<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/validate.js"></script>
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <?php include 'sidebar.php';
    $obj = new Backend;
    $conn = $obj->connection();
    if (isset($_GET['edit'])) {
        $get = $obj->fetch($conn, 'Exams', $_GET['edit'], 'idExams');
        $_SESSION['eid'] = $get['idExams'];
    }
    $sql = "SELECT * FROM Courses";
    $que = mysqli_query($conn, $sql) or die(mysqli_error($conn));  ?>
    <h2 style="text-align:center; "> Add Exams</h2>
    <div class="container">
        <h2 class="section-title" style="text-align:center;"><?php if (isset($_SESSION['msg'])) {
                                                                    echo $_SESSION['msg'];
                                                                    unset($_SESSION['msg']);
                                                                } ?>
        </h2>
        <div class="card-form">
            <form action="../Backend/insertexams.php" method="post">
                <div class="big-card" style="margin-left:1rem;margin-top:1rem;">
                    <div class="input">
                        <label style="color:black;  width: 100%; font-weight: bold;" for="mname">Courses</label>
                        <select required name="cid" id="" style="height: 2.5rem; width: 16rem;  border: 1px solid #ccc;border-radius: 4px; box-sizing: border-box; border-radius: .3rem; margin-top: .25rem;margin-left: 3rem; border-color: black;">
                        <option selected value="<?php echo $retVal = (isset($get['Fname'])) ? $get['Fname'] : null ?>" >Please select Courses</option>
                            <?php
                            while ($re = mysqli_fetch_assoc($que)) : ?>
                                <option value="<?php echo $re['idCourses']; ?>"><?php echo $re['Name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <br> <br>

                    </div>
                    <div class="inputgroup" style="margin-top:2rem;">

                        <div class="input">
                        <span class="error_form" id="fname_error_message"></span>
                            <label style="color:black;  width: 100%; font-weight: bold;" for="mname">Title</label><br>
                            <input id="form_fname" type="text" value="<?php echo $retVal = (isset($get['Title'])) ? $get['Title'] : null ?>" name="ti" id="choose:A" placeholder="please Exam title">
                        </div>
                        <div class="input">
                            <label style="color:black; width: 100%; font-weight: bold;" for="lname">Time Limit</label><br>
                            <input type="number" name="time" value="<?php echo $retVal = (isset($get['Timelimit'])) ? $get['Timelimit'] : null ?>" id="choose:B" placeholder="Pleas enter Time Limit in minuts">
                        </div>
                        <div class="input">
                            <label style="color:black;  width: 100%; font-weight: bold;" for="mname">Quastion amount</label><br>
                            <input type="number" name="am" value="<?php echo $retVal = (isset($get['Qamount'])) ? $get['Qamount'] : null ?>" id="choose:C" placeholder="Pleas enter Question amount">
                        </div>
                        <div class="input">
                            <label style="color:black; width: 100%; font-weight: bold;" for="lname">Description</label><br>
                            <input type="text" id="choose:D" name="desc" value="<?php echo $retVal = (isset($get['Desc'])) ? $get['Desc'] : null ?>" placeholder="Pleas enter Description">
                            <input type="text" name="sid" value="pending" hidden>
                        </div>


                    </div>

                    <?php if (isset($_GET['edit'])) : ?>
                        <div class="classbn">
                            <div class="buttt"><button type="submit" name="edit" class="bv sub">Edit</button></div>
                        </div>
                    <?php else : ?>
                        <div class="classbn">
                            <div class="buttt"><button type="submit" name="submit" class="bv sub">ADD</button></div>
                        </div>
                    <?php endif; ?>
                    <br>
                    <br>
                    <br>
                    <br>


                </div>
            </form>
        </div>
        <div class="card-table">
            <?php
            $q = "SELECT * from Exams join Courses on Exams.Courses_idCourses=idCourses";
            $query = mysqli_query($conn, $q) or die(mysqli_error($conn));

            ?>
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
                <thead>
                    <!-- <th>course code</th> -->
                    <th>id</th>
                    <th>Exam Tile</th>
                    <th>Exam time</th>
                    <th>Amount</th>
                    <th>Created on</th>
                    <th>Course</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                        <tr>

                            <td><?php echo $res['idExams']; ?></td>
                            <td><?php echo $res['Title']; ?></td>
                            <td><?php echo $res['Timelimit']; ?> min</td>
                            <td><?php echo $res['Qamount']; ?></td>
                            <td><?php echo $res['Createdon']; ?></td>
                            <td><?php echo $res['Name']; ?></td>
                            <td><a href="?edit=<?php echo $res['idExams']; ?>">Edit</a> </td>
                        </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>

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