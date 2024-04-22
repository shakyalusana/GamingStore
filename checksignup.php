<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "store";
$tbl_name = "khelum";

// Connect to server and select database.
$conn = mysqli_connect($host, $username, $password, $db_name);
if (!$conn) {
    die('Could not connect to MySQL Server');
}

// Get username and password from form.
$myusername = $_POST['email'];
$mypassword = $_POST['password'];

// Sanitize user inputs to prevent SQL injection.
$myusername = mysqli_real_escape_string($conn, $myusername);

// Query to check user credentials using prepared statement.
$mysql = "SELECT * FROM $tbl_name WHERE email=? LIMIT 1";
$stmt = mysqli_prepare($conn, $mysql);
mysqli_stmt_bind_param($stmt, "s", $myusername);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if the query was successful.
if ($result) {
    // Get the row from the result set.
    $row = mysqli_fetch_assoc($result);
    
    // Check if the password matches.
    if ($row && password_verify($mypassword, $row['password'])) {
        // Start session and store user credentials.
        session_start();
        $_SESSION['email'] = $myusername;
        $_SESSION['password'] = $row['password']; // Store hashed password in session for consistency.
        header("location: index.html");
        exit(); // Always exit after header redirection.
    } else {
        echo "Wrong Username or Password";
    }
} else {
    // Handle query error.
    echo "Error: Could not execute query";
}

// Close database connection.
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
