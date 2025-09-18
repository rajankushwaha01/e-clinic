<?php
session_start();
include('config.php');

// agar login nahi hai to login.php bhejo
if (!isset($_SESSION['email'])) {
    $_SESSION['redirect_url'] = "appointment.php"; 
    header("Location: login.php");
    exit();
}

// patient ki details nikaalo
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT id, name FROM patients WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$patient = $result->fetch_assoc();

if (!$patient) {
    echo "<script>alert('Please register first!');window.location='register.php';</script>";
    exit();
}

$patient_id = $patient['id'];
$patient_name = $patient['name'];

// appointment form submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $note = $_POST['note'];

    $stmt = $conn->prepare("INSERT INTO appointments (patient_id, doctor, appointment_date, appointment_time, note) 
                            VALUES (?,?,?,?,?)");
    $stmt->bind_param("issss", $patient_id, $doctor, $date, $time, $note);

    if ($stmt->execute()) {
        $success = "✅ Appointment booked successfully!";
    } else {
        $error = "❌ Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
        }
        .container {
            max-width: 500px;
            margin: 60px auto;
            padding: 25px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #004d40;
        }
        label {
            display: block;
            margin: 8px 0 5px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            background: #004d40;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #00796b;
        }
        .msg {
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
<div class="container">
    <h2>Book Appointment</h2>
    <?php if(isset($success)) echo "<p class='msg success'>$success</p>"; ?>
    <?php if(isset($error)) echo "<p class='msg error'>$error</p>"; ?>

    <form method="POST">
        <label>Patient ID</label>
        <input type="text" value="<?php echo $patient_id; ?>" readonly>

        <label>Patient Name</label>
        <input type="text" value="<?php echo $patient_name; ?>" readonly>

        <label>Select Doctor</label>
        <select name="doctor" required>
            <option value="Dr. Kasim Ali Azami">Dr. Kasim Ali Azami (Surgeon)</option>
            <option value="Dr. Ahsanullah Azami">Dr. Ahsanullah Azami (D.Pharm)</option>
            <option value="Dr. Akramullah Azami">Dr. Akramullah Azami (BUMS)</option>
        </select>

        <label>Appointment Date</label>
        <input type="date" name="date" required>

        <label>Appointment Time</label>
        <input type="time" name="time" required>

        <label>Note</label>
        <textarea name="note"></textarea>

        <button type="submit">Book Appointment</button>
    </form>
</div>
</body>
</html>
