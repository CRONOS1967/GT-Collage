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
    if (isset($_GET['edit'])) {
        $get = $obj->fetch($conn, 'Questions', $_GET['edit'], 'idQuestions');
        $_SESSION['eid'] = $get['idQuestions'];
    }
    $sql = "SELECT * FROM Exams";
    $que = mysqli_query($conn, $sql) or die(mysqli_error($conn)); ?>
    <h2 style="text-align:center; "> Add qustions</h2>
    <div class="container">
        <h2 class="section-title" style="text-align:center;"><?php if (isset($_SESSION['msg'])) {
                                                                    echo $_SESSION['msg'];
                                                                    unset($_SESSION['msg']);
                                                                } ?>
        </h2>
        <div class="card-form">
            <form action="../Backend/insertQ.php" method="post">
                <div class="big-card" style="margin-left:1rem;margin-top:1rem;">
                    <div class="input">
                        <select required name="ex" id="" style="height: 2.5rem; width: 16rem;  border: 1px solid #ccc;border-radius: 4px; box-sizing: border-box; border-radius: .3rem; margin-top: .25rem;margin-left: 3rem; border-color: black;">
                            <!-- <option value="<?php echo $get['idExams']; ?>">Please select Exams</option> -->
                            <?php
                            while ($re = mysqli_fetch_assoc($que)) : ?>
                                <option value="<?php echo $re['idExams']; ?>"><?php echo $re['Title']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <br> <br><label style="color:black; font-weight: bold;margin-left: 3rem;" for="Qustion">Qustion</label><br>
                        <br> <textarea required placeholder="Pleas enter Qustion" id="Qustion" style="width:68%;margin-left: 3rem;" name="q" id="" cols="11" rows="6"><?php echo $retVal = (isset($get['Question'])) ? $get['Question'] : null ?></textarea>
                    </div>
                    <div class="inputgroup" style="margin-top:2rem;">

                        <div class="input">
                            <label style="color:black;  width: 100%; font-weight: bold;" for="mname">choose:A</label><br>
                            <input name="ch1" required value="<?php echo $retVal = (isset($get['Ch1'])) ? $get['Ch1'] : null ?>" type="text" id="choose:A" placeholder="Pleas enter choose:A">
                        </div>
                        <div class="input">
                            <label style="color:black; width: 100%; font-weight: bold;" for="lname">choose:B</label><br>
                            <input name="ch2" required value="<?php echo $retVal = (isset($get['Ch2'])) ? $get['Ch2'] : null ?>" type="text" id="choose:B" placeholder="Pleas enter choose:B">
                        </div>
                        <div class="input">
                            <label style="color:black;  width: 100%; font-weight: bold;" for="mname">choose:C</label><br>
                            <input required name="ch3" value="<?php echo $retVal = (isset($get['Ch3'])) ? $get['Ch3'] : null ?>" type="text" id="choose:C" placeholder="Pleas enter choose:C">
                        </div>
                        <div class="input">
                            <label style="color:black; width: 100%; font-weight: bold;" for="lname">choose:D</label><br>
                            <input required name="ch4" value="<?php echo $retVal = (isset($get['Ch4'])) ? $get['Ch4'] : null ?>" type="text" id="choose:D" placeholder="Pleas enter choose:D">
                        </div>
                        <div class="input">
                            <label style="color:black; width: 100%; font-weight: bold;" for="age">Answer</label><br>
                            <input required name="ans" value="<?php echo $retVal = (isset($get['Answer'])) ? $get['Answer'] : null ?>" type="text" id="Answer" placeholder="Pleas enter Answer">
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
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
                <thead>
                    <?php
                    $q = "SELECT * from Questions join Exams on Exams_idExams=idExams";
                    $query = mysqli_query($conn, $q) or die(mysqli_error($conn));

                    ?>
                    <th>Number</th>
                    <th>Question</th>
                    <th>Choice A</th>
                    <th>Choice B</th>
                    <th>Choice C</th>
                    <th>Choice D</th>
                    <th>Correct Answer</th>
                    <th>Action</th>

                </thead>
                <tbody>
                    <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?php echo $res['idQuestions']; ?></td>
                            <td><textarea readonly style="width: 300px; height: 100px; color: grey;"><?php echo $res['Question']; ?></textarea></td>
                            <td><textarea readonly style="width: 200px; height: 100px; color: grey;"><?php echo $res['Ch1']; ?></textarea></td>
                            <td><textarea readonly style="width: 200px; height: 100px; color: grey;"><?php echo $res['Ch2']; ?></textarea></td>
                            <td><textarea readonly style="width: 200px; height: 100px; color: grey;"><?php echo $res['Ch3']; ?></textarea></td>
                            <td><textarea readonly style="width: 200px; height: 100px; color: grey;"><?php echo $res['Ch4']; ?></textarea></td>
                            <td><?php echo $res['Answer']; ?></td>
                            <td><a href="?edit=<?php echo $res['idQuestions']; ?>">Edit</a> </td>
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