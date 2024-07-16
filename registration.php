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
                <a href="registration.php">A2RS</a>
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
    // Include config file
    require_once "configuration.php";

    // Define variables and initialize with empty values
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validate username
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a username.";
        } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
            $username_err = "Username can only contain letters, numbers, and underscores.";
        } else {
            // Prepare a select statement
            $sql = "SELECT id FROM foodusers WHERE username = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = trim($_POST["username"]);

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $username_err = "This username is already taken.";
                    } else {
                        $username = trim($_POST["username"]);
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

        // Validate password
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have atleast 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate confirm password
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm password.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Password did not match.";
            }
        }

        // Check input errors before inserting in database
        if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

            // Prepare an insert statement
            $sql = "INSERT INTO foodusers (username, password) VALUES (?, ?)";

            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                // Set parameters
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header("location: login.php");
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
            <h1>Welcome to the A2RS Registration Portal</h1>
        </div>
    </main>

    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
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
                    class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password"
                    class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="submit-button" value="Submit">
                <!-- <input type="reset" class="reset-button" value="Reset"> -->
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
        <style>
        body {
            font-family: 'Jomhuria', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .login-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
        }

        .menu-toggle {
            display: none;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .wrapper h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .submit-button {
            background-color: #000000;
            color: #f7d437;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            width: calc(100% - 20px);
        }

        .submit-button:hover {
            background-color: #f7d437;
            color: #000000;
        }

        .btn-secondary {
            background: #6c757d;
            color: #fff;
            width: 25%;
        }

        .invalid-feedback {
            color: red;
            font-size: 0.875em;
        }

        .main-content {
            text-align: center;
            padding: 50px 0;
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