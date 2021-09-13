<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <?php include 'sidebar.php';
    $obj = new Backend;
    $conn = $obj->connection();
    $sql = "SELECT * FROM Courses join Exams where idCourses=Courses_idCourses";
    $que = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    ?>
    <div class="container">
        <div class="card-form">
            <div class="big-card" style="margin-left:1rem;margin-top:1rem;">
                <div class="input">
                    <h2 style="text-align:center; "> E<Embed>nrolment</Embed></h2>
                    <form action="../Backend/req.php" method="post" enctype="multipart/form-data">
                        <div class="inputgroup" style="margin-top:2rem;">
                            <br>
                            <h2 class="section-title" style="text-align:center;"><?php if (isset($_SESSION['msg'])) {
                                                                                        echo $_SESSION['msg'];
                                                                                        unset($_SESSION['msg']);
                                                                                    } ?>
                            </h2>
                            <br>
                            <div class="input">
                                <label style="color:black; width: 100%; font-weight: bold;" for="lname">Photo payment</label><br>
                                <input type="file" name="fileToUpload" id="choose:D">
                                <input type="text" hidden name="uname" value="<?php echo $_SESSION['user']; ?>" id="choose:D" placeholder="Your phone number here">
                                <input type="text" hidden name="sts" value="pending" id="choose:D" placeholder="Your phone number here">
                            </div>
                            <div class="input">
                                <label style="color:black; width: 100%; font-weight: bold;" for="lname">Certeficate</label><br>
                                <input type="file" name="file" id="choose:D">
                                <!-- <input type="text" hidden name="uname" value="<?php echo $_SESSION['user']; ?>" id="choose:D" placeholder="Your phone number here"> -->
                                <!-- <input type="text" hidden name="sts" value="pending" id="choose:D" placeholder="Your phone number here"> -->
                            </div>
                            <div class="input">
                                <label style="color:black;  width: 100%; font-weight: bold;" for="mname">Courses</label><br>
                                <select required name="cid" id="" style="height: 2.5rem; width: 16rem;  border: 1px solid #ccc;border-radius: 4px; box-sizing: border-box; border-radius: .3rem; margin-top: .25rem;margin-left: 3rem; border-color: black;">
                                    <option selected value="<?php echo $retVal = (isset($get['Fname'])) ? $get['Fname'] : null ?>">Please select Courses</option>
                                    <?php
                                    while ($re = mysqli_fetch_assoc($que)) : ?>
                                        <option value="<?php echo $re['idCourses']; ?>"><?php echo $re['Name']; ?><?php echo $re['Level']; ?></option>
                                    <?php endwhile; ?>
                                </select>

                                </select>
                            </div>
                            <button type="submit" name="submit" style="margin-left:3rem;" class="bv sub">Send Request</button>
                        </div>
                    </form>
                </div>
                <div class="card-table" style="margin-top:5rem;">
                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM Enrole join Courses on idCourses = Enrole.Courses_idCourses  WHERE Users_UserName='" . $_SESSION['user'] . "'") or die(mysqli_error($conn)); ?>

                        <thead>
                            <th>Course id</th>
                            <th>Course name</th>
                            <th>Level</th>
                            <th>Status</th>


                        </thead>
                        <tbody>
                            <?php while ($re = mysqli_fetch_assoc($query)) : ?>
                                <tr>
                                    <td><?php echo $re['idCourses']; ?></td>
                                    <td><?php echo $re['Name']; ?></td>
                                    <td><?php echo $re['Level']; ?></td>
                                    <td><?php echo $re['Status']; ?></td>
                                </tr>
                                    <?php endwhile; ?>
                </div>
                <br>
                <br>
            </div>
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