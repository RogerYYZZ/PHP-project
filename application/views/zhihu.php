<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Document</title>
  <style>
.short-text{
    overflow: hidden;
    height: 40em;
}

.full-text{
    height: auto;
}
.short-text .content{
	margin-top: 20px;
}
.short-text .content img, iframe{
    width: 750px;
   
    margin-left: 50%;
    transform: translateX(-50%);
   
}
h2{
	font-size: 18px;
}

.cover{
  background-image:url("<?php echo base_url();?>public/image/Roger2.jpg"); 
  /*height: auto; */  
  -webkit-background-size: cover; 
  -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-position: 500px 0px;

         background-position: top left;
         background-attachment: fixed;
   
}



</style>
  <script>
  		$(document).ready(function(){

  			$('img').each(function(){
  				$(this).attr('src', $(this).attr('src').replace(/http\w{0,1}:\/\/p/g, 'https://images.weserv.nl/?url=p'));
  			});


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
</head>
	

<div class="cover">
<div class="container" style="margin-bottom: 20px">
	<div class="row">
        
		<div class="col-md-10 col-md-offset-1" style="overflow-y: scroll">
     
	           <?php foreach ($article->stories as $row): ?>

		          <div class="panel panel-default" style = "margin-top: 30px">
                        <div class="panel-heading" ><h3><?php echo $row->title;?></h3></div>
       
                        <div class="panel-body short-text" style="text-overflow:ellipsis; overflow:hidden"><?php echo $row->full_content->body;?></p></div>
                             <div style="text-align:center;margin-top: 20px; margin-buttom: 20px;">
                                <a class = "show_more" href = "#" style="margin: auto">Show more</a>
                            </div>
                            


                  </div>

                <?php endforeach; ?>

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
</html>
