        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Notes
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                        <div class="col-md-9 col-sm-9">
                      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>front/user/notesmgmt">
                       <div class="profile_sec">
                         <div class="top_row">
                             <h2>Add Notes</h2>
                          </div> 
                          <div class="profile_content">
                              <div class="form-group">
                                  <label for="name" class="col-sm-3 control-label"> Note:</label>
                                  <div class="col-sm-9">
                                  <textarea class="form-control" name="notes" placeholder="Note" rows="5"><?php if(set_value('notes')) echo set_value('notes'); ?></textarea>
                                  <div class="error_form"><?php echo form_error('notes'); ?></div>
                                  </div>
                              </div>
                              <input type="hidden" name="id" value="" id="note-id">
                              <span ><button class="commn_btn">SUBMIT</button></span>
                              <span><a href="javascript:void(0);" class="commn_btn" onclick="cancelAction()">CANCEL</a></span>
                          </div>
                      </div>
                    
                     
                        </form>
                      <?php if(!empty($notes)) { ?>
                        <div class="top_row">
                           <h2>Your Notes</h2>
                        </div> 
                          <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>S.NO.</th>
                              <th>Note</th>
                              <th>Added Date</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1; foreach($notes as $n) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><a href="javascript:void(0);" class="content_tooltip" data-placement="auto" data-toggle="tooltip" title="<?php echo $n['notes']; ?>"><?php echo substr($n['notes'],0, 60); ?></a></td>
                              <td><?php echo convertDateTime($n['added_date']); ?></td>
                              <td>
                                <!-- <a href="javacsript:void(0);" class="content_tooltip edit-notes" main="<?php echo encode($n['added_date']); ?>" title="Click Here To Edit Notes">Edit</a> | -->
                                <a href="<?php echo base_url(); ?>front/user/deletenotes/<?php echo encode($n['id']); ?>" class="content_tooltip" onclick="return confirm('Are you sure ?')" title="Click Here To Delete Notes">Delete</a>
                              </td>
                            </tr>
                          <?php $i++; } ?>
                          </tbody>
                          </table>
                      <?php } ?>
                   </div> 
                   
                </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>


        </div>
        <!--Main container sec end-->
