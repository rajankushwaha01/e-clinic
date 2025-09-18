<?php
// feedback.php
include('config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $message = $_POST['message'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO feedback (name, message, rating) VALUES ('$name','$message','$rating')";
    mysqli_query($conn, $sql);
    $success = "Thank you for your feedback!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Feedback</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
    }
    body {
      background: linear-gradient(to right, #232526, #414345);
      font-family: Arial, sans-serif;
    }
    .content {
      flex: 1; /* push footer to bottom */
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }
    .card {
      width: 100%;
      max-width: 700px;
      padding: 30px;
      border-radius: 15px;
      background: #fff;
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
      animation: fadeIn 1s ease-in-out;
    }
    h3 {
      text-align: center;
      color: #4A148C;
      margin-bottom: 20px;
      font-weight: bold;
    }
    .stars {
      display: flex;
      justify-content: center;
      gap: 10px;
      font-size: 35px;
      cursor: pointer;
      margin-bottom: 20px;
    }
    .star {
      color: black; /* default black */
      transition: color 0.3s;
    }
    .star.gold {
      color: gold;
    }
    .btn-custom {
      background: #4A148C;
      color: white;
      font-weight: bold;
      border-radius: 8px;
      transition: 0.3s;
    }
    .btn-custom:hover {
      background: #6A1B9A;
      transform: scale(1.05);
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    footer {
      background: #004d40;
      color: white;
      text-align: center;
      padding: 12px;
      border-radius: 12px 12px 0 0;
      font-size: 14px;
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="content">
    <div class="card">
      <h3>💬 Feedback</h3>
      <?php if(isset($success)) echo "<div class='alert alert-success text-center'>$success</div>"; ?>
      <form method="POST">
        <div class="stars" id="starRating">
          <span class="star" data-value="1">&#9733;</span>
          <span class="star" data-value="2">&#9733;</span>
          <span class="star" data-value="3">&#9733;</span>
          <span class="star" data-value="4">&#9733;</span>
          <span class="star" data-value="5">&#9733;</span>
        </div>
        <!-- hidden input to store rating -->
        <input type="hidden" name="rating" id="rating" value="0">

        <div class="mb-3">
          <label>Your Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Message</label>
          <textarea name="message" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-custom w-100">Send Feedback</button>
      </form>
    </div>
  </div>

  <footer>
    <p>© 2025 E Clinic | Designed by <b>Rajan Kushwaha (Integral University Student)</b></p>
  </footer>

  <script>
    const stars = document.querySelectorAll(".star");
    const ratingInput = document.getElementById("rating");

    stars.forEach((star, index) => {
      star.addEventListener("click", () => {
        const rating = index + 1;
        ratingInput.value = rating;

        stars.forEach((s, i) => {
          if (i < rating) {
            s.classList.add("gold");
          } else {
            s.classList.remove("gold");
          }
        });
      });
    });
  </script>
</body>
</html>
