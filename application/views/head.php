<!DOCTYPE HTML> 

<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> 
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/css/sign.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



<style>
#bs-example-navbar-collapse-1{
  margin-left: 10%;
}
.img-responsive {
max-width: 20%; /* or to whatever you want here */
max-height: 20%; /* or to whatever you want here */
}
</style>


</head> 

<body>
 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
      <img style="max-width:50px; margin-top: -7px;" src="<?php echo base_url();?>public/image/Roger.jpg"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class = "dropdown"><a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Read<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href="<?php echo base_url();  ?>user/content">Friend posts</a></li>
            <li><a  href="<?php echo base_url();?>zhihu">Zhihu daily</a></li>
            <li><a href="#">Something else here</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url();  ?>user/post">Post</a></li>
        <li><a href="<?php echo base_url();  ?>resume">about</a></li>
     <!--    <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
           >
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
 -->      </ul>
   <!--    <form class="navbar-form navbar-left" id="search1" role="search"  style="margin-left: 10%">
        <div class="form-group">
          <input type="text" class="form-control" id=" form-control1" placeholder="Search" style="width: 300px;">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <?php  if(!isset($user)): ?>
               <a href="<?php echo base_url();?>">Log in</a>
          <?php else: ?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user; ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="<?php echo base_url(); ?>user/profile">Personal page</li>
              <li><a href="<?php echo base_url(); ?>user/logout">Log out</a></li>
              </ul>
            
          <?php endif; ?>

            
          
          
        
         
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


