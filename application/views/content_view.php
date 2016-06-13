
<!DOCTYPE HTML> 
<head>

<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet"></link>
<link href="<?php echo base_url();?>public/css/comment.css" rel="stylesheet"></link>
<script src="<?php echo base_url();?>public/js/main.js"></script>
</head>


<div class="container">
	<div class="row">
		<div class="col-md-5 col-md-offset-3">
	<?php foreach ($content as $row): ?>

		<div class="panel panel-default" >
       <div class="panel-heading" ><h3><?php echo $row->title; ?></h3><hr><cite><?php echo $row->username;?></cite> <p style="display: inline; margin-left: 20px"><?php echo $row->date;  ?></p></div>
       
        <div class="panel-body" style="text-overflow:ellipsis; overflow:hidden"><?php echo $row->content;?></div>
        <hr>

        <div class="detailBox">
    <div class="titleBox">
      <label>Comment</label>
        <!-- <button type="button" class="close" aria-hidden="true">&times;</button> -->
    </div>
   
    <div class="actionBox">
        <ul class="commentList">
     <!--        <li>
                <div class="commenterImage">
                  <img src="http://lorempixel.com/50/50/people/6" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li>
            <li>
                <div class="commenterImage">
                  <img src="http://lorempixel.com/50/50/people/7" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li>
            <li>
                <div class="commenterImage">
                  <img src="http://lorempixel.com/50/50/people/9" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li> -->
        </ul>
        <form class="form-inline" role="form">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Your comments" />
            </div>
            <div class="form-group">
                <button class="btn btn-default">Add</button>
            </div>
        </form>
    </div>
</div>

    </div>


<?php endforeach; ?>




	</div>

	<div class="col-md-2 col-md-offset-2" style="padding-top: 30px">
		<!-- <form action='/user/post'> -->
		<a type="button" href="<?php echo base_url(); ?>user/post" class="btn btn-primary">Post new article</a>
		<!-- </form> -->

	</div>
</div>


</div> 

<a href="#0" class="cd-top">Top</a>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
