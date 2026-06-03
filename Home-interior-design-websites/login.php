<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<section class="login-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="contact-card">
                    <h2 class="text-center mb-4">Login</h2>
                    <div id="msg" class="text-center mb-3"></div>
                    <form id="loginForm" method="post">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <button type="submit" class="more_btn btn-block">Login</button>
                    </form>
                    <p class="text-center mt-3">
                        Don't have an account? <a href="register.php">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function(){
    $("#loginForm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "login_action.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response){
                $("#msg").html(response);
                if(response.includes("Login successful")){
                    setTimeout(function(){
                        window.location.href = "dashboard.php";
                    }, 1500);
                }
            }
        });
    });
});
</script>
</body>
</html>
