        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   My Applications
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
                              <th>Program</th>
                              <th>University</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone No</th>
                              <th>Pay Status</th>
                              <!-- <th>Program Status</th> -->
                              <th>Interview Date</th>
                              <th>Apply Date</th>
                              <!-- <th>Action</th> -->
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1; foreach($applications as $a) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo getDetailsBy(PROGRAMS,'id',$a['program_id'],'program_name'); ?></td>
                              <?php $univ_id = $this->common_model->getSingleRecordById(PROGRAMS,array('id'=>$a['program_id'])); 
                              $univ_name = $this->common_model->getSingleRecordById(UNIVERSITIES,array('id'=>$univ_id['university_id']));
                              //print_r($univ_name['name']); die; ?>
                              <td><?php echo $univ_name['name']; ?></td>
                              <td><?php echo $a['first_name']." ".$a['last_name']; ?></td>
                              <td><?php echo $a['email']; ?></td>
                              <td><?php echo $a['phone_no']; ?></td>
                              <td><?php echo (!empty($a['pay_status'])) ? $a['pay_status'] : 'Pending'; ?></td>
                              <td class="hidden">
                              <select user_id="<?php echo $a['user_id']; ?>" app_id="<?php echo $a['id']; ?>" name="app_status" id="app_status" class="app_status form-control">
                                <option value="0" <?php if($a['program_status']==0) { echo 'selected'; } ?>>Applied</option>
                                <option value="1" <?php if($a['program_status']==1) { echo 'selected'; } ?>>In Process</option>
                                <option value="2" <?php if($a['program_status']==2) { echo 'selected'; } ?>>I20 Release</option>
                                <option value="3" <?php if($a['program_status']==3) { echo 'selected'; } ?>>Visa Appointment Date</option>
                                <option value="4" <?php if($a['program_status']==4) { echo 'selected'; } ?>>Visa Approved</option>
                                <option value="5" <?php if($a['program_status']==5) { echo 'selected'; } ?>>Visa Declined</option>
                                <option value="6" <?php if($a['program_status']==6) { echo 'selected'; } ?>>Tution Fee Paid</option>
                                <option value="7" <?php if($a['program_status']==7) { echo 'selected'; } ?>>Accepted</option>
                              </select>
                              <td>
                              <?php if($a['program_status']==7){ ?>
                                  <input type="text" name="interview_date" id="interview_date" class="interview_date" prgrm_id="<?php echo $a['id']; ?>" user_id="<?php echo $a['user_id']; ?>" value="<?php echo $a['interview_date']; ?>"> <?php } ?>
                              </td>
                              <td><?php echo convertDateTime($a['apply_date']); ?></td>
                              <td class="hidden">
                                <select user_id="<?php echo $a['user_id']; ?>" app_id="<?php echo $a['id']; ?>" name="action" id="action" class="action form-control">
                                <option value="">Please Select</option>
                                <option value="document">Download Documents</option>
                                </select>
                              </td>
                            </tr>
                          <?php $i++; } ?>
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

        
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
  $( function() {
    $( ".interview_date" ).datepicker({
        minDate: 0,
        format: "yyyy-m-dd",
        autoclose: true
    });
  });

  // for change interview date

  $('body').on('change','#interview_date',function(){
    var interview_date = $(this).val();
    var prgrm_id = $(this).attr('prgrm_id');
    var user_id=$(this).attr('user_id');
    $.ajax({
            url:"<?php echo base_url('student/setInterviewDate'); ?>",
            type:"POST",
            data:{interview_date:interview_date,prgrm_id:prgrm_id,user_id:user_id},
            success:function(result)
            { 
              var obj = JSON.parse(result);
              //alert(obj);
              if(obj.type=="success")
              {
                showToaster('success',obj.msg);
              }
              else if(obj.type=="error")
              {
                showToaster('error',obj.msg);
              }
            }
    });
  });
// for change app status
  $('body').on('change','.app_status',function(){
    var prgrm_status = $(this).val();
    var prgrm_id = $(this).attr('app_id');
    var user_id=$(this).attr('user_id');
    $.ajax({
            url:"<?php echo base_url('front/student/changeAppStatus'); ?>",
            type:"POST",
            dataType:"JSON",
            data:{prgrm_status:prgrm_status,prgrm_id:prgrm_id,user_id:user_id},
            success:function(resp)
            { //alert(result);
              if(resp.type == "success")
              {
                showToaster('success',resp.msg);
                setTimeout(function(){ location.reload(); },1000);
              }
             else{
              showToaster('error',resp.msg);  
             }
            }
    });
  });

  // for operation on action

  $('body').on('change','.action',function(){
    var action = $(this).val();
    //var user_id = $(this).attr('user_id');
    if(action=='document')
    {
      location.href = "<?php echo base_url(); ?>user/upload_documents";
    }
  });
</script>