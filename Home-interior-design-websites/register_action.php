<?php
$con = mysqli_connect("localhost","root","","projectdemo",3307);

$name     = trim($_POST['name']);
$email    = trim($_POST['email']);
$phone    = trim($_POST['phone']);
$password = trim($_POST['password']); // store as-is, no hashing

// Check if email already exists
$check = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
if(mysqli_num_rows($check) > 0){
    echo "<div class='alert alert-danger'>Email already registered</div>";
    exit;
}

// Insert user with plain text password
$sql = "INSERT INTO users(name,email,phone,password)
        VALUES('$name','$email','$phone','$password')";

if(mysqli_query($con,$sql)){
    echo "<div class='alert alert-success'>Registration successful</div>";
}else{
    echo "<div class='alert alert-danger'>Error occurred</div>";
}
?>
