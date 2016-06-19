<!DOCTYPE HTML>

<div class="container" style = "margin-top: 50px">
	<div class="row">
		<div class="col-md-8" style="border: 1px solid #d3d3d3">
			<ul class="nav nav-tabs nav-justified" style = "margin-top: 10px">
				<li class = "active"><a href="">My posts</a></li>
				<li><a href="">My comments</a></li>
			</ul>
			<?php foreach($my_post as $row):   ?>

					<div class="panel panel-default" style="border-top: none; border-left: none; border-right: none">
						
						<div class="panel-body">
							<div class="row">
								<div class="col-md-9">
									<a href = "<?php echo base_url();?>user/post/<?php echo $row->post_id;?>" style = "color: black"><?php echo $row->title; ?></a>
								</div>
								<div class="col-md-2 col-md-offset-1">
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
	</div>	



</div>