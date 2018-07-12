        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Edit Profile Types
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                    <div class="col-md-9 col-sm-9">
                    <h3>Profile Types</h3>
                    <p>You may add or remove any programs that your university offers here. You may edit the details of each program when by selecting it from the My Profile tab.</p>
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#profile_types" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add New Profile Type </button></br></br></br>
                        <div class="right_dashboard">
                            <form class="form-horizontal">
                                <div class="describ_box">
                                    <h1> Your Profile Types </h1>
                                    <div class="content_edu">
                                           <div class="left_edu">
                                               <h3>Show my e-mail and my additional e-mail to:</h3>
                                           </div>
                                           <button class="rbtn_remove" type="button">Remove</button>
                                    </div>
                                    <div class="content_edu">
                                           <div class="left_edu">
                                               <h3>Show my e-mail and my additional e-mail to:</h3>
                                           </div>
                                           <button class="rbtn_remove" type="button">Remove</button>
                                    </div>
                                </div>
                            </form>
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


<!-- Modal for #profile types start -->
    <div class="modal fade custom_model" id="profile_types" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" id="profile-types-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Profile Types

                        </h4>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Profile Types</label>
                            <select class="form-control" name="profile_types">
                                <option value="">Select</option>
                                <?php foreach(profile_types() as $p) { ?>
                                    <option value="<?php echo $p; ?>"><?php echo $p; ?></option>
                                <?php } ?>
                            </select>
                            <div class="error_form profile_types"></div>
                        </div>
                        <div class="form-group">
                            <button data-dismiss="modal" aria-label="Close" type="button" class="btn send_btn">Cancel</button>
                            <button type="button" class="send_btn profile-types-save-btn">Save</button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal for #profile types end -->


<script type="text/javascript">

$(document).ready(function(){
  $("body").on('click','.profile-types-save-btn',function() {
    var form_data = new FormData($('#profile-types-form')[0]);
    $.ajax({
        url  : "<?php echo base_url(); ?>front/university/saveProfileTypes",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.profile-types-save-btn').attr('disabled',true).text('Loading....');
          ajaxindicatorstart();
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
            $('#profile-types-form')[0].reset();
            $('#profile_types').modal('hide');
            showToaster('success',resp.msg);
            window.location.reload();
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.profile-types-save-btn').attr('disabled',false).text('Save');
           ajaxindicatorstop();
        },
        error:function(error)
        {
            $('.profile-types-save-btn').attr('disabled',false).text('Save');
            ajaxindicatorstop();
        }
    });
});        

});

</script>  
    
