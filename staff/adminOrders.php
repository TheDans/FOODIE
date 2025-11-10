<?php
session_start();
include("adminconnection.php");

if (!isset($_SESSION["userlogged"]) || $_SESSION["userlogged"] != 1) {
  header("location: /FOODIE/landing-page/index.html");
  exit();
}

// Query orders with total price & quantity
$adminID = $_SESSION['adminID']; // or whatever your session variable is

$sql = "
  SELECT 
    o.orderID,
    o.orderDate,
    o.deliveryDate,
    CONCAT(o.dormLevel, '-', o.dormNo, ' ', b.buildingName) AS dorm_info,
    SUM(od.quantity) AS totalQty,
    SUM(p.price * od.quantity) AS totalPrice
  FROM orders o
  JOIN buildings b ON o.buildingID = b.buildingID
  JOIN orderdetails od ON o.orderID = od.orderID
  JOIN products p ON od.prodID = p.prodID
  WHERE o.adminID = '$adminID'         
  GROUP BY o.orderID
  ORDER BY o.orderDate DESC
";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="adminOrders.css" />
  <title>Orders</title>
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="logo-container">
        <div class="logo">FOODIE.</div>
      </div>
      <nav class="nav-menu">
        <a href="adminDashboard.php" class="nav-item">DASHBOARD</a>
        <a href="adminSuper.php" class="nav-item">SUPER ADMINS</a>
        <a href="adminProducts.php" class="nav-item">PRODUCTS</a>
        <a href="adminAddProduct.php" class="nav-item">ADD PRODUCTS</a>
        <a href="adminOrders.php" class="nav-item active">ORDERS</a>
        <a href="/FOODIE/staff/logout.php" class="nav-item">LOG OUT</a>
      </nav>
    </aside>

    <main class="main-content">
      <header class="header-title">ORDERS</header>

      <section class="info-section">
        <h3 class="section-title">Orders that are linked to each admin</h3>
        <table>
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Order Date</th>
              <th>Delivery Date</th>
              <th>Dorm Info</th>
              <th>Total Quantity</th>
              <th>Total Price (RM)</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
              <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                  <td><?= $row["orderID"] ?></td>
                  <td><?= $row["orderDate"] ?></td>
                  <td><?= $row["deliveryDate"] ?></td>
                  <td><?= $row["dorm_info"] ?></td>
                  <td><?= $row["totalQty"] ?></td>
                  <td><?= number_format($row["totalPrice"], 2) ?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr><td colspan="6">No orders found.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </section>

    </main>
  </div>
</body>
</html>
