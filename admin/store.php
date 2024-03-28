<?php
include "../php/connection.php";

$title = $_POST['title'];
$artical =$_POST['article'];
$cat=$_POST['category'];


$sql = "INSERT INTO posts (post_title, post_content, category_id)
        VALUES ('$title', '$artical','$cat')";

// Execute the insert query
if ($conn->query($sql) === TRUE) {
  session_start();
  $_SESSION['status'] ="";
  header('location:../blog-single.php');
} else {
  echo "Error inserting record: " . $conn->error;
}


?>

