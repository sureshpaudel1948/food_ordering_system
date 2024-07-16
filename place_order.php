<?php
// Include the database configuration file
require_once "configuration.php";

// Define variables and initialize with empty values
$name = $email = $phone = $address = $orderdetails = "";
$name_err = $email_err = $phone_err = $address_err = $orderdetails_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate phone
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter your phone number.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    // Validate address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter your address.";
    } else {
        $address = trim($_POST["address"]);
    }

    // Validate order details
    if (empty(trim($_POST["order-details"]))) {
        $orderdetails_err = "Please enter the order details.";
    } else {
        $orderdetails = trim($_POST["order-details"]);
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($email_err) && empty($phone_err) && empty($address_err) && empty($orderdetails_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO placeorder (name, email, phone, address, orderdetails) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_email, $param_phone, $param_address, $param_orderdetails);

            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_phone = $phone;
            $param_address = $address;
            $param_orderdetails = $orderdetails;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to a confirmation page
                header("location: order_success.php");
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