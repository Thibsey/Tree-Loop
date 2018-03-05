<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>We are inside DELETE Page</h1>
    <br>
   <h2>Are you sure you want to delete your account?</h2>
   <br>
    </div>
    <div class="DeleteUserButton">
        <a href="/deleteUser/<?= $this->session->userdata['id'] ?>"><button>DELETE</button></a> 
    
    </div>
    <a href="/index"><button>Back to Home Page</button></a> 


</body>
</html>



