<?php
include 'config.php';
$email = $_POST['email'];
$password = $_POST['password'];


$res = $conn->query("SELECT * FROM patients WHERE email='$email'");
if ($res && $res->num_rows==1) {
$row = $res->fetch_assoc();
if (password_verify($password,$row['password'])) {
$_SESSION['patient_id']=$row['id'];
$_SESSION['patient_name']=$row['name'];
header('Location: dashboard.php');
exit;
}
}
echo "<script>alert('Invalid credentials');window.location='login.php';</script>";
?>