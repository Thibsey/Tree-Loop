<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Post Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
    </head>
    <body>
    <div class="logout_button">

		<?php 
			if(null !== $this->session->userdata('is_logged_in')){ ?>
			<a href="/logout"><button>Logout</button></a> 
			<?php } ?>
	</div>
    <a href="/register"><button>Register</button></a> 
        <h1>Post a Job Offer</h1>

             <?php 
				if (isset($errors)) {
		    	echo $errors; }
			?>

        <div>
            <form action="/postjob" method="POST">
                <input type="text" name="title" placeholder="Job Title">
                <br>
                <br>
                <input type="text" name="description" placeholder="Job Description">
                <br>
                <br>
                <input type="text" name="company-url" placeholder="Link to Original Offer">
                <input type="hidden" name="verify" value="0">
                <input type="hidden" name="id" value="<?= $this->session->userdata('id')?>">
                <!-- <br>
                <br>
                <input type="text" name="contact" placeholder="Contact"> -->
                <br>
                <br>
                <input type="submit" value="Post">
            </form>
        </div>
    </body>
</html>











