<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book a Trip</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }

    form {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input, button {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
    }

    button {
      background-color: #f37ffb;
      color: white;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <form method="POST" action="php/book_trip.php">
    <label for="number_of_people">Number of People:</label>
    <input type="number" id="number_of_people" name="number_of_people" required>

    <label for="booking_date">Booking Date:</label>
    <input type="date" id="booking_date" name="booking_date" required>

    <label for="package_id">Select Package ID:</label>
    <input type="number" id="package_id" name="package_id" required>

    <button type="submit">Book Now</button>
  </form>
</body>
</html>