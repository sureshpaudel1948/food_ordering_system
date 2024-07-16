<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="favicon" href="img/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Food Ordering System</title>
</head>


<body>
    <header class="navbar">
        <div class="header">
            <div class="logo">
                <a href="login.php">A2RS</a>
            </div>
            <div class="nav" id="nav">
                <ul>
                    <li><a class="nav-link nav-link-ltr" href="#dishes">DISHES</a></li>
                    <li><a class="nav-link nav-link-ltr" href="#deserts">DESERTS</a></li>
                    <li><a class="nav-link nav-link-ltr" href="#drinks">DRINKS</a></li>
                    <li><a class="nav-link nav-link-ltr" href="#order">ORDER</a></li>
                    <li><a href="login.php" class="login">Sign In</a></li>
                    <li><a href="#"></a> <i class='bx bxs-cart-add'></i></li>
                </ul>
            </div>
            <div class="menu-toggle" id="menu-toggle">
                <i class="fa fa-bars" aria-hidden="true" class="burger"></i>
            </div>
        </div>
    </header>

    <?php
    // Initialize the session
    session_start();

    // Check if the user is already logged in, if yes then redirect him to welcome page
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: index.php");
        exit;
    }

    // Include config file
    require_once "configuration.php";

    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = $login_err = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Check if username is empty
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter username.";
        } else {
            $username = trim($_POST["username"]);
        }

        // Check if password is empty
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate credentials
        if (empty($username_err) && empty($password_err)) {
            // Prepare a select statement
            $sql = "SELECT id, username, password FROM foodusers WHERE username = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = $username;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify password
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {
                                // Password is correct, so start a new session
                                session_start();

                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;

                                // Redirect user to welcome page
                                header("location: index.php");
                            } else {
                                // Password is not valid, display a generic error message
                                $login_err = "Invalid username or password.";
                            }
                        }
                    } else {
                        // Username doesn't exist, display a generic error message
                        $login_err = "Invalid username or password.";
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

        // Close connection
        mysqli_close($link);
    }
    ?>

    <main class="main-content">
        <div class="container">
            <h1>Login to enjoy our delicious meal</h1>
            <h4>Thanks for registration, now proceed for login!</h4>
        </div>
    </main>

    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username"
                    class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"
                    class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a class="lastbtn" href="registration.php">Sign up now</a>.</p>
        </form>
        <style>
        body {
            font: 14px;
            font-family: "Jomhuria", serif;
        }

        .main-content {
            text-align: center;
            padding: 50px 20px;
        }

        .main-content .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .wrapper {
            background: #fff;
            padding: 20px;
            margin: 0 auto;
            width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 50px;
        }

        .wrapper h2 {
            text-align: center;
            color: #000000;
        }

        .wrapper p {
            text-align: center;
            color: #555;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            color: #000000;
            margin-bottom: 5px;
        }

        .form-group input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-left: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn {
            background-color: #000000;
            color: #f7d437;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            width: calc(100% - 20px);
            margin-left: 10px;
            margin-right: 10px;
        }

        .btn:hover {
            background-color: #f7d437;
            color: #000000;
        }

        .lastbtn {
            color: #000000;
            text-decoration: none;
        }

        .lastbtn:hover {
            color: #f7d437;
            text-decoration: underline;
        }
        </style>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-row">
                <div class="footer-col">
                    <h4>A2RS Foods</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Affiliate Program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#dishes">Dishes</a></li>
                        <li><a href="#deserts">Deserts</a></li>
                        <li><a href="#drinks">Drinks</a></li>
                        <li><a href="#order">Order</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact Us</h4>
                    <ul>
                        <li><a href="#">Email: contact@a2rsfoods.com</a></li>
                        <li><a href="#">Phone: +9779841250107</a></li>
                        <li><a href="#">Address: 123 Food Street, Flavor Town</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="#"><i class='bx bxl-facebook'></i></a>
                        <a href="#"><i class='bx bxl-twitter'></i></a>
                        <a href="#"><i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 A2RS Foods. All Rights Reserved.</p>
        </div>
    </footer>

</body>

</html>