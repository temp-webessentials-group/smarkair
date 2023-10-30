<?php
$host = "localhost";
$username = "db_francci";
$password = "6S#BN%5sfg";
$dbname = "db_francci";

// Create a database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>User Admin</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">Smark Air</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="index.php">Air Quality</a></li>
							<li><a href="registration.html">User Registration</a></li>
							<li><a href="elements.html">Documentation</a></li>
						</ul>
						
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>User Reset</h1>
								</header>
								
								<?php

									if ($_SERVER["REQUEST_METHOD"] == "POST") {
									// Retrieve the user_id and the new password from the form
									$user_id = $_POST["user_id"];
									$new_password = $_POST["admin_new_password"];

									// Update the selected user's password in the database

									// Prepare the SQL statement
									$sql = "UPDATE user_info SET password=? WHERE user_id=?";
									$stmt = $conn->prepare($sql);

									if ($stmt) {
									// Bind parameters and execute the statement
									$stmt->bind_param("si", $new_password, $user_id);

									// Execute the statement
									if ($stmt->execute()) {
										echo "User's password has been successfully updated.";
										echo "Returning to admin page in 10 seconds...";
										sleep(10);

										// Redirect to 'admin.php' after the delay
										header('Location: admin.php');
										exit();
									} 
									else {
										echo "Error updating user's password: " . $stmt->error;
									}

									// Close the statement
        
									$stmt->close();
									} 
									else {
										echo "Error preparing the statement.";
									}	
								}
							?>

							



				

				<!-- Copyright -->
					<div id="copyright">
						<ul><li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>