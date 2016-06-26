
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
     
             setup: function(editor) {
            var inp = $('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
            $(editor.getElement()).parent().append(inp);

            inp.on("change",function(){
                var input = inp.get(0);
                var file = input.files[0];
                var fr = new FileReader();
                fr.onload = function() {
                    var img = new Image();
                    img.src = fr.result;
                    editor.insertContent('<img src="'+img.src+'"/>');
                    inp.val('');
                }
                fr.readAsDataURL(file);
            });

            editor.addButton( 'mybutton', {
                text:"IMAGE",
                icon: false,
                onclick: function(e) {
                    inp.trigger('click');
                }
            });
        },
      plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code',
    'autoresize'
  ],
  toolbar: 'insertfile undo redo | styleselect | fontselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | mybutton',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css',
    '/personal/public/css/content.css'
  ],
          menubar: false,
         height:"800",
         width:"100%"

      });</script>

</head>
<style>
.error{
  color: #FF0000;
}

#text_form{
  height: 250px;
}

/*.wrapper{
   min-height: 100%;
  padding: 0 0 60px;
   position:relative;
    height: 100%;

}*/

</style>

<div class = "wrapper">
<div class = "container">
 <div class="row">
    
    <div class="col-md-8 ">
      <form  action = "<?php echo base_url() ?>user/submit" method = "post" accept-charset="utf-8">
   <label for="exampleInputEmail1">Title</label>
  <input type="text" class="form-control" id="title" name="title" required><br>
  <label >Content</label>
       <textarea  class="form-control"  id = "text_form" name="content" required>
          </textarea>
        <br>
       <button type="submit" class="btn btn-primary">Submit</button>
       </form>
    </div>

  
  </div>

</div>
</div>
  <footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright © 2016 Zheming</p>
      </div>
  </footer>

</body>
</html>