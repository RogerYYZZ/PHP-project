
<!DOCTYPE HTML> 
<head>

<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet"></link>
<link href="<?php echo base_url();?>public/css/comment.css" rel="stylesheet"></link>
<script src="<?php echo base_url();?>public/js/main.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>


<div class="container">
	<div class="row">
		<div class="col-md-5 col-md-offset-3">
	<?php foreach ($content as $row): ?>

		<div class="panel panel-default" style = "margin-top: 30px">
       <div class="panel-heading" ><h3><?php echo $row->title; ?></h3><hr><cite><?php echo $row->username;?></cite> <p style="display: inline; margin-left: 20px"><?php echo $row->date;  ?></p></div>
       
        <div class="panel-body" style="text-overflow:ellipsis; overflow:hidden"><?php echo $row->content;?></div>
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

		
		$("button").click(function(){
            // if(<?php !isset($user)?>)
            //         window.location.href = "<?php base_url();?>";
            // else{
			  var content = $(this).parent().parent().find(".form-group").find("input").val();
              var form = $(this).parent().parent();
			  var com_id = $(this).parent().parent().find(".form-group").find("input").attr('id');
			  var id = com_id.split("_")[1];
              var currentdate = new Date();
              var datetime;
              var month = currentdate.getMonth()+1;
            //  form.reset();
            
                datetime = ((month >= 1 && month <= 9)? ("0"+month):(month))+"-"+((currentdate.getDate()>=0 && currentdate.getDate() <= 9)?("0"+currentdate.getDate()):(currentdate.getDate()))+" "+((currentdate.getHours() >= 0 && currentdate.getHours() <= 9)? ("0"+currentdate.getHours()):(currentdate.getHours()))+":"+((currentdate.getMinutes() >= 0 && currentdate.getMinutes() <= 9)? ("0"+currentdate.getMinutes()):(currentdate.getMinutes()));
              
              


			if(content != ''){
					$.ajax({
					type: "POST",
					url:"<?php echo base_url();?>content/comment",
					data: {'id':id,'comment':content},
					cache: false,
                    dataType : 'JSON',
					success: function(data){
					   if(data != "false"){
                            $('#commentList_'+id).append("<li><div class='commenterImage'><p>"+data["username"]+":"+"</p></div><div class='commentText'><p>"+content+"</p><span class='date sub-text'>"+datetime+"</span></div></li>");
                            form[0].reset();
                       }
                        
                 //    alert(form.attr('role'));
					}
					//return false;
					});
			}
        
		

		});

		

	});
	


</script>

