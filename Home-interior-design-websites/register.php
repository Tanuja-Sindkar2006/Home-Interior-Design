<?php
// registration.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Your Custom CSS (MUST BE LAST) -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<section class="contact-section-register-section">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">

            <div class="col-md-6 col-lg-5">
                <div class="contact-card">

                    <h2 class="text-center mb-4">Register</h2>

                    <!-- Message -->
                    <div id="msg" class="text-center mb-3"></div>

                    <!-- Registration Form -->
                    <form id="registerForm" method="post">

                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter phone number" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>

                        <button type="submit" class="more_btn btn-block">
                            Register
                        </button>

                    </form>

                    <!-- Login link -->
                    <p class="text-center mt-3" style="color:#9aa4ad;">
                        Already have an account?
                        <a href="login.php" style="color:#f9c74f;">Login</a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){
    $("#registerForm").submit(function(e){
        e.preventDefault();

        $.ajax({
            url: "register_action.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response){
                $("#msg").html(response);

                if(response.includes("successful")){
                    setTimeout(function(){
                        window.location.href = "login.php?success=1";
                    }, 2000);
                }
            }
        });
    });
});
</script>

</body>
</html>
