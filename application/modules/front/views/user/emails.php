        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Emails
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                        <div class="col-md-9 col-sm-9">
                      <div class="right_dashboard">
                            <div class="tool_bar">
                                <!-- <div class="tool_bar_left">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox">
                                       </label>
                                    </div>
                                    <div class="drop_down dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span></a>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0);" class="read-unread-mail">Read</a></li>
                                            <li><a href="javascript:void(0);" class="read-unread-mail">Unread</a></li>
                                            <li><a href="javascript:void(0);" class="delete-mail">Delete</a></li>
                                        </ul>
                                    </div>
                                </div> -->
                                <div class="tool_bar_right">
                                    <button type="button" data-toggle="modal" data-target="#message" data-backdrop="static" data-keyboard="false">New Message <i class="fa fa-pencil"></i></button>
                                </div>
                            </div>
                              <ul class="nav nav-pills">
                                <li class="active"><a data-toggle="pill" href="#inbox"><i class="fa fa-envelope-o"></i>  Inbox</a></li>
                                <li><a data-toggle="pill" href="#sent"><i class="fa fa-paper-plane" aria-hidden="true"></i> Sent Items</a></li>
                              </ul>
                            <div class="message_box">
                            <div class="tab-content">
                              <div id="inbox" class="tab-pane fade in active">
                              <?php if(!empty($inbox_email)) { ?>
                                <table class="table">
                                    <tbody>
                                        <?php  $no = 1; foreach($inbox_email as $i) { 
                                            $user_details = getUserDetailsBy('email',$i['from_email']);
                                            if(empty($user_details[0]['photo'])){
                                              $file = base_url().'uploads/users/default.jpg';
                                            }else{
                                              $file = base_url().'uploads/users/'.$user_details[0]['photo'];
                                            }
                                        ?>
                                        <tr>
                                            <td>
                                                <!-- <div class="checkbox">
                                                    <label>
                                               <input type="checkbox">
                                            </label>
                                                </div> -->
                                                <?php echo $no; ?>
                                            </td>
                                            <td>
                                                <div class="photo_frame">
                                                    <img class="img-responsive view-mail" type="inbox" main="<?php echo encode($i['id']); ?>" src="<?php echo $file; ?>">
                                                </div>
                                                <div class="message_sub">
                                                    <h4 class="view-mail" type="inbox" main="<?php echo encode($i['id']); ?>"><?php echo $i['subject']; ?></h4>
                                                    <p class="view-mail" type="inbox"  main="<?php echo encode($i['id']); ?>"><?php echo $user_details[0]['first_name']." ".$user_details[0]['last_name']; ?></p>
                                                </div>
                                            </td>
                                            <!-- <td>
                                            <?php if($i['attachment']!=''){ ?>
                                            
                                                <div class="box_doc">
                    <a download="" class="download_btn" href="<?php echo base_url().$i['attachment']; ?>" title="Click Here To Download Document"><i class="fa fa-download" aria-hidden="true"></i></a>

                    <a href="<?php echo base_url().$i['attachment']; ?>" class="img_doc gallery"><img src="<?php echo base_url().$i['attachment']; ?>"></a>
                    <div class="doc_meta">
                    </div>
                  </div>
                                            
                                            <?php } ?>
                                            </td> -->
                                            <td>
                                                <div class="time_box"><?php echo date('d M, Y',strtotime($i['added_date'])); ?></div>
                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                              <?php } ?>
                              </div>
                              <div id="sent" class="tab-pane fade">
                                <?php if(!empty($sent_email)) { ?>
                                <table class="table">
                                    <tbody>
                                        <?php $no1 = 1; foreach($sent_email as $s) { 
                                            $user_details = getUserDetailsBy('email',$s['to_email']);
                                            if(empty($user_details[0]['photo'])){
                                              $file = base_url().'uploads/users/default.jpg';
                                              $name = 'Unknown';
                                            }else{
                                              $file = base_url().'uploads/users/'.$user_details[0]['photo'];
                                              $name = $user_details[0]['first_name']." ".$user_details[0]['last_name'];
                                            }
                                        ?>
                                        <tr>
                                            <td>
                                               <!--  <div class="checkbox">
                                                    <label>
                                               <input type="checkbox">
                                            </label>
                                                </div> -->
                                                <?php echo $no1; ?>
                                            </td>
                                            <td>
                                                <div class="photo_frame">
                                                    <img class="img-responsive view-mail" type="sent" main="<?php echo encode($s['id']); ?>" src="<?php echo $file; ?>">
                                                </div>
                                                <div class="message_sub">
                                                    <h4 class="view-mail" type="sent" main="<?php echo encode($s['id']); ?>"><?php echo $s['subject']; ?></h4>
                                                    <p class="view-mail" type="sent"  main="<?php echo encode($s['id']); ?>"><?php echo $name; ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="time_box"><?php echo date('d M, Y',strtotime($s['added_date'])); ?></div>
                                            </td>
                                        </tr>
                                        <?php $no1++; } ?>
                                    </tbody>
                                </table>
                              <?php } ?> 
                              </div>
                            </div>
                            </div>
                        </div>
                   </div> 
                   
                </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>


        </div>
        <!--Main container sec end-->


        <!-- Modal  for message-->
        <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="send_email_form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title pull-left" id="myModalLabel"><?php echo date('d M, Y'); ?>
                            <span>Send Email</span>
                            </h4>
                            <button type="button" class="send_btn send_email">Send</button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">To:</span>
                                    <input type="email" name="to_email" class="form-control" placeholder="Email" aria-describedby="basic-addon1" value="<?php echo SUPPORT_EMAIL; ?>">
                                </div>
                                <div class="error_form to_email"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Subject:</span>
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" aria-describedby="basic-addon1">
                                </div>
                                <div class="error_form subject"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Message:</span>
                                    <textarea class="form-control" rows="6" name="message" placeholder="Message"> </textarea>
                                </div>
                                <div class="error_form message"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Attachment:</span>
                                    <input type="file" name="attachment" class="form-control" placeholder="Attachment" aria-describedby="basic-addon1">
                                </div>
                                <div class="error_form message"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal  for message end-->
        <!-- Modal  for title-->
        <div class="modal fade" id="title" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                   
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title pull-left" id="myModalLabel">
                                <div class="photo_frame">
                                  <img src="" class="user-img-show">
                                </div>
                                <div class="message_sub">
                                    <h4 class="user-name"></h4>
                                </div>
                            </h4>
                          
                            <div class="clearfix"></div>
                        </div>
                        <div class="modal-body">
                           <div class="head_box mail-subject-time">
                               
                           </div>
                           <p class="mail-content"></p>
                           <p class="mail-attachment"></p>
                        <div class="clearfix"></div>
                        </div>
                </div>
            </div>
        </div>

        <!-- Modal  for title end-->        


<script>
$(document).ready(function(){

$("body").on('click','.send_email',function() {
    var form_data = new FormData($('#send_email_form')[0]);
    $.ajax({
        url  : "<?php echo base_url(); ?>front/user/sendemail",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.send_email').attr('disabled',true).text('Loading....');
        },       
        success: function(resp){
           $('.error_form').html("");
           if(resp.type == "validation_err"){
             var errObj = resp.msg;
             var keys   = Object.keys(errObj);
             var count  = keys.length;
             for (var i = 0; i < count; i++) {
                 $('.'+keys[i]).html(errObj[keys[i]]);
             };
           }
           else if(resp.type == "success"){
            $('#send_email_form')[0].reset();
            $('#message').modal('hide');
            showToaster('success',resp.msg);
            setTimeout(function(){location.reload(); }, 1500);
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.send_email').attr('disabled',false).text('Send');
        },
        error:function(error)
        {
            $('.send_email').attr('disabled',false).text('Send');
        }
    });
});

$('body').on('click','.view-mail',function(){
    var mail = $(this).attr('main');
    var type = $(this).attr('type');
    $.ajax({
        url  : "<?php echo base_url(); ?>front/user/getmail",
        type : "POST",
        data : {mail:mail,type:type},   
        dataType : "JSON",   
        beforeSend:function(){
          ajaxindicatorstart();
        },       
        success: function(resp){
           if(resp.type == "success"){
            var mail_data = resp.mail;
            $('.mail-content').html(mail_data.message);
            $('.user-name').text(resp.username);
            $('.user-img-show').attr('src',resp.userimg);
            $('.mail-subject-time').html(mail_data.subject+' <span>'+resp.datetime+'</span>');
            if($.trim(resp.attachment)!='')
            {
                $('.mail-attachment').html('<a download class="" href="<?php echo base_url() ?>'+resp.attachment+'" title="Click Here To Download Attachment">Download Attachment</a> ');
            }
            else
            {
                $('.mail-attachment').html('');
            }
            $('#title').modal('show');
           }
           else{
            showToaster('error',resp.msg);  
           }
           ajaxindicatorstop();
        },
        error:function(err)
        {
            ajaxindicatorstop();
        }
    });
});        

});

</script>        
