<?php 
error_reporting(0); 


// Retrieve login details submitted via HTML form
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to the MySQL database
$conn = mysqli_connect("localhost", "root", "", "leave");

// Define the SQL query to retrieve user details based on login details
$query = "SELECT * FROM clgstaff WHERE username = ? AND password = ?";

// Prepare the statement
$stmt = mysqli_prepare($conn, $query);

// Bind the parameters with the login details
mysqli_stmt_bind_param($stmt, "ss", $username, $password);

// Execute the query
mysqli_stmt_execute($stmt);

// Store the result set
$result = mysqli_stmt_get_result($stmt);

// Check if a user was found with the given login details
if (mysqli_num_rows($result) == 1) {
    // Retrieve the user details from the result set
    $user = mysqli_fetch_assoc($result);
    
    // Store the user details in session variables
    session_start();
    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['department'] = $user['department'];
    $_SESSION['designation'] = $user['designation'];
    $_SESSION['phone'] = $user['phone'];
    
    // Redirect to the user dashboard or homepage
    header("Location: index6121.php");
    exit();
} else {
    // If no user was found with the given login details, show an error message
    echo "Invalid login details.";
}

// Close the statement and the connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

/*$username = $_POST['username'];
$password = $_POST['password'];

        
$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "leave";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if($conn->connect_error){
    die("connection failed : ".$conn->connect_error);
} else {
    $stmt = $conn->prepare("select * from clgstaff where username= ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            header("Location: index6121.php");    
        }
        else {
            echo "<h2>Invalid Username and password </h2>";
        }
        
            
    } else {
        echo "<h2>Invalid Username and password </h2>";
  
    }
}*/
    
?>