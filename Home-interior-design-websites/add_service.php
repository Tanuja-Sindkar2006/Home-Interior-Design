<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$con = mysqli_connect("localhost","root","","projectdemo",3307);

if(isset($_POST['submit'])){
    $service_name = $_POST['service_name'];
    $description  = $_POST['description'];

    // File upload
    $image = '';
    if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
        $image = 'uploads/'.time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    $query = "INSERT INTO services(service_name, description, image) VALUES('$service_name', '$description', '$image')";
    mysqli_query($con, $query);
    $msg = "Service added successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Service</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Your Custom CSS (MUST BE LAST) -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">       </a>
  <a class="navbar-brand" href="#"><img src="images/logo.jpg.jpg" height="100" width="100"> </a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Service</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="add_service.php">Add Service</a>
          <a class="dropdown-item" href="list_service.php">List Service</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Product</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="add_product.php">Add Product</a>
          <a class="dropdown-item" href="list_product.php">List Product</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="logout.php" class="nav-link">Logout</a>
        </li>
    </ul>
  </div>
</nav>
<div class="container mt-4">
    <div class="contact-card">
    <h2 class="text-center mb-4">Add Service</h2>
    <?php if(isset($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Service Name</label>
            <input type="text" name="service_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Service</button>
    </form>

    </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle JS (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
