<?php
// include connection
include 'connection.php';

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

        $sql = "INSERT INTO elleave (reason, leavetype, numberofdays, from1, to1, signature1) VALUES ('$reason1', '$leavetype1', '$numberofdays', '$from', '$to', '$signature')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('New record created successfully');</script>";
            echo "<script>window.location.href='http://localhost/';</script>";
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


