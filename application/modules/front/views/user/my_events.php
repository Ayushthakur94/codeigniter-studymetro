        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   My Events
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
                      <div class="box-body table-responsive no-padding">
                        <!-- view events -->
                        
                            <div class="head_left_video "> Event 
                                <a href="javascript:void(0);" class="pull-right"><i class="fa fa-flag" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="events">
                                <?php foreach(getevents() as $e)
                                { $dateArr = explode("-", $e['date']); ?>
                                    
                                    <div class="item my_events col-sm-4"><div class="head_left_video_content event" style="background-image:url(../assets/images/event_bg.jpg);">
                                    
                                    <div class="event_left"><div class="date_box"><div class="date_box_top"><?php echo $dateArr[2]; ?> </div><div class="date_box_bottom"><?php echo $dateArr[1]; ?> <span><?php echo $dateArr[0]; ?></span> </div></div><span>Posted in: <?php echo $e['posted_in']; ?></span></div>
                                    <div class="event_right"><div class="head_event_right"> Upcoming Event </div><p title="<?php echo $e['content']; ?>"><?php echo substr($e['content'],0,80); ?></p></div></div></div>
                                <?php } ?>
                        </div>
                             
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