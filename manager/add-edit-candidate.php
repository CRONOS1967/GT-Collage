<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Exam Provider</title>
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="card-form">
        <div class="big-card" style="margin-left:1rem;">
            <h1 class="section-title" style="text-align:center;">Register Candidate</h1>
       
            <div class="inputgroup">
                <div class="input">
                    <label style="color:black; font-weight: bold;" for="Id">First Name</label><br>
                    <input type="text" id="Id" placeholder="First name here">
                </div>
                <div class="input">
                    <label style="color:black; font-weight: bold;" for="Kebele">Middle Name</label><br>
                    <input type="text" id="password" placeholder="last name here">
                </div>
                <div class="input">
                    <label style="color:black; font-weight: bold;" for="Kebele">Last Name</label><br>
                    <input type="text" id="password" placeholder="last name here">
                </div>
                <div class="input">
                    <label style="color:black; font-weight: bold;" for="fname">Username</label><br>
                    <input type="text" id="fname" placeholder="username here">
                </div>
                <div class="input">
                    <label style="color:black; font-weight: bold;" for="Kebele">Age</label><br>
                    <input type="number" id="password" placeholder="last name here">
                </div>
                <div class="input">
                    <label style="color:black; font-weight: bold;" for="lname">Password</label><br>
                    <input type="Password" id="lname" placeholder="* * * * * * *">
                </div>

                <div class="input">
                    <label style="color:black; font-weight: bold;" for="phone">email</label><br>
                    <input type="email" id="email" placeholder="email here"
                        style="height: 2.5rem; border-radius: .3rem; margin-top: .25rem;">
                </div>
                <div style="margin-left: 50px;">
                    <label style="color:black; font-weight: bold;"> Gender </label> <br><select style="width: 250px; height: 40px; margin">
                        <option disabled selected>Select</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="input" style="margin-left: 50px;">
                    <label style="color:black; font-weight: bold;" for="phone">phone</label><br>
                    <input type="number" id="phone" placeholder="phone number here"
                        style="height: 2.5rem; border-radius: .3rem; margin-top: .25rem;">
                </div>
                <div class="input">
                    <label style="color:black; font-weight: bold;" for="fname">Zone</label><br>
                    <input type="text" id="fname" placeholder="username here">
                </div>
                <div class="input">
                    <label style="color:black; font-weight: bold;" for="fname">Woreda</label><br>
                    <input type="text" id="fname" placeholder="username here">
                </div>
                <div class="input">
                    <label style="color:black; font-weight: bold;" for="fname">Kebele</label>
                    <input type="text" id="fname" placeholder="username here">
                </div>
                
            </div>
            <div class="classbn">
                <div class="buttt"><a href="" class="bv sub">Register</a>

                </div>
            </div>
        </div>

    </div>  <h1 class="section-title" style="text-align:center;">Candidates List</h1> <div class="card-table" style="margin-top:5rem;">
        <table class="table">
            <thead>
                <th>id</th>
                <th>username</th>
                
                <th>fname</th>
                <th>lname</th>
                <th>email</th>
                <th>phone</th>
                <th>Action</th>
                

            </thead>
            <tbody>
                <tr>
                <td>1234</td>
                    <td>narodsmulu</td>
                    
                    <td>nardos</td>
                    <td>mulu</td>
                    <td>nardimulu@gmail.com</td>
                    <td>0923456789</td>
                    <td> <a href="edit-ep.php"> <input type="submit" name="" value="Edit" class="edit" style="color: white;"> </a> <input type="submit" class="delete" name="" value="Delete" style="color: white;"> </td>
                    
                    
                </tr>
                <tr>
                <td>4321</td>
                    <td>kiruhabtamu</td>
                    
                    <td>kirubel</td>
                    <td>habtamu</td>
                    <td>kiraabu@gmail.com</td>
                    <td>092345111</td>
                    <td> <a href="edit-ep.php"> <input type="submit" name="" value="Edit" class="edit" style="color: white;"> </a> <input type="submit" class="delete" name="" value="Delete" style="color: white;"> </td>
                    
                </tr>
                <tr>
                <td>4567</td>
                    <td>bamlakdesta</td>
                    
                    <td>bamlak</td>
                    <td>desta</td>
                    <td>bamlakdesta@gmail.com</td>
                    <td>09156876789</td>
                    <td> <a href="edit-ep.php"> <input type="submit" name="" value="Edit" class="edit" style="color: white;"> </a> <input type="submit" class="delete" name="" value="Delete" style="color: white;"> </td>
                    
                </tr>
                <tr>
                <td>6543</td>
                    <td>biniyamyerdaw</td>
                    
                    <td>biniyam</td>
                    <td>yerdaw</td>
                    <td>biniyamyerd@gmail.com</td>
                    <td>0998546789</td>
                    
                    <td> <a href="edit-ep.php"> <input type="submit" name="" value="Edit" class="edit" style="color: white;"> </a> <input type="submit" class="delete" name="" value="Delete" style="color: white;">  </td>
                </tr>
              
              
            </tbody>
        </table>
       
    </div>
</body>

</html>