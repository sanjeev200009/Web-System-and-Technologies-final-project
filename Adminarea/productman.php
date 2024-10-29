<?php
session_start();
require 'config/dbconn.php';
include('includes/header.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['add_category'])) {

        $name = mysqli_real_escape_string($con, $_POST['name']);
        $description = mysqli_real_escape_string($con, $_POST['description']);

        $query = "INSERT INTO Categories (name, description) VALUES ('$name', '$description')";
        if (mysqli_query($con, $query)) {
            $_SESSION['message'] = "Category added successfully!";
        } else {
            $_SESSION['message'] = "Error adding category: " . mysqli_error($con);
        }
    } elseif (isset($_POST['update_category'])) {

        $id = $_POST['id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $description = mysqli_real_escape_string($con, $_POST['description']);

        $query = "UPDATE Categories SET name='$name', description='$description' WHERE id='$id'";
        if (mysqli_query($con, $query)) {
            $_SESSION['message'] = "Category updated successfully!";
        } else {
            $_SESSION['message'] = "Error updating category: " . mysqli_error($con);
        }
    }


    if (isset($_POST['add_product'])) {
        // Create Product
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $price = mysqli_real_escape_string($con, $_POST['price']);
        $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

        $query = "INSERT INTO Products (name, description, price, category_id) VALUES ('$name', '$description', '$price', '$category_id')";
        if (mysqli_query($con, $query)) {
            $_SESSION['message'] = "Product added successfully!";
        } else {
            $_SESSION['message'] = "Error adding product: " . mysqli_error($con);
        }
    }
}


if (isset($_GET['delete_category'])) {
    $id = $_GET['delete_category'];
    $query = "DELETE FROM Categories WHERE id='$id'";
    if (mysqli_query($con, $query)) {
        $_SESSION['message'] = "Category deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting category: " . mysqli_error($con);
    }
} elseif (isset($_GET['delete_product'])) {
    $id = $_GET['delete_product'];
    $query = "DELETE FROM Products WHERE id='$id'";
    if (mysqli_query($con, $query)) {
        $_SESSION['message'] = "Product deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting product: " . mysqli_error($con);
    }
}


$category_query = "SELECT * FROM Categories";
$categories = mysqli_query($con, $category_query);


$product_query = "SELECT Products.*, Categories.name AS category_name FROM Products LEFT JOIN Categories ON Products.category_id = Categories.id";
$products = mysqli_query($con, $product_query);
?>

<div class="container mt-5">
    <h2>Category Management</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['message'];
            unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>


    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="add_category">Add Category</button>
    </form>


    <h3>Existing Categories</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions </th>
            </tr>
        </thead>
        <tbody>
            <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                <tr>
                    <td><?= $category['id']; ?></td>
                    <td><?= $category['name']; ?></td>
                    <td><?= $category['description']; ?></td>
                    <td>
                        <a href="productman.php?delete_category=<?= $category['id']; ?>" class="btn btn-danger">Delete</a>

                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Product Management</h2>


    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <?php
                $category_query = "SELECT * FROM Categories";
                $categories = mysqli_query($con, $category_query);
                while ($category = mysqli_fetch_assoc($categories)): ?>
                    <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
    </form>


    <h3>Existing Products</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($product = mysqli_fetch_assoc($products)): ?>
                <tr>
                    <td><?= $product['id']; ?></td>
                    <td><?= $product['name']; ?></td>
                    <td><?= $product['description']; ?></td>
                    <td><?= $product['price']; ?></td>
                    <td><?= $product['category_name']; ?></td>
                    <td>
                        <a href="productman.php?delete_product=<?= $product['id']; ?>" class="btn btn-danger">Delete</a>
                        <!-- Update button and modal code... -->
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>