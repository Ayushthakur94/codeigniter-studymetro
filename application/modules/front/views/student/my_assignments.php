        <?php $this->uid = $this->session->userdata("user_id"); ?>
        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Assignments
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                    <div class="col-md-9 col-sm-9">
                        <form method="post" action="<?php echo base_url('student/my-assignments'); ?>">
                            <div class="right_dashboard">
                                <div class="describ_box assign_ques">
                                <?php $i=1; if(!empty($questions)) { foreach($questions as $q) { ?>
                                    <h4><?php echo 'Q'.$i.'. '.$q['question']; ?></h4>
                                    <?php $answers = $this->common_model->getAllRecordsById(ANSWERS,array('user_id'=>$this->uid,'question_id'=>$q['id']));
                                        if(empty($answers)){ ?>

                                        <div class="content_edu">
                                            <!-- <input type="text" class="form-control" name="answer_<?php echo $q['id']; ?>" value="<?php $isset= 'answer_'.$q['id']; if(isset($_POST[$isset])){ echo $_POST[$isset]; } ?>"> -->

                                            <textarea class="form-control" name="answer_<?php echo $q['id']; ?>"><?php $isset= 'answer_'.$q['id']; if(isset($_POST[$isset])){ echo $_POST[$isset]; } ?></textarea>
                                            <!-- <input type="hidden" name="ques_<?php echo $q['id']; ?>"> -->
                                            <span style="color:red;"><?php echo form_error("answer_".$q['id']); ?></span>
                                        </div>

                                        <?php } else { ?>
                                        <div class="content_edu">
                                            <h3><?php echo 'Answer- '.$answers[0]['answer']; ?></h3>
                                        </div>
                                        <?php } ?>
                                    <?php $i++; } }?>
                                </div>
                                <?php if(empty($answers)){ ?>
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <?php } ?>
                            </div>
                        </form>
                   </div> 
                   
                </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>


        </div>
        <!--Main container sec end-->
