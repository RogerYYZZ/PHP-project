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
					url: BASE_URL+"content/comment",
					data: {'id':id,'comment':content},
					cache: false,
                    dataType : 'JSON',
					success: function(data){
					  
                        if(data["error"] == "false"){
                        //	window.location.href = BASE_URL;
                        $("#log_alert").show();	
                        $('html,body').scrollTop(0);
                        }
                        else{
                            $('#commentList_'+id).append("<li><div><span class='glyphicon glyphicon-user text-primary' style='float:left'></span> <p class='username'>"+data["username"]+"</p><span class='sub-text' style='padding-left:10px'>"+datetime+"</span></div><div style='clear:left'><p>"+content+"</p></div></li>");
                            form[0].reset();
                          //  alert(data);
                       }
                 //    alert(form.attr('role'));
					}
					//return false;
					});
			}
        
		

		});
            
        

	});