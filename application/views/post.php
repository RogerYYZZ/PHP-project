
<html lang="en">
<head>
  <meta charset="UTF-8">


  
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
    tinymce.init(
      { selector:'textarea',
      automatic_uploads: true,
    forced_root_block : "" ,
    //  force_br_newlines : true,
    // force_p_newlines : false,
         
      plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code',
    'autoresize'
  ],
  toolbar: 'insertfile undo redo | styleselect | fontselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css',
    '/personal/public/css/content.css'
  ],
          menubar: false,
         height:"800px",
         width:"100%"

      });</script>

</head>
<style>
.error{
  color: #FF0000;
}
</style>


<div class = "container">
 <div class="row">
    
    <div class="col-md-8 ">
      <form  action = "<?php echo base_url() ?>user/submit" method = "post" accept-charset="utf-8">
   <label for="exampleInputEmail1">Title</label>
  <input type="text" class="form-control" id="title" name="title" required><br>
  <label >Content</label>
       <textarea  class="form-control"  name="content" required>
          </textarea>
        <br>
       <button type="submit" class="btn btn-primary">Submit</button>
       </form>
    </div>

  
  </div>

</div>

<footer class="footer" style="bottom: 0">
      <div class="container">
        <p class="text-muted">Copyright © 2016 Zheming</p>
      </div>
  </footer>

 
</body>
</html>