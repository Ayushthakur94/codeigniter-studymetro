       <?php //echo "<pre>"; print_r($details); die; ?>
        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Schedule Webinar
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
                      <a class="commn_btn" title="Add Webinar" href="<?php echo base_url('university/add-webinar'); ?>">Add New</a>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>S.NO.</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Skype Id</th>
                              <th>Date</th>
                              <th>Time</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1; if(!empty($webinars)){ foreach($webinars as $a) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $a['name']; ?></td>
                              <td><?php echo $a['email']; ?></td>
                              <td><?php echo $a['phone']; ?></td>
                              <td><?php echo $a['skype_id']; ?></td>
                              <td><?php echo $a['date']; ?></td>
                              <td><?php echo $a['time']; ?></td>
                              <td><?php if($a['status']==1){ echo '<a href="javascript:void(0)">Approved</a>' ;} else { echo '<a href="javascript:void(0)">Not Approved</a>'; } ?></td>
                              <td><?php if($a['status']==0){ ?>
                                <a href="<?php echo base_url('university/edit-webinar/'.$a['id']); ?>"> <i class="fa fa-edit"></i> Edit</a> 
                                <a href="<?php echo base_url('university/delete-webinar/'.$a['id']); ?>"> <i class="fa fa-trash"></i> Delete </a>
                                <?php } ?>
                                
                              </td>
                            </tr>
                          <?php $i++; } } else { ?>
                          <tr ><td colspan="9" class="well"> No Record Found.</td></tr>
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
