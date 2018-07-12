        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   My Notifications
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
                              <th>Username</th>
                              <!-- <th>Usertype</th>
                              <th>Notify Type</th> -->
                              <th>Message</th>
                              <th>Sent Date</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1; if(!empty($notification)){ foreach($notification as $val) { $name = getUserName($val['sender_id']);?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $name; ?></td>
                              <td>
                              <?php $array = array('NAME'=>$name,'TOPIC'=>'Pollution','AUTHOR'=>'Mathew Headen');
                               echo exactNotfiyMessage($val['notify_id'],$array); ?>
                              </td>
                              <td><?php echo convertDateTime($val['sent_datetime']); ?></td>
                              <td><a href="<?php echo base_url('front/user/delete_notification/'.$val['id']); ?>"> <i class="fa fa-trash"></i> Delete </a></td>
                            </tr>
                          <?php $i++; } } else{?>
                          
                          <tr>
                            <td colspan="5" class="well text-center"><?php echo 'No Notifaction found.' ?></td>
                          </tr>
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
