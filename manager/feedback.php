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
    include '../Backend/Backend.php';
    $obj = new Backend;
    $conn = $obj->connection(); ?>

    <div class="container">
        <div class="card-form">
            <div class="card-table">
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
                    <thead>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM Feedbacks") or die(mysqli_error($conn)); ?>
                        <!-- <th>Full name</th> -->
                        <th>username</th>
                        <!-- <th>Email</th> -->
                        <th>Feedback</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        <?php while ($re = mysqli_fetch_assoc($query)) : ?>
                            <tr>
                                <!-- <td><?php echo $re['Fname'] . " " . $re['Fname'] ?></td> -->
                                <td><?php echo $re['Users_UserName']; ?></td>
                                <!-- <td><?php echo $re['Email']; ?></td> -->
                                <td><textarea style="width: 300px; height: 70px;"><?php echo $re['Details']; ?></textarea></td>
                                <td><?php echo $re['fdate']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
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