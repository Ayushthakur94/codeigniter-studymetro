        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   International Partnerships
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php $this->load->view('sidebar'); ?>
                    <div class="col-md-9 col-sm-9">
                    <h3>International Partnerships</h3><br/>
                    <p>This information is collected from all schools for the purpose of fostering partnerships between international institutions. For instance, if you are looking for a university to partner with in Brazil that could offer your school as a preferred study abroad destination or vice versa, you could find one another based on the information you fill out below.</p><br/>
                        <div class="right_dashboard">
                            <div class="describ_box view-section">
                                <?php 
                                  if(!empty($details)){
                                    $countries = unserialize($details[0]['country']);
                                  }
                                  if(!empty($details)){
                                    $programs = unserialize($details[0]['programs']);
                                  }
                                ?>
                                <h1> International Relations <button type="button" data-target=".edit-section" data-relatedtarget=".view-section" class="btn btn-primary pull-right inside-btn toggler"><i class="fa fa-pencil"></i> Edit </button></h1>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Countries where you are interested in associating with other schools:</h3>
                                       </div>
                                      <?php if(isset($countries) && !empty($countries)) { foreach($countries as $c) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $c; ?></button>
                                      <?php } } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>What type of programs are you interested in associating with:</h3>
                                       </div>
                                       <?php if(isset($programs) && !empty($programs)) { foreach($programs as $p) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $p; ?></button>
                                      <?php } } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Your institution is:</h3>
                                       </div>
                                      <?php if(isset($details[0]['institute_type']) && !empty($details[0]['institute_type'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['institute_type']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Is your institution (or any program or department in it) ranked in any way?</h3>
                                       </div>
                                       <?php if(isset($details[0]['is_your_institute']) && !empty($details[0]['is_your_institute'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['is_your_institute']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Is your Institution accredited:</h3>
                                       </div>
                                       <?php if(isset($details[0]['is_your_institute_accredited']) && !empty($details[0]['is_your_institute_accredited'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['is_your_institute_accredited']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Religious Affiliation:</h3>
                                       </div>
                                       <?php if(isset($details[0]['religious_affiliation']) && !empty($details[0]['religious_affiliation'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['religious_affiliation']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>What is your enrollment size:</h3>
                                       </div>
                                      <?php if(isset($details[0]['undergraduate']) && !empty($details[0]['undergraduate'])) { ?>
                                        Undergraduate: <button class="rbtn_remove" type="button"><?php echo $details[0]['undergraduate']; ?></button>
                                      <?php } ?>
                                      <?php if(isset($details[0]['graduate']) && !empty($details[0]['graduate'])) { ?>
                                        Graduate: <button class="rbtn_remove" type="button"><?php echo $details[0]['graduate']; ?></button>
                                      <?php } ?>
                                </div>
                                <?php 
                                  if(!empty($details)){
                                    $top_programs = unserialize($details[0]['top_programs']);
                                  }
                                  if(!empty($details)){
                                    $top_degrees = unserialize($details[0]['top_degrees']);
                                  }
                                ?>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>What are your top programs?</h3>
                                       </div>
                                       <?php if(isset($top_programs) && !empty($top_programs)) { foreach($top_programs as $tp) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $tp; ?></button>
                                      <?php } } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>What are your top degrees?</h3>
                                       </div>
                                       <?php if(isset($top_degrees) && !empty($top_degrees)) { foreach($top_degrees as $td) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $td; ?></button>
                                      <?php } } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>What is your institution known for nationally and/or internationally?</h3>
                                       </div>
                                       <?php if(isset($details[0]['institution_known']) && !empty($details[0]['institution_known'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['institution_known']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>What's your academic calendar?</h3>
                                       </div>
                                       <?php if(isset($details[0]['academic_calendar']) && !empty($details[0]['academic_calendar'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['academic_calendar']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>What accreditations, if any, do you have with your main programs and departments?</h3>
                                       </div>
                                       <?php if(isset($details[0]['accreditations']) && !empty($details[0]['accreditations'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['accreditations']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Primary language of Instruction:</h3>
                                       </div>
                                       <?php if(isset($details[0]['primary_language']) && !empty($details[0]['primary_language'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['primary_language']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Do you offer programs in English?</h3>
                                       </div>
                                       <?php if(isset($details[0]['offer_in_english']) && !empty($details[0]['offer_in_english'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['offer_in_english']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Do you have an international student service office?</h3>
                                       </div>
                                       <?php if(isset($details[0]['have_international_service']) && !empty($details[0]['have_international_service'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['have_international_service']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>How many agreements do you have with international institutions?</h3>
                                       </div>
                                       <?php if(isset($details[0]['agreements_with_international']) && !empty($details[0]['agreements_with_international'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['agreements_with_international']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Do you offer study abroad programs to your students (outgoing)?</h3>
                                       </div>
                                       <?php if(isset($details[0]['offer_study_abroad_programs']) && !empty($details[0]['offer_study_abroad_programs'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['offer_study_abroad_programs']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Do you offer study abroad programs to your partner institutions’ students (incoming)?</h3>
                                       </div>
                                       <?php if(isset($details[0]['offer_study_abroad_programs_partner']) && !empty($details[0]['offer_study_abroad_programs_partner'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['offer_study_abroad_programs_partner']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Do you provide housing options for international students?</h3>
                                       </div>
                                       <?php if(isset($details[0]['is_housing_option']) && !empty($details[0]['is_housing_option'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['is_housing_option']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Are you interested in faculty exchange?</h3>
                                       </div>
                                       <?php if(isset($details[0]['interested_in_faculty_exchange']) && !empty($details[0]['interested_in_faculty_exchange'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['interested_in_faculty_exchange']; ?></button>
                                      <?php } ?>
                                </div>
                                <div class="content_edu">
                                       <div class="left_edu">
                                           <h3>Do you offer research opportunities for undergraduate/graduate students?</h3>
                                       </div>
                                       <?php if(isset($details[0]['offer_research_opportunities']) && !empty($details[0]['offer_research_opportunities'])) { ?>
                                        <button class="rbtn_remove" type="button"><?php echo $details[0]['offer_research_opportunities']; ?></button>
                                      <?php } ?>
                                </div>
                            </div>
                            <div class="describ_box edit-section hidden">
                              <form class="form-horizontal" id="international-form" method="post" action="<?php echo base_url(); ?>front/university/saveInternationalPartnership">
                              <h1> International Relations <button class="btn btn-primary pull-right inside-btn"> Save </button> </h1>
                                <div class="profile_content">
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Countries where you are interested in associating with other schools: (select as many as you would like):</label>
                                    <div class="col-sm-9">
                                    <select class="form-control chosen_data" name="country[]" multiple="true">
                                      <?php foreach(getCountries() as $c) { ?>
                                        <option value="<?php echo $c['nicename']; ?>" <?php if(isset($countries) && in_array($c['nicename'], $countries)) echo "selected"; ?>><?php echo $c['nicename']; ?></option>
                                      <?php } ?>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> What type of programs are you interested in associating with:</label>
                                    <div class="col-sm-9">
                                    <select class="form-control chosen_data" name="programs[]" multiple>
                                      <?php foreach(program_types() as $p) { ?>
                                        <option value="<?php echo $p; ?>" <?php if(isset($programs) && in_array($p, $programs)) echo "selected"; ?>><?php echo $p; ?></option>
                                      <?php } ?>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Your institution is:</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="institute_type">
                                      <option value="">Select</option>
                                      <option value="Private nonprofit" <?php if(isset($details[0]['institute_type']) && $details[0]['institute_type'] == 'Private nonprofit') echo "selected"; ?>>Private nonprofit</option>
                                      <option value="Private for-profit" <?php if(isset($details[0]['institute_type']) && $details[0]['institute_type'] == 'Private for-profit') echo "selected"; ?>>Private for-profit</option>
                                      <option value="Public" <?php if(isset($details[0]['institute_type']) && $details[0]['institute_type'] == 'Public') echo "selected"; ?>>Public</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Is your institution (or any program or department in it) ranked in any way?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="is_your_institute">
                                      <option value="">Select</option>
                                      <option value="Yes" <?php if(isset($details[0]['is_your_institute']) && $details[0]['is_your_institute'] == 'Yes') echo "selected"; ?>>Yes</option>
                                      <option value="No" <?php if(isset($details[0]['is_your_institute']) && $details[0]['is_your_institute'] == 'No') echo "selected"; ?>>No</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Is your Institution accredited?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="is_your_institute_accredited">
                                      <option value="">Select</option>
                                      <option value="Yes" <?php if(isset($details[0]['is_your_institute_accredited']) && $details[0]['is_your_institute_accredited'] == 'Yes') echo "selected"; ?>>Yes</option>
                                      <option value="No" <?php if(isset($details[0]['is_your_institute_accredited']) && $details[0]['is_your_institute_accredited'] == 'No') echo "selected"; ?>>No</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Religious Affiliation:</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="religious_affiliation">
                                      <option value="">Select</option>
                                      <option value="Adventist" <?php if(isset($details[0]['religious_affiliation']) && $details[0]['religious_affiliation'] == 'Adventist') echo "selected"; ?>>Adventist</option>
                                      <option value="African Methodist" <?php if(isset($details[0]['religious_affiliation']) && $details[0]['religious_affiliation'] == 'African Methodist') echo "selected"; ?>>African Methodist</option>
                                    </select>
                                    </div>
                                  </div>
                                  <h4> &nbsp; &nbsp; &nbsp; &nbsp; What is your enrollment size:</h4>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Undergraduate</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="undergraduate" onkeypress="return validateNumbers(event)" placeholder="Undergraduate" value="<?php if(isset($details[0]['undergraduate'])) echo $details[0]['undergraduate']; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Graduate</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="graduate" onkeypress="return validateNumbers(event)" placeholder="Graduate" value="<?php if(isset($details[0]['graduate'])) echo $details[0]['graduate']; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> What are your top programs?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control chosen_data" name="top_programs[]" multiple>
                                      <option value="Accounting" <?php if(isset($top_programs) && in_array('Accounting', $top_programs)) echo "selected"; ?>>Accounting</option>
                                      <option value="Acupunture" <?php if(isset($top_programs) && in_array('Acupunture', $top_programs)) echo "selected"; ?>>Acupunture</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> What are your top degrees?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control chosen_data" name="top_degrees[]" multiple>
                                      <?php foreach(top_degrees() as $td) { ?>
                                        <option value="<?php echo $td; ?>" <?php if(isset($top_degrees) && in_array($td, $top_degrees)) echo "selected"; ?>><?php echo $td; ?></option>
                                      <?php } ?>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> What is your institution known for nationally and/or internationally?</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="institution_known" placeholder="What is your institution known for nationally and/or internationally?" value="<?php if(isset($details[0]['institution_known'])) echo $details[0]['institution_known']; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> What's your academic calendar?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="academic_calendar">
                                      <option value="">Select</option>
                                      <option value="Quarter" <?php if(isset($details[0]['academic_calendar']) && $details[0]['academic_calendar'] == 'Quarter') echo "selected"; ?>>Quarter</option>
                                      <option value="Semester" <?php if(isset($details[0]['academic_calendar']) && $details[0]['academic_calendar'] == 'Semester') echo "selected"; ?>>Semester</option>
                                      <option value="Year" <?php if(isset($details[0]['academic_calendar']) && $details[0]['academic_calendar'] == 'Year') echo "selected"; ?>>Year</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> What accreditations, if any, do you have with your main programs and departments?</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="accreditations" placeholder="What accreditations, if any, do you have with your main programs and departments?" value="<?php if(isset($details[0]['accreditations'])) echo $details[0]['accreditations']; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Primary language of Instruction?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="primary_language">
                                      <option value="">Select</option>
                                      <option value="Afghan" <?php if(isset($details[0]['primary_language']) && $details[0]['primary_language'] == 'Afghan') echo "selected"; ?>>Afghan</option>
                                      <option value="Albanian" <?php if(isset($details[0]['primary_language']) && $details[0]['primary_language'] == 'Albanian') echo "selected"; ?>>Albanian</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Do you offer programs in English?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="offer_in_english">
                                      <option value="">Select</option>
                                      <option value="Yes" <?php if(isset($details[0]['offer_in_english']) && $details[0]['offer_in_english'] == 'Yes') echo "selected"; ?>>Yes</option>
                                      <option value="No" <?php if(isset($details[0]['offer_in_english']) && $details[0]['offer_in_english'] == 'No') echo "selected"; ?>>No</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Do you have an international student service office?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="have_international_service">
                                      <option value="">Select</option>
                                      <option value="Yes" <?php if(isset($details[0]['have_international_service']) && $details[0]['have_international_service'] == 'Yes') echo "selected"; ?>>Yes</option>
                                      <option value="No" <?php if(isset($details[0]['have_international_service']) && $details[0]['have_international_service'] == 'No') echo "selected"; ?>>No</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> How many agreements do you have with international institutions?</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="agreements_with_international" onkeypress="return validateNumbers(event)" placeholder="How many agreements do you have with international institutions?" value="<?php if(isset($details[0]['agreements_with_international'])) echo $details[0]['agreements_with_international']; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Do you offer study abroad programs to your students (outgoing)?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="offer_study_abroad_programs">
                                      <option value="">Select</option>
                                       <option value="Yes" <?php if(isset($details[0]['offer_study_abroad_programs']) && $details[0]['offer_study_abroad_programs'] == 'Yes') echo "selected"; ?>>Yes</option>
                                      <option value="No" <?php if(isset($details[0]['offer_study_abroad_programs']) && $details[0]['offer_study_abroad_programs'] == 'No') echo "selected"; ?>>No</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Do you offer study abroad programs to your partner institutions’ students (incoming)?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="offer_study_abroad_programs_partner">
                                      <option value="">Select</option>
                                       <option value="Yes" <?php if(isset($details[0]['offer_study_abroad_programs_partner']) && $details[0]['offer_study_abroad_programs_partner'] == 'Yes') echo "selected"; ?>>Yes</option>
                                      <option value="No" <?php if(isset($details[0]['offer_study_abroad_programs_partner']) && $details[0]['offer_study_abroad_programs_partner'] == 'No') echo "selected"; ?>>No</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Do you provide housing options for international students?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="is_housing_option">
                                      <option value="">Select</option>
                                       <option value="Yes" <?php if(isset($details[0]['is_housing_option']) && $details[0]['is_housing_option'] == 'Yes') echo "selected"; ?>>Yes</option>
                                      <option value="No" <?php if(isset($details[0]['is_housing_option']) && $details[0]['is_housing_option'] == 'No') echo "selected"; ?>>No</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Are you interested in faculty exchange?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="interested_in_faculty_exchange">
                                      <option value="">Select</option>
                                       <option value="Yes" <?php if(isset($details[0]['interested_in_faculty_exchange']) && $details[0]['interested_in_faculty_exchange'] == 'Yes') echo "selected"; ?>>Yes</option>
                                      <option value="No" <?php if(isset($details[0]['interested_in_faculty_exchange']) && $details[0]['interested_in_faculty_exchange'] == 'No') echo "selected"; ?>>No</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Do you offer research opportunities for undergraduate/graduate students?</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="offer_research_opportunities">
                                      <option value="">Select</option>
                                       <option value="Yes" <?php if(isset($details[0]['offer_research_opportunities']) && $details[0]['offer_research_opportunities'] == 'Yes') echo "selected"; ?>>Yes</option>
                                      <option value="No" <?php if(isset($details[0]['offer_research_opportunities']) && $details[0]['offer_research_opportunities'] == 'No') echo "selected"; ?>>No</option>
                                    </select>
                                    </div>
                                  </div>
                                </div>
                              </form>
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
  $(document).ready(function(){
    $(".chosen_data").chosen({
      placeholder_text_multiple: "Select",
    });
  });
</script>




