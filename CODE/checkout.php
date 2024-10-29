<?php
require_once '../config/config.php';

$responseMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $zip = htmlspecialchars($_POST['zip']);
    $payment_method = htmlspecialchars($_POST['payment']);

    $items = isset($_POST['items']) ? $_POST['items'] : json_encode([]);
    $total_price = 2700.00;

    try {
        $sql = "INSERT INTO orders (name, address, city, state, zip, payment_method, total_price, items) 
                VALUES (:name, :address, :city, :state, :zip, :payment_method, :total_price, :items)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':zip', $zip);
        $stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':total_price', $total_price);
        $stmt->bindParam(':items', $items);

        $stmt->execute();

        $responseMessage = "Order placed successfully!";
    } catch (PDOException $e) {
        $responseMessage = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop Store Checkout</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .checkout-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .checkout-container h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .checkout-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
        }

        .checkout-item span {
            color: #555;
        }

        .total-price {
            font-weight: bold;
            color: #333;
            text-align: right;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-top: 10px;
            color: #333;
            font-weight: bold;
        }

        form input,
        form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .confirm-btn {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            border: none;
            color: #ffffff;
            font-weight: bold;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .confirm-btn:hover {
            background-color: #0056b3;
        }

        .success-message {
            display:
                <?= $responseMessage ? 'block' : 'none'; ?>
            ;
            text-align: center;
            padding: 20px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="checkout-container ">
        <h2>Checkout</h2>

        <div class="checkout-item">
            <span>Laptop Model A</span>
            <span>$1200</span>
        </div>
        <div class="checkout-item">
            <span>Laptop Model B</span>
            <span>$1500</span>
        </div>

        <div class="total-price">
            Total: $2700
        </div>

        <div class="success-message" id="successMessage">
            <?= $responseMessage; ?>
        </div>

        <form id="checkoutForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Shipping Address</label>
            <input type="text" id="address" name="address" required>

            <label for="city">City</label>
            <input type="text" id="city" name="city" required>

            <label for="state">State</label>
            <input type="text" id="state" name="state" required>

            <label for="zip">ZIP Code</label>
            <input type="text" id="zip" name="zip" required>

            <label for="payment">Payment Method</label>
            <select id="payment" name="payment" required>
                <option value="credit">Credit Card</option>
                <option value="debit">Debit Card</option>
                <option value="paypal">PayPal</option>
            </select>

            <button type="submit" class="confirm-btn">Confirm Order</button>
        </form>
    </div>
</body>

</html>