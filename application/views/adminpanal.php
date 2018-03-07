<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Venture Café</title>
    <link rel="shortcut icon" href="https://venturecaferotterdam.org/wp-content/uploads/2017/03/favicon-1.gif?v=2">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

	
	<link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        color: #e06a26;
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
        hr{
            background-color:#e06a26  ;
            height:2px;
            padding-top:10px;
        }
        #fh5co-services-section,
        #fh5co-blog-section,
        #fh5co-client-section,
        #fh5co-work-section,
        #fh5co-main-services-section,
        #fh5co-about-section,
        #fh5co-contact-section {
        padding-top: 6em;
        }
        #fh5co-footer {
            padding: 7em 0;
            float: left;
            width: 100%;
            position: relative;
            background: #262626;
            padding-top:50px;
            }
            #headernav {
                display:inline-block;
                padding-top:50px;
                padding-right:0px;
            }
            #headerpic{
                display:inline-block;
                padding-top:40px;
                padding-right:350px;
            }
        #footerone{
            display:inline-block;
            padding-right:800px;
        
        }
        #footertow{
        display:inline-block;
        }
        #postid{
            padding-bottom:100px;
            padding-top:70px;
        }
        #scrollit{
            overflow: scroll;
            width: 600px;
            height:400px;
            /* padding-top:50px;
            padding-bottom:100px; */
            padding-left:100px;
            
            
        }
        #list-example{
            /* padding-top:100px;
            padding-bottom:100px; */
            padding-right:100px;
            
        }
        #container{
            padding-bottom:100px;
            padding-top:100px;
            
        }
        #buttonid{
            padding-right:100px;
        }
        #overviewid{
            padding-left:100px;
        
        }
    </style>
