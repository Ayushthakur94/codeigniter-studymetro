        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   University Dashboard
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
                      <div class="table_box">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>S.NO.</th>
                              <th>University</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i = 0; $uid = $this->session->userdata("user_id"); foreach ($assign_univ as $a) { $univ = explode(',',$a['university_id']); foreach($university as $u){
                                for($j=$i;$j<count($univ);$j++){
                                  if($u['id']==$univ[$j]){
                                     $univ_name[]= $u['name'];
                                     $univ_id[]= $u['id'];?>
                            <tr>
                              <td><?php echo $i+1; ?></td>
                              
                              <td><?php echo $univ_name[$i]; ?></td>
                              <td><a href="<?php echo base_url('university/updateUniversityData/'.$univ_id[$i]); ?>" class="edit_assign_univ" title="Assign University">
                                Edit
                              </a></td>
                            </tr>
                          <?php $i++; 
                                  }
                                } 
                              }  } ?>
                          </tbody>
                          </table>
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

        <!-- login Modal Start -->
<div class="modal fade model_logoinform" id="assigned_university" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Assigned University</h4>
      </div>
      <div class="modal-body">
      <!-- <form method="post" action=""> -->
       <input type="hidden" name="assign_univ_id" id="assign_univ_id" value="" />
        <div class="form-group">
            <label for="inputEmail">University List</label><br/>
            <select multiple="" name="univ_name" id="univ_name" class="chosen-select form-control">
              <!-- <option value="">Select University</option> -->
              <?php foreach ($assign_univ as $a) { $univ = explode(',',$a['university_id']);
              foreach($university as $u){
                 ?>
                    <option value="<?php echo $u['id']; ?>" <?php for($j=0;$j<count($univ);$j++){
                  if($u['id']==$univ[$j]){ echo 'selected'; } } ?> ><?php echo $u['name']; ?></option>
                 <?php } } ?>
              
            </select>
        </div>
        
        <input type="submit" id="submit_univ" class="btn btn-primary" value="Submit">
        <!-- <a href="javascript:"  class="btn btn-primary">Login</a> -->
           <!-- </form> -->
      </div>
      
    </div>
  </div>
</div>
<!-- login Modal End -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/chosen.min.css">
<script src="<?php echo base_url(); ?>assets/admin/js/chosen.jquery.js"></script>

<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      
      $(selector).chosen(config[selector]);
    }

    //$('#univ_name_chosen').attr('style','width: 100%;');
  </script>

<script type="text/javascript">
  // $('body').on('click','.edit_assign_univ',function(){
  //   var univ_id = $(this).attr('univ_id');
  //   alert(univ_id);
  //   $('#assigned_university').modal('show');
  //   $('#assign_univ_id').val(univ_id);
  // });

  // $('body').on('click','#submit_univ',function(){
  //   var user_id = $('#assign_user_id').val();
  //   var ass_univ_id = $('#assign_univ_id').val();
  //   var univ_id = $('#univ_name').val();
  //   var univ_name = JSON.stringify(univ_id);
  //   //alert(user_id+"=="+univ_name+"=="+ass_univ_id);
  //   $.ajax({
  //       url:"<?php echo base_url('university/assignUniversity'); ?>",
  //       type:"POST",
  //       data:{user_id:user_id,univ_name:univ_name,ass_univ_id:ass_univ_id},
  //       success:function(result)
  //       {//alert(result);
  //           var obj = JSON.parse(result);
  //           if(obj.type=="success")
  //           {
  //             showToaster('success',obj.msg);
  //             $('#assigned_university').modal('hide');
  //             setTimeout(function(){ location.reload(); },1500);
  //           }
  //           else if(obj.type=="error")
  //           {
  //             showToaster('error',obj.msg);
  //           }
  //       }
  //   });
    
  // });
</script>