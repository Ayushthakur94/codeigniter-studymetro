       <?php //echo "<pre>"; print_r($details); die; ?>
        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   My Programs
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
                      <a class="btn btn-primary" title="Add New Program" href="<?php echo base_url('university/add-new-program'); ?>">Add New</a>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>S.NO.</th>
                              <th>Program</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1; foreach($details as $a) { for($j=0;$j<count($a);$j++){ ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $a[$j]['program_name']; ?></td>
                              <td><a href="<?php echo base_url('university/edit-program/'.$a[$j]['id']); ?>"> <i class="fa fa-edit"></i> Edit</a> / <a href="<?php echo base_url('university/delete-program/'.$a[$j]['id']); ?>"> <i class="fa fa-trash"></i> Delete </a></td>
                            </tr>
                          <?php $i++; } } ?>
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
