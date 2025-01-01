<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="stylesheet" href="style.css">

</head>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }

    table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #f4f4f4;
    }

    button {
      padding: 5px 10px;
      background-color: #f3c6ec;
      color: white;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #f7c5df;
    }
  </style>
</head>
<body>
  <h1 style="text-align:center;">Cart</h1>
  <table>
    <thead>
      <tr>
        <th>Package ID</th>
        <th>Quantity</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="cartItems">
      <!-- Cart items will be dynamically populated -->
    </tbody>
  </table>
</body>
</html>