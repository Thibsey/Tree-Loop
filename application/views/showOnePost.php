<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Show One Page</title>
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
        <h2>Show One Page</h2>

    </body>
</html>