</head>
<body>
    <header>
        <table>
            <tr>
                <td>
		<div  id="headerpic">
			<a href="http://localhost"><img src="https://i.imgur.com/M6JQeoM.png"></a>
        </div class="buttonclass">
    </td><td>
        <div id="headernav">
            <button type="button" class="btn btn-outline-secondary">thuersday gathering</button>
            <button type="button" class="btn btn-outline-secondary">community</button>
            <button type="button" class="btn btn-outline-secondary">about us</button>
            <button type="button" class="btn btn-outline-secondary">contact us</button>
            <?php if (null === $this->session->userdata('is_logged_in')) { ?>
                <a href="register"><button type="button" class="btn btn-outline-secondary">login-register</button></a>
                <?php 
            } ?>
                <?php 
                if (null !== $this->session->userdata('is_logged_in')) { ?>
                    <a href="/editPostShow/<?= $this->session->userdata['id'] ?>"><button class="btn btn-outline-secondary">Account</button></a> 
                    <a href="/logout"><button class="btn btn-outline-secondary">Logout</button></a>
                    <?php if ($this->session->userdata('rank_id') < 2) { ?>
                        <a href="/adminpanel"><button class="btn btn-outline-secondary">Admin Panel</button></a>
                    <?php 
                }
            } ?>
            </div>  
        </td>
        </tr> 
        </table> 
	</header>
    <hr>
    <center>
        <div id="container">
            <table>
                <tr>
                <td id="buttonid">

                    <!-- TAB BUTTONS -->
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active btn btn-outline-secondary" id="v-pills-admin-overview-tab" data-toggle="pill" href="#v-pills-admin-overview" role="tab" aria-controls="v-pills-admin-overview" aria-selected="true">Admin Overview</a><br>
                        <a class="nav-link btn btn-outline-secondary" id="v-pills-userverify-tab" data-toggle="pill" href="#v-pills-userverify" role="tab" aria-controls="v-pills-userverify" aria-selected="false">User verification</a><br>
                        <a class="nav-link btn btn-outline-secondary" id="v-pills-postverify-tab" data-toggle="pill" href="#v-pills-postverify" role="tab" aria-controls="v-pills-postverify" aria-selected="false">Post verification</a><br>
                        <a class="nav-link btn btn-outline-secondary" id="v-pills-usermanage-tab" data-toggle="pill" href="#v-pills-usermanage" role="tab" aria-controls="v-pills-usermanage" aria-selected="false">User Management</a><br>
                        <a class="nav-link btn btn-outline-secondary" id="v-pills-postmanage-tab" data-toggle="pill" href="#v-pills-postmanage" role="tab" aria-controls="v-pills-postmanage" aria-selected="false">Post Management</a><br>
                    </div>
                </td>
                <td id="overviewid">
                    <div class="tab-content" id="v-pills-tabContent">

                        <!-- ADMIN OVERVIEW  -->
                        <div class="tab-pane fade show active" id="v-pills-admin-overview" role="tabpanel" aria-labelledby="v-pills-admin-overview-tab"> 
                            <h3><strong>Admin Overview</strong></h3>
                            <p>Welcome to the Admin Controle Panel. <br>
                            This is where you as the admin have controle <br> over the Users and their posts.
                            </p>
                            <h4><strong>Features</strong></h4>
                            <h5><strong>User Verification:</strong></h5>
                            <p>List of user that have registered and are <br> pending admin approval to be verified users.</p>
                            <h5><strong>Post Verification:</strong></h5>
                            <p>List of posts that have been posted by verified users, <br> that are pending admin approval.<br> The admin can decline(delete), <br> accept and/or edit the posts before approving.</p>
                            <h5><strong>User Management:</strong></h5>
                            <p>List of all verified users. <br> The admin can remove their accounts <br> here or adjust their password. <br> Additionally the Super admin can also <br> promote users to admin status and delete admin accounts. </p>
                        </div>


                        <!-- USER VERIFICATION -->
                        <div class="tab-pane fade" id="v-pills-userverify" role="tabpanel" aria-labelledby="v-pills-userverify-tab">
                            <h3><strong>User Verification</strong></h3>
                            <?php if (isset($usersv)) {
                                foreach ($usersv as $userv) { ?>
                                    <h5><strong>Company Name: &nbsp; </strong><?= $userv['comp_name'] ?></h5>
                                    <a href="/admin-verify-user/<?= $userv['id'] ?>"><button class="btn btn-secondary">Accept Company</button></a>
                                    <a href="/admin-delete-user/<?= $userv['id'] ?>"><button class="btn btn-secondary">Decline Company</button></a><br><br>
                            <?php  }} else { ?>
                            <h1><strong>No pending users to verify.</strong></h1>
                            <?php  } ?>
                        </div>

                        <!-- POST VERIFICATION -->
                        <div class="tab-pane fade" id="v-pills-postverify" role="tabpanel" aria-labelledby="v-pills-postverify-tab">
                            <h3><strong>Post Verification</strong></h3>
                            <?php if (isset($verify)) {
                                foreach ($verify as $newpost) { ?>
                                    <hr>
                                    <h5><strong>Posted by: &nbsp; </strong><?= $newpost['comp_name'] ?></h5>
                                    <h5><strong>Post Title: &nbsp; </strong><?= $newpost['title'] ?></h5>
                                    <p><?= $newpost['post'] ?></p>
                                    <a href="/admin-verify-post/<?= $newpost['id'] ?>"><button class="btn btn-secondary">Accept Post</button></a>
                                    <a href="/admin-delete-post/<?= $newpost['id'] ?>"><button class="btn btn-secondary">Decline Post</button></a>
                            <?php }} else { ?>
                            <h1><strong>No pending posts to verify.</strong></h1>
                            <?php } ?>
                        </div>

                        <!-- USER MANAGEMENT -->
                        <div class="tab-pane fade" id="v-pills-usermanage" role="tabpanel" aria-labelledby="v-pills-usermanage-tab">
                            <h3><strong>User Management</strong></h3>
                            <?php if(0 == $this->session->userdata('rank_id')){
                            if (isset($users)) {
                                foreach ($users as $user) { ?>
                                    <h5><strong>Company Name: &nbsp; </strong><?= $user['comp_name'] ?></h5>
                                    <a href="/superadmin-delete-user/<?= $user['id'] ?>"><button class="btn btn-secondary">Delete</button></a>
                                    <a href="/adminEditPostPage/<?= $user['id'] ?>"><button class="btn btn-secondary">Edit Info</button></a>
                                    <form action="/superadmin-rank-update/<?=$user['id']?>" method="POST">
                                        <select name="rank-update">
                                            <option value="0">Super Admin</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Users</option>
                                        </select>
                                        <input type="submit" value="Update" class="btn btn-secondary">
                                    </form><br><br>
                            <?php  }} else { ?>
                            <h1><strong>No users to Manage.</strong></h1>
                            <?php }} else {?>
                            <?php if (isset($usersna)) {
                                foreach ($usersna as $userna) { ?>
                                    <h5><strong>Company Name: &nbsp; </strong><?= $userna['comp_name'] ?></h5>
                                    <a href="/superadmin-delete-user/<?= $userna['id'] ?>"><button class="btn btn-secondary">Delete</button></a>
                                    <a href="/adminEditPostPage/<?= $userna['id'] ?>"><button class="btn btn-secondary">Edit Info</button></a>
                                    <br><br>
                            <?php  }} else { ?>
                            <h1><strong>No users to Manage.</strong></h1>
                            <?php }} ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-postmanage" role="tabpanel" aria-labelledby="v-pills-postmanage-tab">
                            <h3><strong>Post Management</strong></h3>
                        </div>
                    </div>
                </td>
            </table>
        </div>
    </center>
    
    <footer id="fh5co-footer" role="contentinfo">
      <div id="footerone">
        <a href="#"> Credo </a>&nbsp;&nbsp;&nbsp;
        <a href="#"> Support </a>&nbsp;&nbsp;&nbsp;
        <a href="#"> Contact </a>
      </div>
      <div id="footertow">
          <a href="#" class="fa fa-facebook"></a>&nbsp;&nbsp;&nbsp;
          <a href="#" class="fa fa-twitter"></a>&nbsp;&nbsp;&nbsp;
          <a href="#" class="fa fa-linkedin"></a>&nbsp;&nbsp;&nbsp;
          <a href="#" class="fa fa-instagram"></a>
          
      </div>
    </footer>
    </body>
</html>

