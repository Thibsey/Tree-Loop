<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login and Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<div class="register">
			<h2>Register</h2>

            <?php if (isset($error)){
				echo $error; }?>

			
			<form action="register" method="POST">
				<input type="text" name="userName" placeholder="User Name">
				<br>
				<br>
                <input type="text" name="companyName" placeholder="Company Name">
				<br>
				<br>
				<input type="text" name="email" placeholder="Email">
				<br>
				<br>
                <input type="password" name="password" placeholder="Password">
                <br>
				<br>
                <input type="password" name="confirmPassword" placeholder="Confirm Password">
				<br>
				<br>
				<input type="text" name="contactAddress" placeholder="Contact Address">
				<br>
				<br>
				<input type="text" name="contactPhoneNumber" placeholder="Contact Phone Number">
				<br>
				<br>
                <input type="hidden" name="rankId" value="3">
				<input type="submit" vamue="Register">
			</form>
                <input type="text" name="email-login" placeholder="Email">
                <br>
				<br>
                <input type="password" name="password-login" placeholder="Password">
            <form action="login" method="POST"></form>
			
		</div>
</body>
</html>