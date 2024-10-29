<?php
session_start();
include('includes/header.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey! </strong> <?= $_SESSION['message']; ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['message']);
                } ?>
                <div class="card">
                    <div class="card-heade">
                        <h4>Admins are login here</h4>
                    </div>
                    <div class="card-body">
                        <form action="functions/authcode.php" method="POST">


                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter your Email address">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter your Password">
                            </div>


                            <button type="submit" name="login_btn" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>