        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Upload Documents
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                        <div class="col-md-9 col-sm-9">
                      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>front/user/doUploadDocuments" enctype="multipart/form-data">
                       <div class="profile_sec">
                         <div class="top_row">
                             <h2>Additional Documents</h2>
                           
                          </div> 
                          <div class="profile_content">
                              <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Documents:</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="document" required>
                                        <option value="">Select Document</option>.
                                        <?php foreach(documents() as $c) { ?>
                                          <option value="<?php echo $c; ?>" <?php echo set_select('document', $c); ?>><?php echo $c; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="error_form"><?php echo form_error('document'); ?></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Browse file:</label>
                                    <div class="col-sm-9">
                                    <input type="file" class="form-control"  required onchange="readURL(this,'png|jpg|tif|gif|pdf','')" name="file">
                                     <div class="error_form"><?php echo form_error('file'); ?></div>
                                    </div>
                                </div>
                               <span ><button class="commn_btn">UPLOAD</button></span>
                               <span><a href="javascript:void(0);" class="commn_btn" onclick="cancelAction()">CANCEL</a></span>
                          </div>
                      </div>
                    
                     
                        </form>
                        <div class="profile_sec">
                        <?php if(!empty($documents)) { foreach($documents as $d) { ?>
                          <div class="box_doc">
                            <a class="cross_btn" href="<?php echo base_url(); ?>front/user/deleteDocument/<?php echo encode($d['id']); ?>" onclick="return confirm('Are you sure ?');" title="Click Here To Delete Document"><i class="fa fa-close"></i></a>
                            <a href="<?php echo $d['file']; ?>" class="img_doc gallery">
                              <!-- <img src="<?php echo $d['file']; ?>"> -->
                              <embed src="<?php echo $d['file']; ?>" width="111px" height="80px" />
                            </a>
                            <div class="doc_meta">
                              <p><?php echo date('F d, Y', strtotime($d['added_date'])); ?> <span><?php echo $d['document']; ?></span></p>
                            </div>
                          </div>
                        <?php } } ?>
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
