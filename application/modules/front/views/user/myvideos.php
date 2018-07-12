        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   My Videos
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                    <div class="col-md-9 col-sm-9">
                    <h3>My Videos</h3><br/>
                    <p>Welcome to your TV channel, where you can broadcast videos of your campus, students, activities or anything related to your school. You could even upload footage of lectures to provide prospective students with a glimpse of what it would be like in a classroom. Videos are an excellent way to generate enthusiasm in your fans! </p><br/>
                        <div class="right_dashboard">
                            <div class="describ_box view-section">
                            
                                <h1> My Videos <button type="button" data-toggle="modal" data-target="#my_videos" data-backdrop="static" data-keyboard="false" class="btn btn-primary pull-right inside-btn">Upload Video <i class="fa fa-upload"></i></button></h1>
                                 <div class="video_content">
                                 <?php foreach($videos as $v) { ?>
                                  <div class="video_box_content">
                                    <div class="video_top"><a href="<?php echo base_url(); ?>front/user/deleteVideo/<?php echo encode($v['id']); ?>" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash"></i></a></div>
                                    <!-- <iframe width="100%" height="100%" src="<?php echo str_replace('watch?v=', 'embed/', $v['live_video_url']); ?>"></iframe> -->
                                    <?php if($v['video_img']!=''){ ?>
                                    <a target="_blank" href="<?php echo str_replace('watch?v=', 'embed/', $v['live_video_url']); ?>">
                                    <img width="257px" height="193px" src="<?php echo $v['video_img']; ?>">
                                    <img class="logo" height="60px" width="60px" src="<?php echo base_url('/uploads/users/youtube.png'); ?>"></a>
                                    <?php } //else { ?>
                                    <!-- <a target="_blank" href="<?php echo $v['live_video_url']; ?>">
                                    <video width="257" height="193" poster="<?php echo base_url('/uploads/users/video-default.png'); ?>" controls>
                                      <source src="<?php echo $v['live_video_url']; ?>" >
                                    </video>
                                      </a> -->
                                    <?php //} ?>

                                  </div>

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
        </section>


        </div>
        <!--Main container sec end-->

        <!-- Modal  for upload video -->

        <div class="modal fade" id="my_videos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="video-form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title pull-left" id="myModalLabel">Add Video</h4><br/><br/>
                            <span>At this time only videos hosted on YouTube.com can be posted to your studymetro profile.</span>
                                <div class="message_sub">
                                    <h4 class="user-name"></h4>
                                </div>
                            </h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Title:</span>
                                    <input type="text" name="title" class="form-control" placeholder="Title" aria-describedby="basic-addon1">
                                </div>
                                <div class="error_form title"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Video URL:</span>
                                    <input type="url" name="live_video_url" class="form-control" placeholder="Video URL" aria-describedby="basic-addon1">
                                </div>
                                <div class="error_form live_video_url"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Descprition:</span>
                                    <textarea class="form-control" rows="4" name="descprition" placeholder="Descprition"></textarea>
                                </div>
                                <div class="error_form descprition"></div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="send_btn upload-btn">Upload</button>
                            </div>
                        <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal  for upload video end-->      

        <script>
$(document).ready(function(){

$("body").on('click','.upload-btn',function() {
    var form_data = new FormData($('#video-form')[0]);
    $.ajax({
        url  : "<?php echo base_url(); ?>front/user/uploadVideo",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.upload-btn').attr('disabled',true).text('Loading....');
        },       
        success: function(resp){
          //alert(resp);
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
            $('#video-form')[0].reset();
            $('#my_videos').modal('hide');
            showToaster('success',resp.msg);
            setTimeout(function(){
                window.location.reload();
            },1000);
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.upload-btn').attr('disabled',false).text('Upload');
        },
        error:function(error)
        {
            $('.upload-btn').attr('disabled',false).text('Upload');
        }
    });
});

});

</script>  


     
