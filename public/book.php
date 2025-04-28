<?php
require_once '../app/db.php';

// Fetch car details
if (isset($_GET['car_id'])) {
    $car_id = intval($_GET['car_id']);
    $car = $conn->query("SELECT * FROM cars WHERE id = $car_id")->fetch_assoc();
}

// When form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $car_id = intval($_POST['car_id']);
    $customer_name = $_POST['customer_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Calculate number of days
    $start = new DateTime($start_date);
    $end = new DateTime($end_date);
    $days = $start->diff($end)->days;
    if ($days == 0) { $days = 1; } // Minimum 1 day rental

    // Fetch car price again to calculate total
    $car = $conn->query("SELECT * FROM cars WHERE id = $car_id")->fetch_assoc();
    $price_per_day = $car['price_per_day'];
    $total_price = $price_per_day * $days;

    // Here normally you insert into bookings table, but now just display

    echo "<h2>Booking Successful!</h2>";
    echo "<p><strong>Name:</strong> " . htmlspecialchars($customer_name) . "</p>";
    echo "<p><strong>Car:</strong> " . htmlspecialchars($car['car_name']) . "</p>";
    echo "<p><strong>Start Date:</strong> " . htmlspecialchars($start_date) . "</p>";
    echo "<p><strong>End Date:</strong> " . htmlspecialchars($end_date) . "</p>";
    echo "<p><strong>Price per Day:</strong> $" . htmlspecialchars($price_per_day) . "</p>";
    echo "<p><strong>Total Rental Cost:</strong> $" . htmlspecialchars($total_price) . "</p>";
    echo '<a href="index.php">Back to Home</a>';
    exit;
}
?>

<html>
<head>
    <title>Book Car</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1 style="text-align:center;">Book Your Car</h1>

<form method="post">
    <input type="hidden" name="car_id" value="<?php echo $car_id; ?>" />

    <label>Your Name:</label>
    <input type="text" name="customer_name" required>

    <label>Start Date:</label>
    <input type="date" name="start_date" required>

    <label>End Date:</label>
    <input type="date" name="end_date" required>

    <button type="submit">Book Now</button>
</form>

</body>
</html>
