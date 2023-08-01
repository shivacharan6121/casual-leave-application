<?php 
error_reporting(0); 

$username = $_POST['username'];
$password = $_POST['password'];

        
$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "leave";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if($conn->connect_error){
    die("connection failed : ".$conn->connect_error);
} else {
    $stmt = $conn->prepare("select * from admin where username= ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            header("Location: onleave.php");    
        } else {
            echo "<h2>Invalid Username and password </h2>";
        } 
    } else {
        echo "<h2>Invalid Username and password </h2>";
  
}
}
    
?>