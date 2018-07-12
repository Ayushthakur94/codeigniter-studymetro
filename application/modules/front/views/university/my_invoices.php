       <?php //echo "<pre>"; print_r($details); die; ?>
        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   My Invoices
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
                              <th>Invoice</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1; if(!empty($details)){  foreach($details as $a) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>

                              <td><a download class="download_btn" href="<?php echo base_url().$a['file']; ?>" title="Click Here To Download Document"><i class="fa fa-download" aria-hidden="true"></i></a></td>

                              <td><?php echo date('F j, Y', strtotime($a['added_date'])); ?></td>
                            </tr>
                          <?php $i++; } } else { ?>
                          <tr ><td colspan="3" class="well"> No Record Found.</td></tr>
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
