<?php
// include connection
include 'connection.php';

session_start();
$id1 = $_SESSION['id'];
$id2 = $_SESSION['name'];
$id3 = $_SESSION['department'];
$id4 = $_SESSION['designation'];
$id5 = $_SESSION['phone'];
// declare varibales and initialize with empty values
$reasonErr = $leavetypeErr = $numberofdaysErr = $fromErr = $toErr = $signatureErr = "";
$reason1 = $leavetype1 = $numberofdays = $from = $to = $signature = "";

// processing form data when form is submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["reason"])) {
        $reasonErr = "*This field is required";
    } else {
        $reason1 = test_input($_POST["reason"]);
        
    }

    if (empty($_POST["leavetype"])) {
        $leavetypeErr = "*This field is required";
    } else {
        $leavetype1 = test_input($_POST["leavetype"]);
    }

    if (empty($_POST["numberofdays"])) {
        $numberofdaysErr = "*This field is required";
    } else {
        $numberofdays = test_input($_POST["numberofdays"]);
    }

    if (empty($_POST["from"])) {
        $fromErr = "*This field is required";
    } else {
        $from = test_input($_POST["from"]);
    }

    if (empty($_POST["to"])) {
        $toErr = "*This field is required";
    } else {
        $to = test_input($_POST["to"]);
    }
    if (empty($_POST["signature"])) {
        $signatureErr = "*This field is required";
    } else {
        $signature = test_input($_POST["signature"]);
    }

    // if no errors then insert data into databse
    if (empty($reasonErr) && empty($leavetypeErr) && empty($numberofdaysErr) && empty($fromErr) && empty($toErr) && empty($signatureErr)) {

        $sql = "INSERT INTO elleave (reason, leavetype, numberofdays, from1, to1, signature1, name, department) VALUES ('$reason1', '$leavetype1', '$numberofdays', '$from', '$to', '$signature', '$id2', '$id3')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>window.location.href='approval.html';</script>";
            exit();
        }
    }
    mysqli_close($conn);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="stylesheet612.css" rel="stylesheet">
    <title>Create Data - PHP CRUD</title>
</head>

<body>
<body>
    <div class="logo">
        <div class="left">
            <img src="logo.jpg" alt="no image">
        </div>
        <div class="right">
            <img src="header.gif" alt="no image">
        </div>
    </div>
    <div class="header">
        <h1>EARNED LEAVE APPLICATION</h1>
    </div>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div class="container">
        <div class="rightcontainer">
        <div class="reason">
            <span>&nbsp;&nbsp;&nbsp;REASON : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="reason">
                <option value="">--selectoption--</option>
                <option value="health">health</option>
                <option value="vacation">vacation</option>
                <option>personal</option>
                
            </select>
            <small class="text-danger"><?= $reasonErr; ?></small>
            

        </div>
        <br><br>
        <div class="type">
            <span>&nbsp;&nbsp;LEAVE TYPE : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="leavetype">
                <option value="">--selectoption--</option>
                <option value="earned leave">earned leaves</option>
                
            </select>
            <small class="text-danger"><?= $leavetypeErr; ?></small>
            
        </div>
        <br>
        <br>

        <div class="days">
            <span><width: 12cm;>&nbsp;&nbsp;NO OF LEAVES :</width></span>&nbsp;&nbsp;
            <input type="number" name="numberofdays" value="<?= $numberofdays; ?>">
            <small class="text-danger"><?= $numberofdaysErr; ?></small>
        </div>
        <br><br>
        <div class="leftcal">
            <span>&nbsp;&nbsp;FROM: </span>
            <input type="datetime-local" name="from" value="<?= $from; ?>"><br>
            <small class="text-danger"><?= $fromErr; ?></small>
        </div>
        <br><br>
        <div class="rightcal">
            <span>TO: </span>
            <input type="datetime-local" name="to" value="<?= $to; ?>"><br>
            <small class="text-danger"><?= $toErr; ?></small>
        </div> 
        <br><br>    
        <div class="signature">
            <span>&nbsp;&nbsp;SIGNATURE : &nbsp;&nbsp;</span>
            <input type="file" name="signature" value="<?= $signature; ?>">
            <small class="text-danger"><?= $signatureErr; ?></small>

        </div>
        <br><br><br><br><br>
        <center><button>submit</button></center>
        </div>
        <br>
        <div class="leftcontainer">
            <center><img src="3135715.png"></center><br>
            
            <span>EMPLOYEE ID:<?php echo $id1; ?></span><br><br>
            <span class="d1">NAME:<?php echo $id2; ?></span><br><br>
            <span class="d1">DEPARTMENT:<?php echo $id3; ?></span><br><br>
            <span class="d1">DESIGNATION:<?php echo $id4; ?></span><br><br>
            <span class="d1">PHN:<?php echo $id5; ?></span><br><br>
            <span class="d1"><a href="index_logout.php">LOGOUT</a></span>

        </div>
        <br>
    </div>
    <br>
    
    </form>
</body>
</html>