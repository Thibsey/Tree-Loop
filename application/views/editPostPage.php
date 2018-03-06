<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit/Delete Post Page</title>
        <link rel="shortcut icon" href="https://venturecaferotterdam.org/wp-content/uploads/2017/03/favicon-1.gif?v=2">
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
        <br>
        <br>
        <a href="/postpage"><button>Post Job</button></a> 
        <br>
        <br>

        <h1>We are inside Edit/Delete Post &amp; Terminate account</h1>


        <?php if(isset($showIt))
        foreach ($showIt as $var) { ?>

        <form action="/editPost/<?=$var['id']?>" method="POST">
			<input type="text" name="title" value="<?= $var['title'] ?>" >
			<br>
			<br>
			<input type="text" name="post" value="<?= $var['post'] ?>">
			<br>
			<br>
			<input type="text" name="company_url" value="<?= $var['company_url'] ?>">
			<br>
			<br>
			<input type="hidden" name="id" value="<?= $var['id'] ?>">
			<br>
            <input type="submit" value="UPDATE" name="submit">
            <br>
            <br>
            <br>
		</form>
        <a href="/delete/<?=$var['id']?>"><button>DELETE</button></a>
        <br>
        <br>
    <?php }?>
	<a href="/deletePage"><button>DELETE ACCOUNT</button></a>
    

    </body>
</html>