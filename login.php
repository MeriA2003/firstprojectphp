<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Please check the method.";
    exit;
}

$email = $_POST["email"];
$password = $_POST["password"]; 

if (empty($email) || empty($password)) {
    echo "Email and password are required!";
    exit;
}
$servername = "localhost";
$username = "root";
$password_db = ""; 
$database = "user_registrations";
$conn = mysqli_connect($servername, $username, $password_db, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM aboutuser WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $user['name'];
        echo "Login successful! Welcome, " . $user['name'];
    } else {
        $_SESSION['error'] = "error password.";
        echo "wrong email or password";
    }
} else {
    $_SESSION['error'] = "No user found with this email.";
    echo "wrong email or password";
}

mysqli_close($conn);
//header('Location: index1.php');
?>
