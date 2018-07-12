         <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Global Wall
                   </div>
                 </div>
              </div>
            </div>
        <!--Main container sec start-->
        <div class="main_container">
       
            <div class="container">
                <div class="row">
                   <?php $this->load->view('sidebar'); ?>
                    <div class="col-md-9 col-sm-9">
                        <div class="right_dashboard">
                            <h1>Say something to your network!</h1>
                            <div class="send_message">
                                <div class="input-group">
                                    <textarea class="form-control" placeholder="Type tour message here...."></textarea>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Post</button>
                                     </span>

                                </div>
                                <div class="send_message_bottom">
                                    <div class="file_input"><input type="file">
                                        <div class="file_input1"><i class="fa fa-camera"></i>Photo</div>
                                    </div>
                                    <div class="video_you">
                                        <a href="#"><i class="fa fa-play-circle" aria-hidden="true"></i>
                                         Video</a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                                <div class="video_url">
                                    <div class="input-group">
                                    <input type="url" placeholder="Video URL" id="url-post" name="url-post" class="form-control">
                                    <span class="input-group-addon" id="basic-addon2"><img src="<?php echo base_url(); ?>assets/images/youtube.png"></span>
                                </div>
                                </div>
                            </div>
                            <div class="dashboard_content">
                                <h2>Below are the latest posts from your network.</h2>
                                <div class="dashboard_box">
                                    <p>about 1 day ago </p>
                                    <div class="post_list">
                                        <div class="post_img">
                                            <img src="<?php echo base_url(); ?>assets/images/default.jpg">
                                        </div>
                                        <div class="post_content">
                                            <a href="#">You Said</a>
                                            <p>Hello</p>
                                            <button type="button" class="btn btn-info"><i class="fa fa-comment" aria-hidden="true"></i> Translate</button>
                                            <button type="button" class="btn btn-info"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send a private message</button>
                                            <button type="button" class="btn btn-warning"><i class="fa fa-tags" aria-hidden="true"></i> Apply Online</button>
                                            <p>
                                                <a href="#"><img src="<?php echo base_url(); ?>assets/images/america_abroad.jpg"></a>
                                            </p>
                                            <div class="like_box">
                                                <button type="button" class="btn btn_like btn-info pull-left"> <i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                                                <div class="share_box pull-right">
                                                    <label>Share</label>
                                                    <div class="social_media">
                                                        <ul>
                                                            <li><a href="#"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                                                            <li><a href="#"><i aria-hidden="true" class="fa fa-twitter"></i></a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="comment">
                                            <div class="comment_img"><img src="<?php echo base_url(); ?>assets/images/default.jpg"></div>
                                            <div class="comment_txt">
                                                <div class="name">wasim khan <span class="pull-right">about 2 year ago</span></div>
                                                <p>I NEED MORE INFORMATION ABOUT THIS.</p>
                                                <a href="#">Reply</a> <a href="#">Translate This</a>
                                            </div>
                                        </div>
                                        <div class="comment">
                                            <div class="comment_img"><img src="<?php echo base_url(); ?>assets/images/default.jpg"></div>
                                            <div class="comment_txt">
                                                <div class="name">wasim khan <span class="pull-right">about 2 year ago</span></div>
                                                <p>I NEED MORE INFORMATION ABOUT THIS.</p>
                                                <a href="#">Reply</a> <a href="#">Translate This</a>
                                            </div>
                                        </div>
                                        <div class="comment">
                                            <div class="comment_img"><img src="<?php echo base_url(); ?>assets/images/default.jpg"></div>
                                            <div class="comment_txt">
                                                <div class="name">wasim khan <span class="pull-right">about 2 year ago</span></div>
                                                <p>I NEED MORE INFORMATION ABOUT THIS.</p>
                                                <a href="#">Reply</a> <a href="#">Translate This</a>
                                            </div>
                                        </div>
                                        <div class="send_comment">
                                            <div class="comment_img"><img src="<?php echo base_url(); ?>assets/images/default.jpg"></div>
                                            <textarea class="form-control"> Leave your comment here </textarea>
                                            <button class="btn btn_post" type="button">Post</button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!--Main container sec end-->

    <script type="text/javascript">
      $(document).ready(function(){
        $('body').on('change','#edit_pic',function(){
        var file_name = $(this).val();
        var fileObj = this.files[0];
        var calculatedSize = fileObj.size/(1024*1024);
        var split_extension = file_name.split(".").pop();
        var ext = [ "jpg", "gif", "png", "jpeg" ];
        if($.inArray(split_extension.toLowerCase(), ext ) == -1)
        {
          $('#edit_pic').val(fileObj.value = null);
          showToaster('error','You Can Upload Only .jpg, gif, jpeg, png files !');
          return false;
        }
        else if(calculatedSize > 5)
        {
          $('#edit_pic').val(fileObj.value = null);
          showToaster('error','File size should be less than 5 MB !');
          return false;
        }
        if($.inArray(split_extension.toLowerCase(), ext ) != -1 && calculatedSize < 5)
        {
          var data = new FormData($('#img-form')[0]);
          $.ajax({
                type: "POST",
                url : "<?php echo base_url(); ?>front/user/updateProfileImage",
                data: data,
                dataType : "JSON",
                contentType: false,
                processData: false,
                success: function(resp){
                  if(resp.type == 'error'){
                    showToaster('error',resp.msg);
                  }else{
                    $('.show_img1').attr('src',resp.path);
                    showToaster('success',resp.msg);
                  }
                },
                error:function(error)
                {
                  showToaster('error','Internal server error !');  
                }
            });
          
        }
      });

      });
    </script>