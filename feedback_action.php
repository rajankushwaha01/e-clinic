<?php
include 'config.php';
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO feedback (patient_name,email,message) VALUES (?,?,?)");
$stmt->bind_param("sss",$name,$email,$message);

if ($stmt->execute()) {
  echo "<script>alert('Thank you for your feedback!');window.location='index.php';</script>";
} else {
  echo "Error: ".$conn->error;
}
?>
