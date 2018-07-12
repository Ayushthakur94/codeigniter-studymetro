        <!--Main container sec start-->
        <div class="main_container">
            <div class="head_dash">
              <div class="container">
                 <div class="row">
                 <div class="col-md-12 col-sm-12">
                   Apply To Program
                   </div>
                 </div>
              </div>
            </div>
            <section class="video_sec blog_wrap">
                <div class="container">
                    <div class="row">
                    <?php // $this->load->view('sidebar'); ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="right_dashboard">
                        <?php
                          $univ_name = '';
                          if(isset($_GET['type']) && $_GET['type'] == 0){
                            $univ_name =  getDetailsBy(UNIVERSITIES,'id',$detail['university_id'],'name');
                          }else{
                            $univ_name = $detail['university'];
                          }
                        ?>
                          <center><h2><?php echo ucwords($univ_name); ?></h2></center>
                            <div class="top_wrap">
                                <h3> Student information <div class="clearfix"></div></h3>
                            </div>
                            <div class="add-location">
                              <form class="form-horizontal" id="apply-program-form" method="post" enctype="multipart/form-data">
                              <div class="profile_content">
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> First Name *</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                      <div class="error_form first_name"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Last Name </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                      <div class="error_form last_name"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Email *</label>
                                    <div class="col-sm-9">
                                      <input type="email" class="form-control" name="email" placeholder="Email">
                                      <div class="error_form email"></div>
                                    </div>
                                  </div>
                                  <input type="hidden" name="program_type" value="<?php echo $_GET['type']; ?>">
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Phone no * </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" onkeypress="return validateNumbers(event)" name="phone_no" placeholder="Phone no">
                                      <div class="error_form phone_no"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Skype Id </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="skype_id" placeholder="Skype Id">
                                      <div class="error_form skype_id"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Gender </label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Not Specified">Not Specified</option>
                                      </select>
                                      <div class="error_form gender"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Secondary Email </label>
                                    <div class="col-sm-9">
                                      <input type="email" class="form-control" name="secondary_email" placeholder="Secondary Email">
                                      <div class="error_form secondary_email"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Date Of Birth </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control bs-datepicker" name="dob" placeholder="Date Of Birth">
                                      <div class="error_form dob"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Marital Status </label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="marital_status">
                                        <option value="">Select Marital Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Separated">Separated</option>
                                      </select>
                                      <div class="error_form marital_status"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Birth Country </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="birth_country" placeholder="Birth Country">
                                      <div class="error_form birth_country"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Birth Place</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="birth_place" placeholder="Birth Place">
                                      <div class="error_form birth_place"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Nationality</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="nationality" placeholder="Nationality">
                                      <div class="error_form nationality"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Occupation</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="occupation" placeholder="Occupation">
                                      <div class="error_form occupation"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Passport Number *</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="passport_number" placeholder="Passport Number">
                                      <div class="error_form passport_number"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Passport Issue Date</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control bs-datepicker" name="passport_issue_date" placeholder="Passport Issue Date">
                                      <div class="error_form passport_issue_date"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Passport Location</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="passport_location" placeholder="Passport Location">
                                      <div class="error_form passport_location"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Passport Expiry Date</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control bs-datepicker" name="passport_expiry_date" placeholder="Passport Expiry Date">
                                      <div class="error_form passport_expiry_date"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Address 1 *</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="address_1" placeholder="Address 1">
                                      <div class="error_form address_1"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Address 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="address_2" placeholder="Address 2">
                                      <div class="error_form address_2"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Postal Code</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="postal_code" placeholder="Postal Code">
                                      <div class="error_form postal_code"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> WhatsApp Number</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="whatsapp_number" placeholder="WhatsApp Number">
                                      <div class="error_form whatsapp_number"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Country </label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="country">
                                        <option value="">Select Country</option>
                                      </select>
                                      <div class="error_form country"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> State</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="state" placeholder="State">
                                      <div class="error_form state"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> City</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="city" placeholder="City">
                                      <div class="error_form city"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Emergency Contact Person Name</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="emergency_contact_person_name" placeholder="Emergency Contact Person Name">
                                      <div class="error_form emergency_contact_person_name"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Emergency Contact Person Number</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="emergency_contact_person_no" placeholder="Emergency Contact Person Number">
                                      <div class="error_form emergency_contact_person_no"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Relationship</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="relationship" placeholder="Relationship">
                                      <div class="error_form relationship"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Last Education Level </label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="schooling">
                                        <option value="">Select Last Education Level</option>
                                      </select>
                                      <div class="error_form schooling"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Last School College University Name</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="last_school" placeholder="Last School College University Name">
                                      <div class="error_form last_school"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Program Of Interest </label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="program_of_interest">
                                        <option value="">Select Program Of Interest</option>
                                      </select>
                                      <div class="error_form program_of_interest"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Technical Tests </label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="technical_tests">
                                        <option value="">Select Technical Tests</option>
                                      </select>
                                      <div class="error_form technical_tests"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Technical Test Date Taken</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="technical_test_taken_date" placeholder="Technical Test Date Taken">
                                      <div class="error_form technical_test_taken_date"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> English Test </label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="english_test">
                                        <option value="">Select English Test</option>
                                        <option value="IELTS">IELTS</option>
                                        <option value="TOEFL">TOEFL</option>
                                        <option value="PTE">PTE</option>
                                      </select>
                                      <div class="error_form english_test"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> English_ Test Date Taken</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control bs-datepicker" name="english_test_taken_date" placeholder="English Test Date Taken">
                                      <div class="error_form english_test_taken_date"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Work History Experience</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="history_experience" placeholder="Work History Experience">
                                      <div class="error_form history_experience"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Position Held</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="position_held" placeholder="Position Held">
                                      <div class="error_form position_held"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Organization Name</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="organization_name" placeholder="Organization Name">
                                      <div class="error_form organization_name"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> How Did You Hear About US </label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="hear_about_us">
                                        <option value="">Select How Did You Hear About US</option>
                                        <?php foreach(hear_about_us() as $hu) { ?>
                                          <option value="<?php echo $hu; ?>"><?php echo $hu; ?></option>
                                        <?php } ?>
                                      </select>
                                      <div class="error_form hear_about_us"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Education Documents</label>
                                    <div class="col-sm-9">
                                      <input type="file" class="form-control" name="education_documents">
                                      <div class="error_form education_documents"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Passport & Resume</label>
                                    <div class="col-sm-9">
                                      <input type="file" class="form-control" name="passport_resume">
                                      <div class="error_form passport_resume"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Test Score</label>
                                    <div class="col-sm-9">
                                      <input type="file" class="form-control" name="test_score">
                                      <div class="error_form test_score"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> SOP & LOR`s</label>
                                    <div class="col-sm-9">
                                      <input type="file" class="form-control" name="sop_lor">
                                      <div class="error_form sop_lor"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Finance Documents</label>
                                    <div class="col-sm-9">
                                      <input type="file" class="form-control" name="finance_documents">
                                      <div class="error_form finance_documents"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Is an education counsellor helping you</label>
                                    <div class="col-sm-9">
                                    <div class="radio disabled">
                                      <label><input type="radio" name="education_counsellor" checked value="Yes">Yes</label>
                                    </div>
                                    <div class="radio disabled">
                                      <label><input type="radio" name="education_counsellor" value="No">No</label>
                                    </div>
                                      <div class="error_form education_counsellor"></div>
                                    </div>
                                  </div>
                                  <input type="hidden" name="program_id" value="<?php echo $program_id; ?>">
                                  <input type="hidden" name="amount" value="50">
                                  <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label"> Counsellor Agency Name</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="counsellor_agency_name" placeholder="Counsellor Agency Name">
                                      <div class="error_form counsellor_agency_name"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <button type="button" class="send_btn submit-btn">Submit</button>
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
    <?php
      $ApplicationFees = (isset($detail['application_fee'])) ? $detail['application_fee'] : DEFAULT_PROGRAM_FEE;
    ?>
    <!-- Modal  for payment start -->
    <div class="modal fade login" id="program-payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Payment</h4>
          </div>
          <div class="modal-body">
          <?php
              $merchantTxnId = uniqid(); 
              $currency = "USD";
              $orderAmount = $ApplicationFees;
              $data = CITRUS_VANITY_URL.$orderAmount.$merchantTxnId.$currency;
              $securitySignature = hash_hmac('sha1', $data, CITRUS_SECRET_KEY);
          ?>
            <form align="center" id="citrus-form" method="post" action="<?php echo CITRUS_FORM_URL; ?>">
               <input type="hidden" id="merchantTxnId" name="merchantTxnId" value="<?php echo $merchantTxnId; ?>" />
               <input type="hidden" id="orderAmount" name="orderAmount" value="<?php echo $orderAmount; ?>" />
               <input type="hidden" id="currency" name="currency" value="<?php echo $currency; ?>" />
               <input type="hidden" name="returnUrl" value="" class="citrus-return-url" />
               <input type="hidden" id="secSignature" name="secSignature" value="<?php echo $securitySignature; ?>" />
           </form>
            <form action="<?php echo PAYPAL_FORM_URL; ?>" method="post" id="paypal-form">
                <input type="hidden" name="cmd" value="_xclick" />
                <input type="hidden" name="charset" value="utf-8" />
                <input type="hidden" name="business" value="<?php echo PAYPAL_BUSINESS_ID; ?>" />
                <input type="hidden" name="item_name" value="Programs" />
                <input type="hidden" name="custom" value="" class="custom-field" /> 
                <input type="hidden" name="amount" value="<?php echo $ApplicationFees; ?>" />
                <input type="hidden" name="currency_code" value="USD" />
                <input type="hidden" name="return" value="<?php echo base_url(); ?>front/user/paypal_success" />
                <input type="hidden" name="cancel_return" value="<?php echo base_url(); ?>front/user/cancel_payment" />
                <input type="hidden" name="bn" value="Business_BuyNow_WPS_SE" />
            </form>
            <form method="post" id="payment-form">
              <p class="application-fee">Total Application Fee - $<?php echo $ApplicationFees; ?></p>
              <div class="form-group">
                <label for="">Pay By</label>
                <select class="form-control" name="pay_type" required>
                  <option value="0">Paypal</option>
                  <option value="1">Citrus</option>
                </select>
              </div>
              <div class="login_button">
                <button type="button" class="btn btn-default pay-btn">Pay Now</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal  for payment end -->

<script> 

$('document').ready(function(){
  $('body').on('click','.pay-btn',function(){
    var type = $('select[name="pay_type"]').val();
    if(type == 0){
      $('#paypal-form').submit();
    }else{
      $('#citrus-form').submit();
    }
  });

  $("body").on('click','.send_btn',function() {
      var form_data = new FormData($('#apply-program-form')[0]);
      $.ajax({
          url  : "<?php echo base_url(); ?>front/user/submitApplyProgramForm",
          type : "POST",
          data : form_data,   
          dataType : "JSON",   
          cache: false,
          contentType: false,
          processData: false,   
          beforeSend:function(){
            $('.send_btn').attr('disabled',true).text('Loading....');
            ajaxindicatorstart();
          },       
          success: function(resp){
             $('.error_form').html("");
             if(resp.type == "validation_err"){
               var errObj = resp.msg;
               var keys   = Object.keys(errObj);
               var count  = keys.length;
               for (var i = 0; i < count; i++) {
                   $('.'+keys[i]).html(errObj[keys[i]]);
               };
             }
             else if(resp.type == "success"){
              var return_url = "<?php echo base_url(); ?>front/user/citrus_return?id="+resp.id;
              $('#apply-program-form')[0].reset();
              $('input.custom-field').val(resp.id);
              $('input.citrus-return-url').val(return_url);
              $('#program-payment').modal('show');
             }
             else{
              showToaster('error',resp.msg);  
             }
             $('.send_btn').attr('disabled',false).text('Save');
             ajaxindicatorstop();
          },
          error:function(error)
          {
              $('.send_btn').attr('disabled',false).text('Save');
              ajaxindicatorstop();
          }
      });
  });        

});

</script>          


        



     
