<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$con = mysqli_connect("localhost","root","","projectdemo",3307);

if(isset($_POST['update'])){

    $id           = $_POST['id'];
    $service_name = $_POST['service_name'];
    $description  = $_POST['description'];

    // If new image selected
    if($_FILES['image']['name'] != ""){
        $image = "uploads/" . time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image);

        mysqli_query($con,"UPDATE services 
                           SET service_name='$service_name',
                               description='$description',
                               image='$image'
                           WHERE id='$id'");
    }
    // If image not changed
    else{
        mysqli_query($con,"UPDATE services 
                           SET service_name='$service_name',
                               description='$description'
                           WHERE id='$id'");
    }

    header("Location: list_service.php?msg=updated");
    exit;
}
?>

