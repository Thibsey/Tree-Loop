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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="main.js"></script>
</head>
<style>
body {
  font-family: "Roboto", Arial, sans-serif;
  font-weight: 400;
  font-size: 16px;
  line-height: 1.7;
  color: #7f7f7f;
  background: #fff;
  height: 100%;
  position: relative;
  text-align:center;
}
a {
  color: #1FB57B;
  -webkit-transition: 0.5s;
  -o-transition: 0.5s;
  transition: 0.5s;
}

p {
  margin-bottom: 30px;
  font-size: 18px;
  font-weight: 400;
}
h1, h2, h3, h4, h5, h6, figure {
  color: rgba(0, 0, 0, 0.7);
  font-family: "Playfair Display", Arial, serif;
  font-weight: 400;
  margin: 0 0 30px 0;
  letter-spacing: 1px;
}
.buttonclass{
    padding-top:50px;
}
#fh5co-footer {
  padding: 7em 0;
  float: left;
  width: 100%;
  position: relative;
  background: #262626;
}
#headernav {
    display:inline-block;
    padding-top:0px;
    padding-right:0px;
}
#headerpic{
    display:inline-block;
    padding-top:40px;
    padding-right:350px;
}
#loginid{
	padding-left:500px;
}
#registerid{
	padding-left:300px;
	padding-top:50px;
}
hr{
	background-color:#566573  ;
	height:20px;
}

</style>
<body>
<header>
		<div  id="headerpic">
			<img src="https://i.imgur.com/M6JQeoM.png">
    </div class="buttonclass">
    <div id="headernav">
            <button type="button" class="btn btn-outline-secondary">thuersday gathering</button>
            <button type="button" class="btn btn-outline-secondary">international</button>
            <button type="button" class="btn btn-outline-secondary">community</button>
            <button type="button" class="btn btn-outline-secondary">about us</button>
            <button type="button" class="btn btn-outline-secondary">contact us</button>
            <a href="register"><button type="button" class="btn btn-outline-secondary">login-register</button></a>
            
		</div>
		<hr>
		
	</header>
	<table>
	
	<div class="logout_button">

		<?php 
			if(null !== $this->session->userdata('is_logged_in')){ ?>
			<a href="/logout"><button>Logout</button></a> 
			<?php } ?>
	</div>
	<tr>
	<td id="registerid">
	<div class="register">

			<h2>Register</h2>

            <?php if (isset($error)){
				echo $error; }?>

			
            <form action="register" method="POST">
			<input type="text" class="form-control" name="userName" placeholder="User Name">
				<br>
				<br>
                <input type="text" class="form-control" name="companyName" placeholder="Company Name">
				<br>
				<br>
				<input type="text" class="form-control" name="email" placeholder="Email">
				<br>
				<br>
                <input type="password" class="form-control" name="password" placeholder="Password">
                <br>
				<br>
                <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password">
				<br>
				<br>
				<input type="text" class="form-control" name="contactAddress" placeholder="Contact Address">
				<br>
				<br>
				<input type="text" class="form-control" name="contactPhoneNumber" placeholder="Contact Phone Number">
				<br>
				<br>
                <input type="hidden" name="rankId" value="3">

			<input type="submit" class="btn btn-secondary" vamue="Register">
			


			
			</form>
		</div>
		</td>
		<td id="loginid">
		
		<div class="login">
			

			<h2>Login</h2>

			<?php if(isset($logerror))
			{ echo $logerror; } ?>

			<form action="login" method="POST">
				<input type="text" class="form-control" name="email-login" placeholder="Email">
				<br>
				<br>
				<input type="password" class="form-control" name="password-login" placeholder="Password">
				<br>
				<br>
				<input type="submit" class="btn btn-secondary" value="Login">
			</form>
		</div>
		</td>	
		</tr>
		</table>

		<footer id="fh5co-footer" role="contentinfo">
	
	
	</footer>
</body>
</html>