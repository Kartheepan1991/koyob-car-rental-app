<?php
require_once '../app/db.php';

$cars = $conn->query("SELECT * FROM cars");
?>
<html>
<head>
    <title>Koyob Car Rental Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }
        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            display: block;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        h1, h2 {
            text-align: center;
            margin-top: 20px;
        }
        .car-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
            gap: 20px;
        }
        .car-item {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            width: 220px;
            text-align: center;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
        }
        img {
            width: 200px;
            height: 130px;
            object-fit: cover;
            border-radius: 5px;
        }
        a.button {
            margin-top: 10px;
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
        }
        a.button:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="about.php">About Us</a>
    <a href="contact.php">Contact</a>
</div>

<!-- Page Content -->
<h1>Koyob Car Rental Service</h1>
<h2>Available Cars</h2>

<div class="car-grid">
<?php while($car = $cars->fetch_assoc()): ?>
    <div class="car-item">
        <strong><?php echo htmlspecialchars($car['car_name']); ?></strong><br><br>
        <?php if (!empty($car['image_url'])): ?>
            <img src="<?php echo htmlspecialchars($car['image_url']); ?>" alt="Car Image" /><br><br>
        <?php endif; ?>
        <p><strong>Price/Day:</strong> $<?php echo number_format($car['price_per_day'], 2); ?></p>
        <a class="button" href="book.php?car_id=<?php echo $car['id']; ?>">Book Now</a>
    </div>
<?php endwhile; ?>
</div>

<!-- Footer -->
<footer>
    &copy; 2025 Koyob Car Rental. All rights reserved.
</footer>

</body>
</html>

