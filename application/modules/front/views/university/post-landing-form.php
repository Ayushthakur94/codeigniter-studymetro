       <?php //echo "<pre>"; print_r($details); die; ?>
        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Post Landing Form
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
                      <a class="commn_btn" title="Add Webinar" href="<?php echo base_url('university/add-landing-form'); ?>">Add New</a>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>S.NO.</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Type</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1; if(!empty($landing_form)){ foreach($landing_form as $a) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $a['name']; ?></td>
                              <td><?php echo $a['email']; ?></td>
                              <td><?php echo $a['phone']; ?></td>
                              <td><?php if($a['type']==1){ echo 'Housing'; }
                                if($a['type']==2){ echo 'Airport pick'; }
                                if($a['type']==3){ echo 'CPT'; }
                                if($a['type']==4){ echo 'OPT'; } ?>
                              </td>
                              <td>
                                <a href="<?php echo base_url('university/edit-landing-form/'.$a['id']); ?>"> <i class="fa fa-edit"></i> Edit</a> 
                                <a href="<?php echo base_url('university/delete-landing-form/'.$a['id']); ?>"> <i class="fa fa-trash"></i> Delete </a>
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
