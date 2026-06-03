<?php
session_start();

// Database connection
$con = mysqli_connect("localhost","root","","projectdemo",3307);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get POST data
$email = mysqli_real_escape_string($con, trim($_POST['email']));
$password = trim($_POST['password']); // Plain text for now

// Check if user exists
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) == 1){
    $user = mysqli_fetch_assoc($result);

    // Verify password (use password_hash in real apps)
    if($password === $user['password']){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        echo "<div class='alert alert-success'>Login successful</div>";
    } else {
        echo "<div class='alert alert-danger'>Incorrect password</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Email not registered</div>";
}
?>
