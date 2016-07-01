
<!DOCTYPE HTML> 
<head>

<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet"></link>
<link href="<?php echo base_url();?>public/css/comment.css" rel="stylesheet"></link> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
    var BASE_URL = "<?php echo base_url();?>";
</script>
<script src="<?php echo base_url();?>public/js/comment.js"></script>
<script src="<?php echo base_url();?>public/js/main.js"></script>


</head>
<style>
.short-text{
    overflow: hidden;
    height: 25em;
}

.full-text{
    height: auto;
}

.short-text img{
    width: 500px;
    height: 400px;
    left:10px;
    right:10px;
}

</style>



<div class="container" style="margin-bottom: 20px">
	<div class="row">
        <div class="alert alert-info" id = "log_alert" role="alert" style = "display: none">You need log in first.</div>
		<div class="col-md-6 col-md-offset-2">

	<?php foreach ($content as $row): ?>

		<div class="panel panel-default" style = "margin-top: 30px">
       <div class="panel-heading" ><h3><a href="<?php echo base_url();?>user/post/<?php echo $row->post_id;?>" style = "color: black"><?php echo $row->title; ?></a></h3><hr><cite><?php echo $row->username;?></cite> <p style="display: inline; margin-left: 20px"><?php echo $row->date;  ?></p></div>
       
        <div class="panel-body short-text" style="text-overflow:ellipsis; overflow:hidden"><?php echo $row->content;?></div>
        <div style="text-align:center;margin-top: 20px">
            <a class = "show_more" id = "show_more_<?php echo $row->post_id;?>" href = "#" style="margin: auto">Show more</a>
        </div>
        <hr>

        <div class="detailBox" id = "detailBox_<?php echo $row->post_id;?>">
    <div class="titleBox">
      <label>Comment</label>
        <!-- <button type="button" class="close" aria-hidden="true">&times;</button> -->
    </div>
   
    <div class="actionBox">
        <ul class="commentList" id = "commentList_<?php echo  $row->post_id; ?>">
        	<?php foreach($row->comment as $list):?>

          <li>
                <div class="commenterImage">
                  <!-- <img src="http://lorempixel.com/50/50/people/6" /> -->
                  <p> <?php echo $list->username;?>: </p>
                </div>
                <div class="commentText">
                    <p class=""><?php echo $list->comment_content;?></p> <span class="date sub-text"><?php echo $list->minutes;?></span>

                </div>
            </li>
            
            <?php endforeach; ?>
        </ul>
        <form class="form-inline" role="form" >
            <div class="form-group">
                <input class="form-control" id = "comment_<?php echo $row->post_id;?>" type="text" placeholder="Your comments" required >
            </div>
            <div class="form-group">
                <button class="btn btn-default" type = "button">Add</button>
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

<footer class="footer" >
      <div class="container">
        <p class="text-muted">Copyright © 2016 Zheming</p>
      </div>
  </footer>



</body>
<script>

$(document).ready(function(){

        
            $(".show_more").each(function() {
            var content = $(this).parent().prev();
            var visibleHeight = content[0].clientHeight;
            var actualHide = content[0].scrollHeight - 1;

            if (actualHide > visibleHeight) {
                $(this).show();
            } 
            else {
                $(this).hide();

            }
        });

         $(".show_more").click(function(){
            var content = $(this).parent().prev();
            content.toggleClass("short-text, full-text");
            var link_text = $(this).text();
        //    alert(content.height());
            if(link_text == "Show more")
                $(this).text("Show less");
            else
                $(this).text("Show more");
            return false;

            });
        

    });



</script>





