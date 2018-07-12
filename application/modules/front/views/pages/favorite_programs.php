        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Favorite Programs
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
                        <?php if(!empty($programs)) { foreach($programs as $pl){ ?>
                        <div class="univer_box fav_prgrm course_detail" id="remove_row_<?php echo $pl['id']; ?>">
                            <h4><?php echo get_university_detail($pl['program_id'],'name'); ?></h4>
                            <div class="univ_logo">
                                <div class="univ_meta">
                                    <a href="javascript:void(0)" title="<?php echo $pl['program_name']; ?>">
                                        <?php echo substr($pl['program_name'], 0,40); ?>
                                            <span class="course_meta"> <?php echo $pl['location']; ?></span>
                                    </a>
                                    <i class="fa fa-star star clicked fvrt_prgrm" title="Un-Favorite"  program_id="<?php echo $pl['id']; ?>"></i>
                                </div>
                            </div>
                            <ul class="univ_info">
                                <li>$
                                    <?php echo $pl['application_fee']; ?> USD/year</li>
                            </ul>
                            <div class="unive_data">
                                <?php echo $pl['course_type']; ?>
                            </div>
                            <div class="apply_now_wrap pull-right">
                            <?php
                                $uid = $this->session->userdata("user_id");
                                if(empty($uid)){ ?>
                                    <a href="<?php echo base_url(); ?><?php echo $pl['id']; ?>/apply-to-program?type=0" class="appy_btn">apply to this program</a>
                            <?php  }else{ ?>
                                    <a href="<?php echo base_url(); ?><?php echo $pl['id']; ?>/apply-to-program?type=0" class="appy_btn">apply to this program</a>
                            <?php } ?>
                            </div>
                        </div>
                        <?php } } else { ?>
                        <div class="well" >No Record Found</div>
                        <?php } ?>

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

<script type="text/javascript">
  $('body').on('click','.fvrt_prgrm',function(){
    var program_id = $(this).attr('program_id');

    $.ajax({
            url:"<?php echo base_url('user/RemoveFavoritePrograms'); ?>",
            type:"POST",
            data:{program_id:program_id},
            success:function(result)
            {
              var obj = JSON.parse(result);
              if(obj.type=="success")
              {
                 $('#remove_row_'+program_id).fadeOut(1000);
                 showToaster('success',obj.msg);
              }
            }
    });
  });
</script>