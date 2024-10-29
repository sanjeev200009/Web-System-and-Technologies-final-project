<?php
session_start();
require 'config/dbconn.php';
include('includes/header.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_user'])) {

        $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $mypassword = password_hash($_POST['mypassword'], PASSWORD_DEFAULT);
        $image = isset($_POST['image']) ? mysqli_real_escape_string($con, $_POST['image']) : 'user.png';

        $query = "INSERT INTO USERS (fullname, email, username, mypassword, image) VALUES ('$fullname', '$email', '$username', '$mypassword', '$image')";
        mysqli_query($con, $query);
        $_SESSION['message'] = "User  added successfully!";
    } elseif (isset($_POST['update_user'])) {

        $id = $_POST['id'];
        $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $image = isset($_POST['image']) ? mysqli_real_escape_string($con, $_POST['image']) : 'user.png';

        $query = "UPDATE USERS SET fullname='$fullname', email='$email', username='$username', image='$image' WHERE id='$id'";
        mysqli_query($con, $query);
        $_SESSION['message'] = "User  updated successfully!";
    }
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM USERS WHERE id='$id'";
    mysqli_query($con, $query);
    $_SESSION['message'] = "User  deleted successfully!";
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


    <form method="POST" action="">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullname" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="mb-3">
            <label for="mypassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="mypassword" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image URL</label>
            <input type="text" class="form-control" name="image">
        </div>
        <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
    </form>

    <hr>


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
                    <td><img src="<?= $user['image']; ?>" alt="User Image" width="50"></td>
                    <td>
                        <a href="user_management.php?delete=<?= $user['id']; ?>" class="btn btn-danger">Delete</a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#updateModal<?= $user['id']; ?>">Update</button>

                        <!-- Update Modal -->
                        <div class="modal fade" id="updateModal<?= $user['id']; ?>" tabindex="-1"
                            aria-labelledby="updateModalLabel<?= $user['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel<?= $user['id']; ?>">Update User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="">
                                            <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Full Name</label>
                                                <input type="text" class="form-control" name="fullname"
                                                    value="<?= $user['fullname']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="<?= $user['email']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username"
                                                    value="<?= $user['username']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Image URL</label>
                                                <input type="text" class="form-control" name="image"
                                                    value="<?= $user['image']; ?>">
                                            </div>
                                            <button type="submit" name="update_user" class="btn btn-primary">Update
                                                User</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>