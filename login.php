<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM patients WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['patient_id'] = $user['id'];

            // ✅ Login hone ke baad hamesha appointment page par bhejo
            header("Location: appointment.php");
            exit();
        } else {
            echo "<script>alert('Invalid Password');</script>";
        }
    } else {
        echo "<script>alert('Invalid Email');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #667eea, #764ba2);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }
    .login-card {
      width: 500px;
      height: 500px;
      background: #fff;
      border-radius: 15px;
      padding: 100px;
      box-shadow: 0px 8px 25px rgba(0,0,0,0.3);
      animation: fadeIn 1s ease-in-out;
      margin-top: 10%;
    }
    .login-card h3 {
      text-align: center;
      color: #4A148C;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .btn-custom {
      background: #4A148C;
      color: #fff;
      font-weight: bold;
      border-radius: 8px;
      transition: 0.3s;
    }
    .btn-custom:hover {
      background: #6A1B9A;
      transform: scale(1.05);
    }
    .form-control {
      border-radius: 8px;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
     html, body {
      height: 100%x;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

     footer {
  background: #004d40;
  color: white;
  text-align: center;
  padding: 12px;
  border-radius: 12px 12px 0 0;
  font-size: 14px;
  margin-top: auto;  /* keeps footer at bottom */
  width: 100%;
}
  </style>
</head>
<body>
  <div class="login-card">
    <h3>🔑 Patient Login</h3>
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" name="login" class="btn btn-custom w-100">Login</button>
      <p class="mt-3 text-center">Don’t have an account? <a href="register.php" target="_blank">Register</a></p>
    </form>
  </div>
  <footer>
  <p>© 2025 E Clinic | Designed by <b>Rajan Kushwaha (Integral University Student)</b></p>
</footer>
</body>
</html>



