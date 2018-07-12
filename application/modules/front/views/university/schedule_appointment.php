       <?php //echo "<pre>"; print_r($details); die; ?>
        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Schedule Appointment
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
                      <a class="commn_btn" title="Add Webinar" href="<?php echo base_url('university/add-appointment'); ?>">Add New</a>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>S.NO.</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Type</th>
                              <th>Skype Id</th>
                              <th>Date</th>
                              <th>Time</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1; if(!empty($appointments)){ foreach($appointments as $a) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $a['name']; ?></td>
                              <td><?php echo $a['email']; ?></td>
                              <td><?php echo $a['phone']; ?></td>
                              <td><?php if($a['type']==1){ echo 'Indian Education Fair/ School Fair'; }
                              if($a['type']==2){ echo 'Talk to Study Metro though Skype/ Phone'; }
                              if($a['type']==3){ echo 'Hired Shared Resource'; }
                              if($a['type']==4){ echo 'Local Marketing via Digital, Paper, Radio Ads'; }
                              if($a['type']==5){ echo 'Shared CRM'; }
                              if($a['type']==6){ echo 'Marketing Material Printing and Courier In india'; }
                              if($a['type']==7){ echo 'Meet with SM Agents'; }
                              if($a['type']==8){ echo 'Open Study Centre'; } ?></td>
                              <td><?php echo $a['skype_id']; ?></td>
                              <td><?php echo $a['date']; ?></td>
                              <td><?php echo $a['time']; ?></td>
                              <td><?php if($a['status']==1){ echo '<a href="javascript:void(0)">Approved</a>' ;} else { echo '<a href="javascript:void(0)">Not Approved</a>'; } ?></td>

                              <td><?php if($a['status']==0){ ?>
                                <a href="<?php echo base_url('university/edit-appointment/'.$a['id']); ?>"> <i class="fa fa-edit"></i> Edit</a> 
                                <a href="<?php echo base_url('university/delete-appointment/'.$a['id']); ?>"> <i class="fa fa-trash"></i> Delete </a>
                                <?php } ?>
                                
                              </td>
                            </tr>
                          <?php $i++; } } else { ?>
                          <tr ><td colspan="10" class="well"> No Record Found.</td></tr>
                          <?php } ?>
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
