<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php
session_start();

if (isset($_POST['submit'])) {

    if (empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['username'])) {
        echo "<script>alert('One or more inputs are empty');</script>";
    } else {

        if ($_POST['password'] == $_POST['confirm_password']) {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $username = $_POST['username'];
            $image = "user.png";


            $insert = $conn->prepare("INSERT INTO users(fullname, email, username, mypassword, image) VALUES(:fullname, :email, :username, :mypassword, :image)");
            $insert->execute([
                ":fullname" => $fullname,
                ":email" => $email,
                ":mypassword" => password_hash($password, PASSWORD_DEFAULT),
                ":username" => $username,
                ":image" => $image
            ]);

            $_SESSION['thank_you_message'] = "Thank you for registering! Please log in to continue.";
            header("Location: register_success.php");
            exit();
        } else {
            echo "<script>alert('Password does not match. Please enter the correct password.');</script>";
        }
    }
}
?>

<?php
if (isset($_POST['submit'])) {
    if (empty($_POST['email']) or empty($_POST['password'])) {
        echo "<script>alert('one or more inputs are empty')</script>";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];


        $login = $conn->query("SELECT * FROM users WHERE email='$email'");
        $login->execute();

        $fetch = $login->fetch(PDO::FETCH_ASSOC);


        if ($login->rowCount() > 0) {

            if (password_verify($password, $fetch['mypassword'])) {
                $_SESSION['username'] = $fetch['username'];
                $_SESSION['email'] = $fetch['email'];
                $_SESSION['user_id'] = $fetch['id'];
                $_SESSION['image'] = $fetch['image'];


                header("Location: ../CODE/index.php");
                exit();
            } else {
                echo "<script>alert('email or password is wrong')</script>";
            }
        } else {
            echo "<script>alert('email or password is wrong')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">


    <link rel="stylesheet" href="../CODE/login.css">

    <title>Responsive login and registration form - Bedimcode</title>
</head>

<body>

    <div class="login container grid" id="loginAccessRegister">

        <div class="login__access">
            <h1 class="login__title">Log in to your account.</h1>

            <div class="login__area">
                <form action="" method="POST" class="login__form">
                    <div class="login__content grid">
                        <div class="login__box">
                            <input type="email" id="email" name="email" required placeholder=" " class="login__input">
                            <label for="email" class="login__label">Email</label>
                            <i class="ri-mail-fill login__icon"></i>
                        </div>

                        <div class="login__box">
                            <input type="password" id="password" name="password" required placeholder=" "
                                class="login__input">
                            <label for="password" class="login__label">Password</label>
                            <i class="ri-eye-off-fill login__icon login__password" id="loginPassword"></i>
                        </div>
                    </div>

                    <a href="#" class="login__forgot">Forgot your password?</a>

                    <button type="submit" name="submit" class="login__button">Login</button>
                </form>

                <div class="login__social">
                    <p class="login__social-title">Or login with</p>

                    <div class="login__social-links">
                        <a href="#" class="login__social-link">
                            <img src="assets/img/icon-google.svg" alt="Google Login" class="login__social-img">
                        </a>
                        <a href="#" class="login__social-link">
                            <img src="assets/img/icon-facebook.svg" alt="Facebook Login" class="login__social-img">
                        </a>
                        <a href="#" class="login__social-link">
                            <img src="assets/img/icon-apple.svg" alt="Apple Login" class="login__social-img">
                        </a>
                    </div>
                </div>

                <p class="login__switch">
                    Don't have an account?
                    <button id="loginButtonRegister">Create Account</button>
                </p>

                <!-- Admin Login Link -->
                <div class="login__admin">
                    <p>Are you an Admin?
                        <a href="../Adminarea/login.php" class="login__admin-link">Admin Login</a>
                    </p>
                </div>
            </div>



        </div>


        <div class="login__register">
            <h1 class="login__title">Create new account.</h1>

            <div class="login__area">
                <form action="" method="POST" class="login__form">
                    <div class="login__content grid">
                        <div class="login__group grid">
                            <div class="login__box">
                                <input type="text" id="names" name="fullname" required placeholder=" "
                                    class="login__input">
                                <label for="names" class="login__label">Full Name</label>
                                <i class="ri-id-card-fill login__icon"></i>
                            </div>

                            <div class="login__box">
                                <input type="text" id="surnames" name="username" required placeholder=" "
                                    class="login__input">
                                <label for="surnames" class="login__label">User Name</label>
                                <i class="ri-id-card-fill login__icon"></i>
                            </div>
                        </div>

                        <div class="login__box">
                            <input type="email" id="emailCreate" name="email" required placeholder=" "
                                class="login__input">
                            <label for="emailCreate" class="login__label">Email</label>
                            <i class="ri-mail-fill login__icon"></i>
                        </div>

                        <div class="login__box">
                            <input type="password" id="passwordCreate" name="password" required placeholder=" "
                                class="login__input">
                            <label for="passwordCreate" class="login__label">Password</label>
                            <i class="ri-eye-off-fill login__icon login__password" id="loginPasswordCreate"></i>
                        </div>

                        <div class="login__box">
                            <input type="password" id="confirmPasswordCreate" name="confirm_password" required
                                placeholder=" " class="login__input">
                            <label for="confirmPasswordCreate" class="login__label">Confirm Password</label>
                            <i class="ri-eye-off-fill login__icon login__password" id="loginPasswordCreate"></i>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="login__button">Create account</button>
                </form>

                <p class="login__switch">
                    Already have an account?
                    <button id="loginButtonAccess">Log In</button>
                </p>
            </div>
        </div>

    </div>


    <script src="../CODE/script2.js"></script>
</body>

</html>