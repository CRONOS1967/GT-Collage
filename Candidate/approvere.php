<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script type="text/javascript" src="cookie.js"></script>
    <script type="text/javascript" src="timer.js"></script>
</head>

<body>
    <?php include 'sidebar.php';
    $obj = new Backend;
    $conn = $obj->connection();
    // echo $_SESSION['user'];/
    if (isset($_GET['yes'])) {
        $q = "SELECT * FROM Exams Where idExams =" . $_GET['yes'] . ";";
        $ex= $_SESSION['exid'] = $_GET['yes'];
        $_SESSION['en'] = $_GET['en'];
        $qu = mysqli_query($conn, $q);
        $re = mysqli_fetch_assoc($qu);
        $i = $re['Qamount'];
        $seconds=0;
        $minutes = intval($re['Timelimit']);
        $hours = 0;
        $days=0;

        
        // ORDER BY rand()
        $k = 1;
        if (isset($_SESSION["ex".$ex])){
            # code...
            if ($_SESSION["ex".$ex]==1) {
                # code...
                echo '
                <script>
                alert("You have tried to cheat the time the Remaining answers will be submited automatically");
                location.replace("subans.php")    
                </script>';
            }
        }else{
            $_SESSION["ex".$ex]= 1;
        }
        }
        $q = "SELECT * FROM Exams join Questions on idExams = Exams_idExams where idExams =" . $_GET['yes'] . " ORDER BY rand() LIMIT $i";
        $que = mysqli_query($conn, $q);
        $seconds = $seconds * 1000; // Converted into milliseconds
        $minutes = $minutes * 60 * 1000; // Converted into milliseconds
        $hours = $hours * 60 * 60 * 1000; // Converted into milliseconds
        $days = $days * 24 * 60 * 60 * 1000; // Converted into milliseconds

        $total = $days + $hours + $minutes + $seconds; // Total milliseconds
    ?>

    <div class="container">
        <label style="color:black; font-weight: bold;" for="fname">exam: <?php echo $re['Title'] ?></label><br>
        <div class="card"> <br>
            <div class="page-title-actions mr-5" style="font-size: 20px;">
                <form name="cd">
                    <input type="hidden" name="" id="timeExamLimit" value="<?php echo $re['TimeLimit']; ?>">
                    <label>Remaining Time : </label>
                    <!-- <input style="border:none;background-color: transparent;color:blue;font-size: 25px;" name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly="true" /> -->
                    <label class="timer" id="timer_hours"></label>:<label class="timer" id="timer_minutes"></label>:<label class="timer" id="timer_seconds"></label>
                </form>
            </div>
            <br><br>
            <form action="subans.php" method="post">
                <input name="amount" type="number" hidden value="<?php echo $re['Qamount']; ?>" />
                <?php while ($res = mysqli_fetch_assoc($que)) :
                    $questId = $res['idQuestions'];
                ?>

                    <?php echo $k++; ?> .) <label style="color:black; font-weight: bold;" for="mname"><?php echo $res['Question'] ?></label>
                    <br><br><br>
                    <label for="">A.</label><input type="radio" name="ans<?php echo $res['idQuestions'] ?>" value="<?php echo $res['Ch1'] ?>"><?php echo $res['Ch1'] ?>
                    <label for="" style="margin-left:7.5rem;"> B.</label><input type="radio" name="ans<?php echo $res['idQuestions'] ?>" value="<?php echo $res['Ch2'] ?>"><?php echo $res['Ch2'] ?>
                    <br>
                    <label for="">C.</label><input type="radio" name="ans<?php echo $res['idQuestions'] ?>" value="<?php echo $res['Ch3'] ?>"> <?php echo $res['Ch3'] ?>
                    <label for="" style="margin-left:6rem;"> D.</label><input type="radio" name="ans<?php echo $res['idQuestions'] ?>" value="<?php echo $res['Ch4'] ?>">
                    <?php echo $res['Ch4'] ?><br><br><br>
                    <input type="text" hidden class="bv pre " name="<?php echo $res['idQuestions'] ?>" value="<?php echo $res['idQuestions'] ?>">
                <?php endwhile; ?>
                <button type="submit" class="bv next" name="submit">Submit</button>
            </form><br><br>


        </div>





    </div>

    </div>
</body>
<script type="text/javascript">
    var temp = <?php echo $total; ?>; //variable 'total' contains the total timer value in milliseconds
   addEventListener("onload",TimerFunction(temp)); //Calling function from timer.js file
</script>

</html>
