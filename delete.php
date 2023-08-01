<?php
// include connection
include 'connection.php';

// check if url contain id, if not redirect to index page
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // get id from url
    $id = trim($_GET["id"]);

    $sql = "DELETE FROM elleave WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record deleted successfully');</script>";
        header("Location: onleave.php"); 
        exit();
    }
    // close connection
    mysqli_close($conn);
} else {
    echo "<script>alert('Please select record to delete');</script>";
    echo "<script>window.location.href='http://localhost/courseproject/';</script>";
}
