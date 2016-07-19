
<head>
<link href="<?php echo base_url();?>public/css/comment.css" rel="stylesheet"></link>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
    var BASE_URL = "<?php echo base_url();?>";
</script>
<script src="<?php echo base_url();?>public/js/comment.js"></script>
<style>
.content img,iframe{
    width:90%;
}

</style>
</head>

<div class="container" style="margin-bottom: 20px">

	<div class="row">
		<div  class="col-md-8">
			<div class="panel panel-default" style = "margin-top:30px">
				<div class="panel-heading" >
					<h2><?php echo $single_post->title; ?></h2>
				</div>
				<div class="panel-body">
					<?php echo $single_post->content; ?>
				</div>

			 <hr>

        	<div class="detailBox" >
    			<div class="titleBox">
      				<label>Comment</label>
        <!-- <button type="button" class="close" aria-hidden="true">&times;</button> -->
    			</div>
   
    			<div class="actionBox">
        			<ul class="commentList" id = "commentList_<?php echo  $single_post->post_id; ?>">
        				<?php foreach($single_comment as $row): ?>
        				   <li>
                				<div>
                  <!-- <img src="http://lorempixel.com/50/50/people/6" /> -->
                            <span class="glyphicon glyphicon-user text-primary" style="float:left"></span> <p class="username"> <?php echo $row->username;?></p><span class="sub-text" style="padding-left:10px"><?php echo $row->minutes;?></span>
                        </div>

                        <div style="clear:left">
                            <p><?php echo $row->comment_content;?></p> 
                        </div>
            				</li>
            			<?php  endforeach;?>
        			</ul>
        			<form class="form-inline" role="form" >
           				 <div class="form-group">
                			<input class="form-control" id = "comment_<?php echo $single_post->post_id ?>" type="text" placeholder="Your comments" required >
            			</div>
            			<div class="form-group">
                			<button class="btn btn-default" type = "button">Add</button>
            			</div>
        			</form>
    			</div>

			</div>

			</div>


	 	</div>

	</div>
</div>

<footer class="footer" >
      <div class="container">
        <p class="text-muted">Copyright © 2016 Zheming</p>
      </div>
  </footer>