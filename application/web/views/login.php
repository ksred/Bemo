<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bemo - Login</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="http://bemo.localhost/assets/css/bootstrap.css" rel="stylesheet">
    <link href="http://bemo.localhost/assets/css/bemo.css" rel="stylesheet">
    <link href="http://bemo.localhost/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>
    <style>
            body {
                background: black;
                background-image: url("/assets/img/bg3.png");
            }
            
            .wrap {
                width: 600px;
                margin: 0 auto;
            }
            
            .wrap form {
                margin: 0 auto;
                background: transparent;
            }
        </style>
    <div class="container">
        <div class="wrap" style="margin: 0 auto">
        <img src="/assets/img/bemologo.png" style="margin-top: 100px;"/>
<form class="well form-inline"  action="/user/login" method="post">
    <input type="text" class="span2" placeholder="Your name" name="name" >
    <input type="password" class="span2" placeholder="Password" name="password" >
    <button type="submit" class="btn btn-primary pull-right" name="submit">Submit</button>
</form>
</div>
</div>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/application.js"></script>

</body>

<footer>
    
</footer>