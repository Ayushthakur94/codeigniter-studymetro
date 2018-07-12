        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Locations
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
                            <div class="top_wrap">
                                <h3>Locations <button type="button" data-target=".add-location" data-relatedtarget=".all_locations" class="toggler">
                                    Add Location <i class="fa fa-plus"></i>
                                    </button><div class="clearfix"></div></h3>
                                    
                                <p>Below you can see location around you</p>
                                <p>To add additional locations to your account click the Add Location button on the right. Only the Master Administrator is able to add, edit or delete locations.</p>
                            </div>
                            <div class="all_locations">
                            <?php if(!empty($locations)) { foreach($locations as $l) { ?>
                              <div class="describ_box">
                                  <h1> <?php echo $l['campus_name'].' :: '.$l['city_location']; ?>
                                  <a href="<?php echo base_url(); ?>front/university/deleteLocation/<?php echo encode($l['id']); ?>" onclick="return confirm('Are you sure ?')" class="pull-right" title="Delete Location"><i class="fa fa-trash-o"></i></a>
                                  </h1>
                                  <div class="content_edu location">
                                      <ul>
                                          <li><label>Name of Campus/Center:</label> <?php echo $l['campus_name']; ?></li>
                                          <li><label>Address:</label> <?php echo $l['address']; ?></li>
                                          <li><label>Zip/Postal/Code:</label> <?php echo $l['postal_code']; ?></li>
                                          <li><label>Website:</label> <?php echo $l['website']; ?></li>
                                          <li><label>Descprition:</label> <?php echo $l['descprition']; ?></li>
                                          <li><label>Information about the city:</label> <?php echo $l['about_city']; ?></li>
                                          <li><label>Facilities and highlights:</label> <?php echo $l['facilities']; ?></li>
                                          <li><label>Profile Type:</label> <?php echo $l['profile_type']; ?></li>
                                      </ul>
                                  </div>
                              </div>
                            <?php } } ?>
                            </div>
                            <div class="add-location hidden">
                              <form class="form-horizontal" id="location-form" method="post">
                              <div class="profile_content">
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Profile Types</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="profile_type">
                                      <?php foreach(profile_types() as $p) { ?>
                                        <option value="<?php echo $p; ?>"><?php echo $p; ?></option>
                                      <?php } ?>
                                    </select>
                                    <div class="error_form profile_type"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Name of Campus/Centre </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="campus_name" placeholder="Name of Campus/Centre">
                                      <div class="error_form campus_name"></div>
                                    </div>
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Address </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="address" placeholder="Address">
                                      <div class="error_form address"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Zip/Postal Code </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" onkeypress="return validateNumbers(event)" name="postal_code" placeholder="Zip/Postal Code">
                                      <div class="error_form postal_code"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> City/Location </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control google_autocomplete" name="city_location" placeholder="City/Location" id="autocomplete">
                                      <div class="error_form city_location"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Website </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="website" placeholder="Website">
                                      <div class="error_form website"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Description </label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" rows="4" name="descprition" placeholder="Description"></textarea>
                                      <div class="error_form descprition"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Information about the city </label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" rows="4" name="about_city" placeholder="Information about the city"></textarea>
                                      <div class="error_form about_city"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Facilities and highlights </label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" rows="4" name="facilities" placeholder="Facilities and highlights"></textarea>
                                      <div class="error_form facilities"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <button type="button" class="send_btn submit-btn">Submit</button>
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
        </div>
        </section>


        </div>
        <!--Main container sec end-->


        <script>
$(document).ready(function(){

$("body").on('click','.submit-btn',function() {
    var form_data = new FormData($('#location-form')[0]);
    $.ajax({
        url  : "<?php echo base_url(); ?>front/university/addlocations",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.submit-btn').attr('disabled',true).text('Loading....');
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
            $('#location-form')[0].reset();
            showToaster('success',resp.msg);
            setTimeout(function(){
                window.location.reload();
            },1000);
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.submit-btn').attr('disabled',false).text('Submit');
        },
        error:function(error)
        {
            $('.submit-btn').attr('disabled',false).text('Submit');
        }
    });
});

});

</script>  



     
