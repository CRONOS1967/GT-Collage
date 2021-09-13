<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Course</title>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/validate.js"></script>
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'sidebar.php'; 
    include '../Backend/Backend.php';
    $obj = new Backend;
    $conn = $obj->connection();
    if (isset($_GET['edit'])) {
        $get = $obj->fetch($conn, 'Courses', $_GET['edit'], 'idCourses');
        $_SESSION['eid']= $get['idCourses'];
    }
    if (isset($_GET['del'])) {
        # code...
        $q = "DELETE FROM `Courses` WHERE  idCourses=".$_GET['del']."";
        mysqli_query($conn,$q);
    }
    ?>
    <div class="card-form">
        <form action="../Backend/insertcourses.php" method="post">
            <div class="big-card" style="margin-left:1rem;">
                <h2 class="section-title" style="text-align:center;">Manage Course
                </h2><br>
                <h2 class="section-title" style="text-align:center;"><?php if (isset($_SESSION['msg'])) {
                                                                        echo $_SESSION['msg'];
                                                                        unset($_SESSION['msg']);
                                                                    } ?>
            </h2>
                <br>
                <div class="inputgroup">
                    <div class="input">
                    <span class="error_form" id="fname_error_message"></span>
                        <label style="color:black; font-weight: bold;" for="Id">Course Name</label><br>
                        <input required name="name" id="form_fname" value="<?php echo $retVal = (isset($get['Name'])) ? $get['Name'] : null ?>" type="text" id="Id" placeholder="Course name here">
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="Kebele">Level</label><br>
                        <input required name="level"  value="<?php echo $retVal = (isset($get['Level'])) ? $get['Level'] : null ?>" min="1" max="5" type="number" id="password" placeholder="Course Level here">
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="fname">Sector</label><br>
                        <select required name="sec">
                            <option disabled  value="<?php echo $retVal = (isset($get['Sector'])) ? $get['Sector'] : null ?>" selected><?php echo $retVal = (isset($get['Sector'])) ? $get['Sector'] : "Select" ?></option>
                            <option>Information Tech</option>
                            <option>sec1</option>
                            <option>sec2</option>
                        </select>
                    </div>
                </div>

                <?php if (isset($_GET['edit'])) : ?>
                    <div class="classbn">
                        <div class="buttt"><button type="submit" name="edit" class="bv sub">Edit</button></div>
                    </div>
                <?php else : ?>
                    <div class="classbn">
                        <div class="buttt"><button  type="submit" name="submit" class="bv sub">Add Course</button></div>
                    </div>
                <?php endif; ?>
            </div>
        </form>
    </div><br>
    <div class="card-table" style="margin-top:5rem;">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
            <thead>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM Courses") or die(mysqli_error($conn)); ?>
                <th>ID cources</th>
                <th>Course Name</th>
                <th>Level</th>
                <th>Sector</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php while ($re = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td><?php echo $re['idCourses']; ?></td>
                        <td><?php echo $re['Name']; ?></td>
                        <td><?php echo $re['Level']; ?></td>
                        <td><?php echo $re['Sector']; ?></td>
                        <td> <a href="?edit=<?php echo $re['idCourses']; ?>" class="edit" style="color: white;">Edit</a> <a onclick="return confirm('Are You Sure You Want to Delete?');" href="?del=<?php echo $re['idCourses'] ?>" class="delete" style="color: white;">Delete</a> </td>
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