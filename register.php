<?php include 'config.php'; ?>
<!doctype html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg,#3b82f6,#9333ea,#f43f5e);
      color: #fff;
    }
    .form-container {
      max-width: 500px;
      margin: 60px auto;
      background: rgba(255,255,255,0.1);
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.3);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
    }
    .input, select, textarea {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 8px;
      margin-bottom: 12px;
    }
    .btn {
      width: 100%;
      background: #fff;
      color: #9333ea;
      font-weight: bold;
      padding: 12px;
      border-radius: 25px;
      border: none;
      cursor: pointer;
      transition: 0.3s;
    }
    .btn:hover {
      background: #f1f1f1;
    }
    
    footer {
      margin-top: 317px;
      background: #004d40;
      color: white;
      border-radius: 10px 10px 0 0;
      text-align: center;
      padding: 10px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Patient Registration</h2>
    <form action="register_action.php" method="post">
      <label>Name</label>
      <input type="text" name="name" class="input" required>

      <label>Problem</label>
      <select name="problem" class="input" required>
        <option value="Fever">Fever</option>
        <option value="Cold">Cold</option>
        <option value="Headache">Headache</option>
        <option value="Stomach Pain">Stomach Pain</option>
        <option value="Paralysis">Paralysis</option>
        <option value="Other">Piels</option>
        <option value="Other">Other</option>
      </select>

      <label>Date of Birth</label>
      <input type="date" name="dob" class="input">

      <label>Mobile</label>
      <input type="text" name="mobile" class="input">

      <label>Address</label>
      <textarea name="address" class="input"></textarea>

      <label>Email</label>
      <input type="email" name="email" class="input" required>

      <label>Password</label>
      <input type="password" name="password" class="input" required>

      <button class="btn">Register</button>
    </form>
  </div>
  <footer class="text-center mt-5 p-3" style="background:#004d40; color:white; border-radius:10px;">
  © 2025 E Clinic | Designed by <b>Rajan Kushwaha (Integral University Student)</b>
</footer>

</body>
</html>
