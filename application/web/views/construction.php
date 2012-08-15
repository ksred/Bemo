<!DOCTYPE html>
<html>
    <head>
        <title>Bemo!fm</title>
	<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap.min.css" />
	<!--<link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">-->
    </head>
    <body>
        <style>
            body {
                background: black;
                background-image: url("/assets/img/bg3.png");
            }
            
            .container {
                width: 960px;
                margin: auto;
            }
            
            .container img {
                margin: 60px 0px 0px 0px;
            }
	    
	    .well {
		background-color: rgba(0, 0, 0, 0.5);
	    }
	    
	    #mc_embed_signup{
		clear:left;
		color: white;
		text-shadow: 0px 0px 4px #000;
		font-size:20px;
		font-family: Helvetica,Arial,sans-serif;
		text-align: center;
		margin: 0 auto;
		width: 400px;
	    }
	    
	    #mc_embed_signup label {
		font-size: 20px;
		line-height: 30px;
	    }
	    
	    #mc_embed_signup .email{
		border-radius: 10px;
		padding: 5px;
		margin-bottom: 20px;
	    }
        </style>
        
        <div class="container">
           <center><img src="<?= BASE_URL ?>/assets/img/bemologo.png" /></center>
	   
	   <!-- Begin MailChimp Signup Form -->
	    <div id="mc_embed_signup" class="well">
		<form action="http://bemo.us5.list-manage.com/subscribe/post?u=4e832cb6fdc9fa58ac088e75c&amp;id=f1e8c2dab6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="form validate" target="_blank" novalidate>
			<label for="mce-EMAIL">What's all the fuss about?</label>
			<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
			<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-inverse btn-large"></div>
		</form>
	    </div>
	    
	    <!--End mc_embed_signup-->
        </div>
    </body>
