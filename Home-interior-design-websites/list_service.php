<?php
if(isset($_GET['msg']) && $_GET['msg']=="updated"){
    echo "<div class='alert alert-success'>Service Updated Successfully</div>";
}
?>

<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$con = mysqli_connect("localhost","root","","projectdemo",3307);

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM services WHERE id=$id");
}

$result = mysqli_query($con, "SELECT * FROM services");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Services</title>
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
    <h2>Service List</h2>
    <table class="table table-bordered">
        <tr>
            <th style="color:#ffffff;">#</th>
            <th style="color:#ffffff;">Service Name</th>
            <th style="color:#ffffff;">Description</th>
            <th style="color:#ffffff;">Image</th>
            <th style="color:#ffffff;">Action</th>
        </tr>
        <?php $i=1; while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td style="color:#ffffff;"><?php echo $i++; ?></td>
            <td style="color:#ffffff;"><?php echo $row['service_name']; ?></td>
            <td style="color:#ffffff;"><?php echo $row['description']; ?></td>
            <td>
                <?php if($row['image'] != '') { ?>
                    <img src="<?php echo $row['image']; ?>" width="50">
                <?php } ?>
            </td>
            <td>
                <a href="edit_service.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>

                <a href="list_service.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle JS (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
