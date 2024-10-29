<?php
session_start();
require 'config/dbconn.php';
include('includes/header.php');




if (isset($_GET['delete'])) {
    $id = $_GET['delete'];


    $stmt = $con->prepare("DELETE FROM USERS WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "User  deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting user: " . $stmt->error;
    }

    $stmt->close();
}

$query = "SELECT * FROM USERS";
$result = mysqli_query($con, $query);
?>

<div class="container mt-5">
    <h2>User Management</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['message'];
            unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>



    <h3>Existing Users</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['fullname']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><img src="<?= $user['image']; ?>" alt="User  Image" width="50"></td>
                    <td>
                        <a href="user_management.php?delete=<?= $user['id']; ?>" class="btn btn-danger">Delete</a>

                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>