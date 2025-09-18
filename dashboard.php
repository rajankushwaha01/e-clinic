<?php include 'config.php';
if (!isset($_SESSION['patient_id'])) { header('Location: login.php'); exit; }
$pid = $_SESSION['patient_id'];
$user = $conn->query("SELECT * FROM patients WHERE id=$pid")->fetch_assoc();
?>
<!doctype html>
<html>
<head>
  <style>
     footer {
      margin-top: 317px;
      background: #004d40;
      color: white;
      border-radius: 10px 10px 0 0;
      text-align: center;
      padding: 10px;
    }
  </style>
<title>Dashboard</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
<h2>Welcome <?php echo $user['name']; ?></h2>
<p>Email: <?php echo $user['email']; ?></p>
<p>Problem: <?php echo $user['problem']; ?></p>
<a href="appointment.php">Book Appointment</a> | <a href="logout.php">Logout</a>
</div>
<footer class="text-center mt-5 p-3" style="background:#004d40; color:white; border-radius:10px;">
  © 2025 E Clinic | Designed by <b>Rajan Kushwaha (Integral University Student)</b>
</footer>

</body>
</html>