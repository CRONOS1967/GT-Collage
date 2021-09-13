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
    <?php include 'sidebar.php'; ?>

    <div class="container">
        <div class="card-form">
            <form action="../Backend/feedback.php" method="post">
                <div class="big-card" style="margin-left:1rem;margin-top:1rem;">
                    <div class="input">
                        <h2 style="text-align:center; "> Send Feedback</h2>

                        <div class="inputgroup" style="margin-top:2rem;">
                            <br>
                            <input type="hidden" name="uname" value="<?php echo $_SESSION['user'] ?>">
                            <br>
                            <h2 class="section-title" style="text-align:center;"><?php if (isset($_SESSION['msg'])) {
                                                                                        echo $_SESSION['msg'];
                                                                                        unset($_SESSION['msg']);
                                                                                    } ?>
                            </h2>
                        </div>

                        <br> <br><label style="color:black; font-weight: bold; margin-left: 3rem;" for="Qustion">Message</label><br>
                        <br> <textarea placeholder="Your feedback here" id="Qustion" style="width:88%; margin-left: 3rem;" name="det" id="" cols="11" rows="6"></textarea>
                    </div>
                    <div align="center"> <button type="submit" name="submit" style="margin-left:3rem;" class="bv sub">Send Now</button> </div>

                    <br>
                    <br>
                    <br>
                    <br>


                </div>
            </form>
        </div>

    </div>
</body>

</html>