
<head>
<link href="<?php echo base_url();?>public/css/comment.css" rel="stylesheet"></link>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
    var BASE_URL = "<?php echo base_url();?>";

        $(document).ready(function(){

            $('img').each(function(){
                $(this).attr('src', $(this).attr('src').replace(/http\w{0,1}:\/\/p/g, 'https://images.weserv.nl/?url=p'));
            });
        });

</script>

<style>

.content img{
    width:90%;
}
</style>
</head>

<div class="container" style="margin-bottom: 20px">

	<div class="row">
		<div  class="col-md-8">
			<div class="panel panel-default" style = "margin-top:30px">
				<div class="panel-heading" >
					<h2><?php echo $article->title; ?></h2>
				</div>
				<div class="panel-body">
					<?php echo $article->body; ?>
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