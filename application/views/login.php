
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE HTML> 

<html>
<head>
<meta charset="utf-8">


<style>
.error {color: #FF0000;}
.cover{
  background-image:url("<?php echo base_url();?>public/image/Roger2.jpg"); 
  height: 600px;   
  -webkit-background-size: cover; 
  -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-position: 250px 0px;
   
}
</style>
</head>
<div class = "cover">  
<div class="container" >
 <div class = 'col-sm-10'>
  <div class="alert alert-danger" <?php if (!isset($alert) || $alert){?>style="display:none"<?php } ?>>
    Check your username and password.
  </div>
</div>


<form class="form-signin" action = '<?php base_url();?>login' method = 'post'>
	<div class="login_body">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="username" class="sr-only">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
       <!--  <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name = "email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus> -->
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name = "password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
    </div>
    <div class="login_foot">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <a class="btn btn-lg btn-primary btn-block" href="user/register" type="button">Sign up</a>
    </div>   
      </form>

</div>
</div>
 <footer class="footer"  style="bottom: 0">
      <div class="container">
        <p class="text-muted">Copyright © 2016 Zheming</p>
      </div>
  </footer>

</body>
</html>