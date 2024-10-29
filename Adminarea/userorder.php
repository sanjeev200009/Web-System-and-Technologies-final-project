<?php
session_start();
require 'config/dbconn.php';
include('includes/header.php');


$order_query = "SELECT * FROM orders ORDER BY created_at DESC";
$orders = mysqli_query($con, $order_query);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">User Orders Management</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['message'];
            unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>


    <div class="row">
        <?php while ($order = mysqli_fetch_assoc($orders)): ?>
            <div class="col-md-4 mb-4">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title">Order ID: <?= $order['id']; ?></h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Customer Details</h6>
                        <p><strong>Name:</strong> <?= $order['name']; ?></p>
                        <p><strong>Address:</strong> <?= $order['address']; ?></p>
                        <p><strong>City:</strong> <?= $order['city']; ?></p>
                        <p><strong>State:</strong> <?= $order['state']; ?></p>
                        <p><strong>Zip:</strong> <?= $order['zip']; ?></p>
                        <p><strong>Payment Method:</strong> <?= $order['payment_method']; ?></p>
                        <p><strong>Total Price:</strong> $<?= number_format($order['total_price'], 2); ?></p>
                        <p><strong>Order Date:</strong> <?= date('Y-m-d H:i:s', strtotime($order['created_at'])); ?></p>
                        <h6 class="card-subtitle mb-2 text-muted">Items</h6>
                        <p><?= nl2br(htmlspecialchars($order['items'])); ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="order_details.php?id=<?= $order['id']; ?>" class="btn btn-info">View Details</a>
                        <a href="order_management.php?delete_order=<?= $order['id']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>