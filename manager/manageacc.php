<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Exam Provider</title>
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/validate.js"></script>
</head>

<body>
    <?php include 'sidebar.php';
    include '../Backend/Backend.php';
    $obj = new Backend;
    $conn = $obj->connection();
    if (isset($_GET['edit'])) {
        $get = $obj->fetch($conn, 'Users', $_GET['edit'], 'UserName');
        $_SESSION['eid'] = $get['UserName'];
    }

    ?>
    <div class="card-form">
        <div class="big-card" style="margin-left:1rem;">
            <h2 class="section-title" style="text-align:center;">Manage Exam Provider
            </h2><br>
            <h2 class="section-title" style="text-align:center;"><?php if (isset($_SESSION['msg'])) {
                                                                        echo $_SESSION['msg'];
                                                                        unset($_SESSION['msg']);
                                                                    } ?>
            </h2>
            <br>
            <form action="../Backend/insertUser.php" method="post">
                <div class="inputgroup">
                    <div class="input">
                        <span class="error_form" id="fname_error_message"></span>
                        <label style="color:black; font-weight: bold;" for="Id">First Name</label><br>
                        <input id="form_fname" required type="text" value="<?php echo $retVal = (isset($get['Fname'])) ? $get['Fname'] : null ?>" id="Id" name="fname" placeholder="First name here">
                    </div>
                    <div class="input">
                        <span class="error_form" id="sname_error_message"></span>
                        <label style="color:black; font-weight: bold;" for="Kebele">Last Name</label><br>
                        <input id="form_sname" required type="text" value="<?php echo $retVal = (isset($get['Lname'])) ? $get['Lname'] : null ?>" id="password" name="lname" placeholder="last name here">
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="age">Age</label><br>
                        <input required type="number" value="<?php echo $retVal = (isset($get['Age'])) ? $get['Age'] : null ?>" id="age" min="18" name="age" placeholder="age here" style="height: 2.5rem; border-radius: .3rem; margin-top: .25rem;">
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="fname">Username</label><br>
                        <input required type="text" <?php echo $retVal = (isset($get['Pass'])) ? "disabled" : null; ?> value="<?php echo $retVal = (isset($get['UserName'])) ? $get['UserName'] : null ?>" id="fname" name="uname" placeholder="username here">
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="pass">Password</label><br>
                        <input required type="Password" <?php echo $retVal = (isset($get['Pass'])) ? "disabled" : null; ?> value="<?php echo $retVal = (isset($get['Pass'])) ? $get['Pass'] : null ?>" id="pass" name="pass" placeholder="* * * * * * *">
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="role">Role</label><br>
                        <select required id="role" name="role">

                            <option selected value="<?php echo $retVal = (isset($get['Role'])) ? $get['Role'] : null ?>"><?php echo $retVal = (isset($get['Role'])) ? $get['Role'] : null ?></option>
                            <option value="manager">Manager</option>
                            <!-- <option value="candidate">Candidate</option> -->
                            <option value="ec">Exam Provider</option>
                        </select>

                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="status">Status</label><br>
                        <select required id="status" name="sts">
                            <option selected value="<?php echo $retVal = (isset($get['Status'])) ? $get['Status'] : null ?>"><?php echo $retVal = (isset($get['Status'])) ? $get['Status'] : null ?></option>
                            <option value="Active">Active</option>
                            <option value="Deactive">Deactive</option>
                        </select>
                    </div>

                    <div class="input">
                        <span class="error_form" id="email_error_message"></span>
                        <label style="color:black; font-weight: bold;" for="phone">email</label><br>
                        <input id="form_email" required type="email" value="<?php echo $retVal = (isset($get['Email'])) ? $get['Email'] : null ?>" id="email" name="mail" placeholder="email here" style="height: 2.5rem; border-radius: .3rem; margin-top: .25rem;">
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="phone">phone</label><br>
                        <input required type="number" value="<?php echo $retVal = (isset($get['Phone'])) ? $get['Phone'] : null ?>" min="99999999" max="9999999999" id="phone" name="ph" placeholder="phone number here" style="height: 2.5rem; border-radius: .3rem; margin-top: .25rem;">
                    </div>

                    <?php if (isset($_GET['edit'])) : ?>
                        <div class="classbn">
                            <div class="buttt"><button id="submit" type="submit" name="edit" class="bv sub">Edit</button></div>
                        </div>
                    <?php else : ?>
                        <div class="classbn">
                            <div class="buttt"><button id="submit" type="submit" name="submit" class="bv sub">Register</button></div>
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div><br>
    <div class="card-table" style="margin-top:5rem;">
        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
            <thead>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM Users") or die(mysqli_error($conn)); ?>
                <th>UserName</th>
                <th>fname</th>
                <th>lname</th>
                <th>email</th>
                <th>phone</th>
                <th>Status</th>
                <th>Role</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php while ($re = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td><?php echo $re['UserName']; ?></td>
                        <td><?php echo $re['Fname']; ?></td>
                        <td><?php echo $re['Lname']; ?></td>
                        <td><?php echo $re['Email']; ?></td>
                        <td><?php echo $re['Phone']; ?></td>
                        <td><?php echo $re['Status']; ?></td>
                        <td><?php echo $re['Role']; ?></td>
                        <td> <a href="?edit=<?php echo $re['UserName']; ?>" class="edit" style="color: white;">Edit</a> 
                        <!-- <a href="?del=<?php echo $re['UserName'] ?>" class="delete" style="color: white;">Delete</a> --></td> 
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