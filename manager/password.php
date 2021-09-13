<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <?php 
include '../Backend/Backend.php';
$obj = new Backend;
$conn = $obj->connection();
if(isset($_POST['change']))
{
$np=$_POST['np'];
$cp=$_POST['cp'];
if($np==$cp)
{$msg="Match";
    $Q = "UPDATE `Users` SET `Pass`='" . password_hash($_POST['cp'], PASSWORD_DEFAULT) . "' WHERE `Username`='" . $_SESSION['user']. "'";
    $query = mysqli_query($conn, $Q) or die(mysqli_error($conn));
    if ($query) {
        # code...
        $msg = "Changed Succfuly";
    }
}else{
    $error="Confirm Don't Match ";
}

}
?>
    <form action="" method="post">
    <div class="card-form">
        <div class="big-card" style="margin-left:1rem;">
            <h2 class="section-title" style="margin-top:3rem;">Change Password
            </h2><br><br>
            <div class="inputgroup">
        
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="Wereda">New password</label><br>
                        <input name="np" type="text" id="username" placeholder="Please enter Password" required>
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="Kebele">Commform password</label><br>
                        <input name="cp" type="password" id="password" placeholder="Please enter Commform password"required> 
                        <label style="color:black; font-weight: bold;" for="Kebele"><?php echo $retVal = (isset($error)) ? $error : $retVal = (isset($msg)) ? $msg: null ; ?></label>
                    </div>
                  
                    
            </div>
            <div class="classbn">
                <div class="buttt"><button name="change" href="" class="button ok">Change </button>
                  
                </div>

            </div>
        </div>
        </form>
</html>
