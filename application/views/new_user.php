<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
 <link href="<?php echo base_url();?>public/css/sign.css" rel="stylesheet">
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 


<div role="alert" <?php if(isset($isNew) && $isNew){?> class="alert alert-success" <?php } else{ ?> class = "alert alert-danger"  <?php }  if(!isset($isNew)){ ?> style = "display:none" <?php }?>> <?php if($isNew){ $url = base_url(); echo '<strong>Well done</strong>! Click <a href = "'.$url.'">here</a> to log in.';} else{ echo "You username has been registered. Change another one.";}  ?> </div>

<form class="form-signin" action="<?php echo base_url();?>user/new" method = 'post'>
	<div class="login_body">
        <h2 class="form-signin-heading">Please sign up</h2>
        <label for="username" class="sr-only">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username">
        <br>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name = "email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name = "password" id="inputPassword" class="form-control" placeholder="Password" required>
       
        </div>
    </div>
    <div class="login_foot">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Create new account</button>
        
    </div>   
     
      </form>
<footer class="footer" style="bottom: 0">
      <div class="container">
        <p class="text-muted">Copyright © 2016 Zheming</p>
      </div>
  </footer>

</body>
</html>