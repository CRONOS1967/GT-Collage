<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--===== CSS =====-->
    <link rel="stylesheet" href="assets/css/styles-4-reg.css">
    <link href='../assets/package/css/boxicons.min.css' rel='stylesheet'>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/validate.js"></script>
    <title>Login form style google</title>
</head>

<body>
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo"><img src="assets/img/bv.png" style="width:5rem; height: 3rem;" alt=""></a> <a href="#">
                <h2 style="color: white; margin-right: 320px; font-family: cursive;">GT COLLAGE</h2>
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="index.php#home" class="nav__link ">Home</a></li>
                    <li class="nav__item"><a href="index.php#about" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="index.php#services" class="nav__link">Services</a></li>
                    <li class="nav__item"><a href="index.php#contact" class="nav__link">Contact us</a></li>
                    <li class="nav__item"><a href="login.php" class="nav__link active-link">Login</a></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>
    <br><br>
    <div class="l-form">
        <form action="../Backend/insertUser.php" method="post" class="form">
            <div align="center">
            </div>
            <h1 class="form__title" align="center">Register Request Form</h1>
            <h5 class="form__title" style="color: red;"><?php session_start();
                                                        if (isset($_SESSION['msg'])) {
                                                            echo $_SESSION['msg'];
                                                            unset($_SESSION['msg']);
                                                        } ?>
            </h5>
            <table>
                <tr>
                        <span class="form__label" id="fname_error_message"></span>
                    <div class="form__div">
                        <input name="role" value="candidate" hidden type="text">
                        <input name="sts" value="Active" type="text" hidden>
                        <input required name="fname" id="form_fname" type="text" class="form__input" placeholder=" ">
                        <label for="" class="form__label">First Name</label>
                        <!-- <input type="text" class="form__input" placeholder=" " style="margin-left: 300px; ">
                    <label for="" class="form__label" style="margin-left: 300px;">Middle Name</label> -->
                        <input id="form_sname" required name="lname" type="text" class="form__input" placeholder=" " style="margin-left: 600px; ">
                        <label for="" class="form__label" style="margin-left: 600px;">Last Name</label>
                    </div>
                </tr>
                <tr>
                    <div class="form__div">
                        <input required name="uname" type="text" class="form__input" placeholder=" " style="margin-top: 7px; ">
                        <label for="" class="form__label">Username</label>
                        <input required name="age" type="number" class="form__input" placeholder=" " style="margin-left: 300px; ">
                        <label for="" class="form__label" style="margin-left: 300px; margin-top: -10px; font-size: 14px;">Age</label>
                        <input required name="pass" type="password" class="form__input" placeholder=" " style="margin-left: 600px; ">
                        <label for="" class="form__label" style="margin-left: 600px;">Password</label>
                    </div>
                </tr>
                <tr>
                    <div class="form__div">
                        <input required id="form_email" name="mail" type="email" class="form__input" placeholder=" " style="margin-top: 7px; ">
                        <label for=""  class="form__label">Email</label>
                        <!-- <select class="form__input" style="margin-left: 300px; width: 200px;">
                        <option selected disabled></option>
                        <option>Male</option>
                        <option>Female</option>
                    </select> -->
                        <!-- <label for="" class="form__label" style="margin-left: 300px; margin-top: -10px; font-size: 14px;" >Gender</label>
                     <input type="text" class="form__input" placeholder=" " style="margin-left: 600px; ">
                    <label for="" class="form__label" style="margin-left: 600px;">Occupation</label> -->
                    </div>
                </tr>
                <tr>
                    <!-- <div class="form__div">
                    <input type="text" class="form__input" placeholder=" " style="margin-top: 7px; ">
                    <label for="" class="form__label">Zone</label>
                    <input type="text" class="form__input" placeholder=" " style="margin-left: 300px; ">
                    <label for="" class="form__label" style="margin-left: 300px;">Woreda</label>
                     <input type="text" class="form__input" placeholder=" " style="margin-left: 600px; ">
                    <label for="" class="form__label" style="margin-left: 600px;">Kebele</label>
                </div> -->
                </tr>
                <tr>
                    <div class="form__div">
                        <input required name="ph" type="number" class="form__input" placeholder=" " style="margin-top: 7px; ">
                        <label for="" class="form__label">Phone Number</label>
                    </div>
                </tr>
            </table>
            <button type="submit" id="submit" name="submit" style="width:12rem; margin-left: 303px;" class="form__button">Request Now</button> <br>
            <div align="center">
                <p style="font-size: 13px;"> already have an account? <a href="login.php">Login here </a> </p>
            </div>

        </form>
    </div>
</body>

</html>