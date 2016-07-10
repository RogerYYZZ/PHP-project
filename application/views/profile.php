<!DOCTYPE HTML>

<head>

<style>
 .title_border{
 	border-style: hidden; 
 	padding: 20px 20px; 
 	margin: auto; 
 	border-radius: 10px; 
 	height: 50px; 
 	background-color: #f5f5f5

 }
 .text{
 	overflow:hidden; 
 	white-space: nowrap; 
 	text-overflow: ellipsis
 }

</style>
</head>

<div class="container" style = "margin-top: 50px; margin-bottom: 60px">
	<div class="row">
		<div class="col-md-8" style="border: 1px solid #d3d3d3">
			<ul class="nav nav-tabs nav-justified" style = "margin-top: 10px">
				<li class = "active" ><a href="#post" data-toggle="tab"><h5>My posts</h5></a></li>
				<li><a href="#comment" data-toggle="tab"><h5>My comments</h5></a></li>
			</ul>
			<div class = "tab-content">
				<div id="post" class = "tab-pane fade in active">
					<?php foreach($my_post as $row):   ?>

						<div class="panel panel-default" style="border-top: none; border-left: none; border-right: none">
						
							<div class="panel-body">
								<div class="row">
									<div class="col-md-10 ">
										<div class = "title_border"><a href = "<?php echo base_url();?>user/post/<?php echo $row->post_id;?>" style = "color: black"><p class = "text" style="color: #404040"><?php echo $row->title; ?></p></a></div>
									</div>
									<div class="col-md-2 ">
										<?php $date = $row->date;
											$month_day = explode("-",explode(" ", $date)[0]);
											$post_date = $month_day[1]."-".$month_day[2];
											 echo $post_date; ?>
									</div>
								</div>
							
							
							</div>
						</div>

					<?php endforeach; ?>
				</div>

				<div id = "comment" class = "tab-pane fade">
					<?php foreach($my_comment as $row): ?>

						<div class="panel panel-default" style="border-top: none; border-left: none; border-right: none">
						
							<div class="panel-body">
								<div><h5 style="color: #0066cc; display:inline-block"><?php  echo  $row->comment_content; ?></h5><p style="display:inline-block; position:absolute; right:0; margin-right:50px">
											<?php $date = $row->date;
											$month_day = explode("-",explode(" ", $date)[0]);
											$post_date = $month_day[1]."-".$month_day[2];
											 echo $post_date; ?></p></div>
								<div class = "title_border"><p class = "text" ><a href = "<?php echo base_url(); ?>user/post/<?php echo $row->post_id;?>" style="color: black"><?php  echo  $row->post;  ?></a></p></div>

							
							
							</div>
						</div>



				    <?php endforeach;   ?>
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
</body>


