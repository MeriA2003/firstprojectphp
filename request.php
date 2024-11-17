<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        echo "Please check the method.";
        exit;
    }
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST['phone'];
    $address = $_POST["address"];
    if (empty($name) || empty($email) || empty($phone) || empty($address)) {
        echo "All fiels are required!";
    } 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "user_registrations";
    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $mysqldatabase = "CREATE DATABASE IF NOT EXISTS $database";
    if (!mysqli_query($conn, $mysqldatabase)) {
        die("Error creating database: " . mysqli_error($conn));
    }
    mysqli_select_db($conn, $database);
    $mysqltable = "CREATE TABLE IF NOT EXISTS aboutuser (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(55) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        address VARCHAR(30) NOT NULL

    )";

    if (!mysqli_query($conn, $mysqltable)) {
        die("Error creat table: " . mysqli_error($conn));
    }
    $select = mysqli_query($conn, "SELECT * FROM aboutuser WHERE email = '$email'");
    if (mysqli_num_rows($select) > 0) {
        $_SESSION['error'] = "That email is  use.";
        echo "That email is already used! please write aother email";
        //header('Location: index1.php');
        exit;
    }
    $insert = "INSERT INTO aboutuser (name, email, phone, address) VALUES ('$name', '$email',  '$phone', '$address')";
    if (mysqli_query($conn, $insert)) {
        $_SESSION['perfect'] = "Congratulatins you registered .";
    } else {
        $_SESSION['error'] = "Error: Could not execute $insert. " . mysqli_error($conn);
    }
    header('Location: index1.php');
    mysqli_close($conn);
?>