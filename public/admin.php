<?php
require_once '../app/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $car_name = $_POST['car_name'];
    $image_url = $_POST['image_url'];
    $price_per_day = $_POST['price_per_day'];

    $stmt = $conn->prepare("INSERT INTO cars (car_name, image_url, price_per_day) VALUES (?, ?, ?)");
    $stmt->bind_param('ssd', $car_name, $image_url, $price_per_day); // 'ssd' = string, string, double
    $stmt->execute();

    echo "Car added successfully! <a href='index.php'>Go back to Home</a>";
    exit;
}
?>
<html>
<head>
    <title>Add New Car</title>
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

<h1 style="text-align:center;">Add a New Car</h1>

<form method="post">
    <label>Car Name:</label>
    <input type="text" name="car_name" required>

    <label>Image URL (from S3):</label>
    <input type="text" name="image_url" required>

    <label>Price Per Day ($):</label>
    <input type="number" name="price_per_day" step="0.01" required>

    <button type="submit">Add Car</button>
</form>

</body>
</html>

