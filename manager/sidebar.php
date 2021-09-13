<?php session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 'manager') {
    # code...
} else {
    header('location:../public/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../for icon/icon/all.css">
    <link href='../assets/package/css/boxicons.min.css' rel='stylesheet'>
    <title>Sidebar menu responsive</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
            <span style="color:white;" id="header-toggle">&#9776;</span>
        </div>
        <div class=".header__img ">
            <div class="dropdown">
                <button class="dropbtn">
                    <i class='bx bx-user-circle' style="color:white; font-size:1.6rem"> </i>
                </button>
                <div class="dropdown-content">
                    <!-- <a href="edit.php" style="font-size:.9rem"><i style="color:black;font-size:1.1rem"class='bx bxs-edit'></i>edit</a> -->
                    <a href="password.php" style="font-size:.9rem"><i style="color:black;font-size:1.1rem" class='bx bxs-edit'></i>Change Password</a>
                    <a href="../Backend/logout.php" style="font-size:.9rem"><i style="color:black;" class='bx bx-log-out nav__icon'></i>logout</a>

                </div>
            </div>
        </div>


    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="" class="nav__logo active">
                    <i class="fa fa-tachometer" style="background-color:white;"></i>
                    <span class="nav__logo-name">Admin dashbord</span>
                </a>

                <div class="nav__list">
                    <a href="manageacc.php" class="nav__link ">
                        <i class='bx bx-merge'></i>
                        <span class="nav__name">Exam Providers</span>
                    </a>

                    <a href="manage-course.php" class="nav__link">
                        <i class='bx bx-merge'></i>
                        <span class="nav__name">Manage course</span>
                    </a>
                    <a href="mng-register-req.php" class="nav__link">
                        <i class='bx bx-merge'></i>
                        <span class="nav__name">Student Regstration</span>
                    </a>
                    <a href="" class="nav__link">
                        <i class='bx bx-merge'></i>
                        <span class="nav__name">Print Certeficate</span>
                    </a>
                    <a href="feedback.php" class="nav__link">
                        <i class='bx bx-merge'></i>
                        <span class="nav__name">View Feedback</span>
                    </a>
                    <a href="schedule.php" class="nav__link">
                        <i class='bx bx-merge'></i>
                        <span class="nav__name">Make Schedule</span>
                    </a>
                    <!-- <a href="edit-schedule.php" class="nav__link">
                        <i class='bx bx-merge'></i>
                        <span class="nav__name">Edit Schedule</span>
                    </a> -->


                    <!-- 
                    <a href="registerhos.php" class="nav__link">
                        <i class='bx bx-calendar-week'></i>
                        <span class="nav__name">Generate report</span>
                    </a> -->
                </div>
            </div>

            <a href="../Backend/logout.php" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

    <script src="../assets/js/main.js"></script>
</body>

</html>