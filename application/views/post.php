<!DOCTYPE HTML> 
<html lang="en">
<head>
  <meta charset="UTF-8">



  
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
    tinymce.init(
      { selector:'textarea',
      automatic_uploads: true,
     forced_root_block : false ,
      force_p_newlines : false,
      force_br_newlines : true,
      convert_newlines_to_brs : false,
      remove_linebreaks : true, 
        verify_html : false,
         remove_trailing_nbsp : false,
     
      plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code',
    'autoresize',
    'nonbreaking',
    'spellchecker',
    'codesample',
    'media',
    'textcolor',

  ],
  browser_spellcheck : true,
  toolbar: 'insertfile undo redo | styleselect | fontselect | fontsizeselect | forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media | codesample',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css',
     '/personal/public/css/content.css'
  ],

  file_browser_callback: function(field_name,url,type,win){
    if(type=='image') $('#my_form input').click();
  },

  nonbreaking_force_tab: true,
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

div.mce-edit-area{
    background:#FFF;
    filter:none;
    padding:10px; 
}

</style>


<div class = "container" style="margin-bottom: 40px">
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

  <form id="my_form" action="<?php echo base_url(); ?>upload" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden"> <input name="userfile" type="file" accept = ".jpg,.jpeg,.png,.gif" onchange="$('#my_form').ajaxSubmit({ success: function(d){$('.mce-window .mce-container-body input:first').val(d);} });this.value='';">
  </form>
</div>
  <footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright © 2016 Zheming</p>
      </div>
  </footer>

</body>
</html>