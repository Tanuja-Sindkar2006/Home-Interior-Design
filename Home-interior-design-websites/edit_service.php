<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$con = mysqli_connect("localhost","root","","projectdemo",3307);

$id = $_GET['id'];

$result = mysqli_query($con,"SELECT * FROM services WHERE id='$id'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Service</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Your Custom CSS (MUST BE LAST) -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container mt-4">
    <div class="contact-card">
    <h2 class="text-center mb-4">Update Service</h2>

    <form action="update_service.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-group">
            <label>Service Name</label>
            <input type="text" name="service_name" class="form-control"
                   value="<?php echo $row['service_name']; ?>" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4" required><?php echo $row['description']; ?></textarea>
        </div>

        <div class="form-group">
            <label>Service Image</label>
            <input type="file" name="image" class="form-control">
            <br>
            <?php if($row['image']!=""){ ?>
                <img src="<?php echo $row['image']; ?>" width="80">
            <?php } ?>
        </div>

        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="list_service.php" class="btn btn-secondary">Cancel</a>

    </form>
</div>
</div>

</body>
</html>
