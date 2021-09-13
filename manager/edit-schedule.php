<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Course</title>
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="card-form">
        <div class="big-card" style="margin-left:1rem;">
            <h2 class="section-title" style="text-align:center;">Edit Schedule
            </h2><br><br>
            <div class="inputgroup">
                <div class="input">
                    <label style="color:black; font-weight: bold;" for="Id">Course Name</label><br>
                    <input type="text" id="Id" placeholder="Course name here">
                </div>
                <div class="input">
                    <label style="color:black; font-weight: bold;" for="Kebele">Start Date</label><br>
                    <input type="Date" id="password" placeholder="Course Level here">
                </div>
                 <div class="input">
                    <label style="color:black; font-weight: bold;" for="Kebele">End Date</label><br>
                    <input type="Date" id="password" placeholder="Course Level here">
                </div>
                 <div class="input">
                    <label style="color:black; font-weight: bold;" for="Kebele">Start Time</label><br>
                    <input type="Time" id="password" placeholder="Course Level here">
                </div>
                 <div class="input">
                    <label style="color:black; font-weight: bold;" for="Kebele">End Date</label><br>
                    <input type="time" id="password" placeholder="Course Level here">
                </div>
                <div class="input">
                    <label style="color:black; font-weight: bold;" for="Kebele">Level</label><br>
                    <input type="number" id="password" placeholder="Course Level here">
                </div>
                
                
                
            </div>
            <div class="classbn">
                <div class="buttt"><a href="" class="bv sub"> Update Schedule </a>

                </div>

            </div>
        </div>
    </div><br>  <div class="card-table" style="margin-top:5rem;">
        <table class="table">
            <thead>
                <th>Course id</th>
                <th>Course name</th>
                <th>Level</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th>Action</th>

            </thead>
            <tbody>
                <tr>
                <td>1234</td>
                    <td>narodsmulu</td>
                    <td>3</td>
                    <td>05-12-2021</td>
                    <td>07-12-2021</td>
                    <td>01:30 AM</td>
                    <td>3:00 AM</td>
                    <td>Pending</td>
                    
                    <td> <a href="edit-schedule.php"> <input type="submit" name="" value="Edit" class="edit" style="color: white;"> </a> <input type="submit" class="delete" name="" value="Delete" style="color: white;"> </td>
                    
                    
                </tr>
                <tr>
                <td>4321</td>
                    <td>kiruhabtamu</td>
                    <td>3</td>
                    <td>05-12-2021</td>
                    <td>07-12-2021</td>
                    <td>01:30 AM</td>
                    <td>3:00 AM</td>
                    <td>Pending</td>
                    
                    <td> <a href="edit-schedule.php"> <input type="submit" name="" value="Edit" class="edit" style="color: white;"> </a> <input type="submit" class="delete" name="" value="Delete" style="color: white;"> </td>
                    
                </tr>
                <tr>
                <td>4567</td>
                    <td>bamlakdesta</td>
                    <td>3</td>
                    <td>05-12-2021</td>
                    <td>07-12-2021</td>
                    <td>01:30 AM</td>
                    <td>3:00 AM</td>
                    <td>Pending</td>
                    
                    <td> <a href="edit-schedule.php"> <input type="submit" name="" value="Edit" class="edit" style="color: white;"> </a> <input type="submit" class="delete" name="" value="Delete" style="color: white;"> </td>
                    
                </tr>
                <tr>
                <td>6543</td>
                    <td>biniyamyerdaw</td>
                    <td>3</td>
                    <td>05-12-2021</td>
                    <td>07-12-2021</td>
                    <td>01:30 AM</td>
                    <td>3:00 AM</td>
                    <td>Pending</td>
                    
                    
                    <td> <a href="edit-schedule.php"> <input type="submit" name="" value="Edit" class="edit" style="color: white;"> </a> <input type="submit" class="delete" name="" value="Delete" style="color: white;">  </td>
                </tr>
              
              
            </tbody>
        </table>
        <br> <br> <br> <br> <br> <br>
    </div>
</body>

</html>