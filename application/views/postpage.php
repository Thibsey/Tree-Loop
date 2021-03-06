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
            font-size:25px;
            font-family:"gotham medium", Arial, sans-serif;
            }
    
            p {
            margin-bottom: 30px;
            font-size: 18px;
            font-weight: 400;
            }
            h2, h3, h4, h5, h6, figure {
            color: rgba(0, 0, 0, 0.7);
            font-family: "gotham book", Arial, sans-serif;
            font-weight: 400;
            margin: 0 0 30px 0;
            letter-spacing: 1px;
            }
            h1 {
            color: rgba(0, 0, 0, 0.7);
            font-family: "gotham light", Arial, sans-serif;
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
        
    
            #postid{
                padding-bottom:100px;
                padding-top:70px;
            }
            #fh5co-footer {
                padding: 7em 0;
                float: left;
                width: 100%;
                position: relative;
                background: #262626;
                padding-top:50px;
                height:200px;
                }
                
               #footerone{
                    padding-left:35px;
                    padding-top:20px;
                
                }
                #footerimg{
                    padding-right:320px;
                    padding-left:320px;
                    padding-top:20px;
                   
                }
                #footertow{
                    padding-top:20px;
                    padding-top:50px;
        
                }

    </style>
</head>
<body>
    <header>
    <table>
    <tr>
    <td>
		<div  id="headerpic">
			<a href="/index"><img src="https://i.imgur.com/M6JQeoM.png"></a>
        </div class="buttonclass">
        </td><td>
        <div id="headernav">
            <button type="button" class="btn btn-outline-secondary">thuersday gathering</button>
            <button type="button" class="btn btn-outline-secondary">about us</button>
            <button type="button" class="btn btn-outline-secondary">contact us</button>
            <a href="login"><button type="button" class="btn btn-outline-secondary">login-register</button></a>
            <?php if (null === $this->session->userdata('is_logged_in')) { ?>
            <a href="register"><button type="button" class="btn btn-outline-secondary">login-register</button></a>
            <?php  } ?>
            <?php if (null !== $this->session->userdata('is_logged_in')) { ?>
                <a href="/editPostShow/<?= $this->session->userdata['id'] ?>"><button class="btn btn-outline-secondary">Account</button></a> 
                <a href="/logout"><button class="btn btn-outline-secondary">Logout</button></a>
                <?php if ($this->session->userdata('rank_id') < 2) { ?>
                        <a href="/adminpanel"><button class="btn btn-outline-secondary">Admin Panel</button></a>
            <?php }} ?>
            </div>
            </td>
            </tr>
            </table>
	</header>
    <hr>
        <h1>Post a Job Offer</h1>

             <?php if (isset($errors)) {echo $errors; }?>

        <div id="postid">
            <form action="/postjob" method="POST">
                <i>Job Title</i>
                <br>
                <input type="text" name="title" placeholder="Job Title">
                <br>
                <br>
                <i>Company Logo:</i>
                <br>
                <input type="text" name="imgurl" placeholder="Img URL">
                <br>
                <br>
                <i>Job Description:</i>
                <br>
                <textarea name="description" id="" placeholder="500 Characters Max" rows="6" cols="60"></textarea>
                <br>
                <br>
                <i>End Date:</i>
                <br>
                <input type="date" name="enddate" class="col-2 col-form-label">
                <br>
                <br>
                <i>Language Requirement:</i>
                <br>
                <input type="text" name="lanreq" placeholder="" class="col-2 col-form-label">
                <br>
                <br>
                <i>Original Job Offer:</i>
                <br>
                <input type="text" name="company-url" placeholder="Link to Offer" class="col-2 col-form-label">
                <input type="hidden" name="verify" value="0">
                <input type="hidden" name="id" value="<?= $this->session->userdata('id')?>">
                <br>
                <br>
                <select name="tag1">
                    <option value="">Tags</option>
                    <?php if (isset($tags)) { ?>
                        <?php foreach ($tags as $option) { ?>
                            <option value="<?= $option['id'] ?>"><?= $option['tag'] ?></option>
                    <?php }} ?>
                </select>
                <select name="tag2">
                    <option value="">Tags</option>
                    <?php if (isset($tags)) { ?>
                        <?php foreach ($tags as $option) { ?>
                            <option value="<?= $option['id'] ?>"><?= $option['tag'] ?></option>
                    <?php }} ?>
                </select>
                <select name="tag3">
                    <option value="">Tags</option>
                    <?php if (isset($tags)) { ?>
                        <?php foreach ($tags as $option) { ?>
                            <option value="<?= $option['id'] ?>"><?= $option['tag'] ?></option>
                    <?php }} ?>
                </select>
                <br>
                <input type="submit" class="btn btn-secondary" value="Post">
            </form>
        </div>
        <div id="fh5co-intro-section" class="col-md-12">
		<table>
            <divid="fh5co-intro-section" class="col-md-12" >
                <tr>
                            <?php foreach ($highlight as $option) { ?>
                            <td class="tdid">
                                
                            <div class="col-md-10 col-md-offset-2 text-center" >
                                <!-- <img  src="" align="bottom" id="mainpic"> -->
                                <p class="pclass"><?= $option['title'] ?></p>
                                <img class="pclass" src="<?= $option['img_url'] ?>" width="300">
                                <p class="pclass"><?= $option['comp_name'] ?></p>
                                <p class="pclass"><?= $option['post'] ?></p>
                            
                            </div>
                            </td>
                            <?php 
                        } ?>
                            </tr>
                <tr>
            </div>
        </table>        
	</div>
    <footer id="fh5co-footer" role="contentinfo">
    <table>
        <tr>
            <td id="footerone">
   <a href="#"> Credo </a>&nbsp;&nbsp;&nbsp;
   <a href="#"> Support </a>&nbsp;&nbsp;&nbsp;
           </td>
           <td id="footerimg">
   <img src="https://i.imgur.com/FCqpUOR.png" alt="venture caffe logo" width= >
           </td>
           <td id="footertow">          
           <a href="https://www.facebook.com/VentureCafeRotterdam/" class="fa fa-facebook"></a>&nbsp;&nbsp;&nbsp;
           <a href="https://twitter.com/VentureCafeRdam" class="fa fa-twitter"></a>&nbsp;&nbsp;&nbsp;
           <a href="https://www.linkedin.com/company-beta/10126728/" class="fa fa-linkedin"></a>&nbsp;&nbsp;&nbsp;
           <a href="https://www.instagram.com/venturecaferotterdam/" class="fa fa-instagram"></a>
           </td>          
       </tr>
   </table>
</footer>
    </body>
</html>











