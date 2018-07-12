  <?php $user = $this->session->userdata('user_id');
    if(empty($user)){ 
  ?>
    <!-- Modal  for login start-->
    <div class="modal fade login" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Log in</h4>
          </div>
          <div class="modal-body">
            <form method="post" id="login-form">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control email login-email" id="exampleInputEmail1" placeholder="Email Address">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control password login-password" id="exampleInputPassword1" placeholder="Password">
              </div>

              <div class="checkbox">
                <label>
                <input type="checkbox" checked value="1" id="remeber_me" name="remeber_me"> Remember me
              </label>
              </div>
                <span class="pull-left"><a href="javascript:void(0);" data-dismiss="modal" data-toggle="modal" data-target="#register" data-keyboard="false" data-backdrop="static">Register here</a></span>
                <span class="pull-right"><a href="javascript:void(0);" data-dismiss="modal" data-toggle="modal" data-target="#forgot_pswd" data-keyboard="false" data-backdrop="static">Forgot password</a></span>
              
              <div class="login_button">
                <button type="button" class="btn btn-default login-btn">Log in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal  for login end-->
    <!-- Modal  for forgot password start-->
    <div class="modal fade login" id="forgot_pswd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control email forgot-email" id="exampleInputEmail1" placeholder="Email Address">
              </div>
                <span class="pull-right"><a href="javascript:void(0);" data-dismiss="modal" data-toggle="modal" data-target="#login" data-keyboard="false" data-backdrop="static">Login here</a></span>
              <div class="login_button">
                <button type="button" class="btn btn-default forgot-btn">Submit</button>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal  for forgot password end-->
    <!-- Modal  for reset password start-->
    <div class="modal fade login" id="resetpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
          </div>
          <div class="modal-body">
            <form method="post" id="reset-form">
              <input type="hidden" name="reset_pswd_token" required value="<?php echo $this->session->flashdata('reset_pswd_token') ?>">
              <div class="form-group">
                <label for="exampleInputPassword1">New Password</label>
                <input type="password" name="new_password" class="form-control password reset-new-password" id="exampleInputPassword1" placeholder="New Password">
                <span class="error_form new_password"></span>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control password reset-confirm-password" id="exampleInputPassword1" placeholder="Confirm Password">
                <span class="error_form confirm_password"></span>
              </div>
                <span class="pull-right"><a href="javascript:void(0);" data-dismiss="modal" data-toggle="modal" data-target="#login" data-keyboard="false" data-backdrop="static">Login here</a></span>
              <div class="login_button">
                <button type="button" class="btn btn-default reset-pswd-btn">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal  for reset password end-->
    <!-- Modal  for register start-->
    <div class="modal fade login register_mod" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Register</h4>
          </div>
          <div class="modal-body">
            <form method="post" id="signup-form">
              <div class="row">
                <div class="col-md-6 cosl-sm-6">
                  <div class="form-group">
                    <label for="firstname">first name</label>
                    <input type="text" class="form-control" id="firstname" placeholder="First Name" name="first_name">
                    <span class="error_form first_name"></span>
                  </div>
                </div>
                <div class="col-md-6 cosl-sm-6">
                  <div class="form-group">
                    <label for="last name">last name</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="last_name">
                    <span class="error_form last_name"></span>
                  </div>
                </div>
                <div class="col-md-6 cosl-sm-6">
                  <div class="form-group">
                    <label for="last name">Register as</label>
                    <select class="form-control" name="user_type">
                      <option value="">Register as</option>
                      <option value="2">As Student</option>
                      <!-- <option value="3">As Agency</option> -->
                      <!-- <option value="4">As Trainer</option> -->
                      <option value="5">As University</option>
                      <!-- <option value="6">As Frainchsee</option> -->
                    </select>
                    <span class="error_form user_type"></span>
                  </div>
                </div>

                <div class="col-md-6 cosl-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email Address" name="email">
                    <span class="error_form email"></span>
                  </div>
                </div>
                <div class="col-md-6 cosl-sm-6">
                  <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <span class="error_form password"></span>
                  </div>
                </div>
                <div class="col-md-6 cosl-sm-6">
                  <div class="form-group">
                    <label for="Passwordconfirm">confirm Password</label>
                    <input type="password" class="form-control" id="Passwordconfirm" placeholder="Confirm Password" name="confm_pswd">
                    <span class="error_form confm_pswd"></span>
                  </div>
                  <span class="pull-right"><a href="javascript:void(0);" data-dismiss="modal" data-toggle="modal" data-target="#login" data-keyboard="false" data-backdrop="static">Login here</a></span>
                </div>
                <div class="col-md-12 cosl-sm-12">
                  <div class="login_button">
                    <button type="button" class="btn btn-default signup-btn">Register</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal  for register end-->
  <?php } ?>
    <!-- Modal  for change password start-->
    <div class="modal fade login" id="change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Change Password</h4>
          </div>
          <div class="modal-body">
            <form method="post" id="change-password-form">
              <div class="form-group">
                <label for="exampleInputPassword1">Current Password</label>
                <input type="password" name="current_password" class="form-control" id="exampleInputPassword1" placeholder="Current Password">
                <span class="error_form current_password"></span>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">New Password</label>
                <input type="password" name="new_password" class="form-control" id="exampleInputPassword2" placeholder="New Password">
                <span class="error_form new_password"></span>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword3" placeholder="Confirm Password">
                <span class="error_form confirm_password"></span>
              </div>
              <div class="login_button">
                <button type="button" class="btn btn-default password-btn">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal  for change password end-->
    <!--Footer sec start-->
    <footer id="footer" class="footer_sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
          <div class="footer_top">
              <div class="common_head footer_head">
                <h2>Accreditations and Memberships</h2>
                <div class="head_border">
                  <span><i class="fa fa-ioxhost" aria-hidden="true"></i></span>
                </div>
              </div>
              <ul class="brand_list">
                <li>
                  <a href="javascript:void(0);"><img class="accreditation-img" width="135" height="85" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/EAIE.png"></a>
                </li>
                <li>
                  <a href="javascript:void(0);"><img class="accreditation-img" width="135" height="85" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/ICEF.png"></a>
                </li>
                <li>
                  <a href="javascript:void(0);"><img class="accreditation-img" width="135" height="85" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/NAFSA.png"></a>
                </li>
                <li>
                  <a href="javascript:void(0);"><img class="accreditation-img" width="135" height="85" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/QISAN.jpeg"></a>
                </li>
                <li>
                  <a href="javascript:void(0);"><img class="accreditation-img" width="135" height="85" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/AIRC.png"></a>
                </li>
                <li>
                  <a href="javascript:void(0);"><img class="accreditation-img" width="135" height="85" src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/images/AIEA.png"></a>
                </li>
              </ul>
            </div> 
            <div class="footer_middle">
              <div class="common_head footer_head">
                <h2>Qualified Universities</h2>
                <div class="head_border">
                  <span><i class="flaticon-the-white-house-in-eeuu" aria-hidden="true"></i></span>
                </div>
              </div>
              <div class="footer_middle_content">
                <div class="row">
                <?php foreach(getQualifiedUniversity() as $qu){ ?>
                  <div class="col-md-3 col-sm-3">
                    <ul class="ftr_list">
                      <li><a href="<?php echo getUniversityUrl($qu['id'],$qu['name']); ?>"><?php echo $qu['name']; ?></a></li>
                    </ul>
                  </div>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer_bottom">
      <div class="container">
            <div class="row">
       <div class="col-md-10 col-sm-10">
         <div class="footer_navi">
         <div class="navbar-header">
                  <button type="button" class="toggle-ftr">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                 <div class=" navbar-ftr" id="navigation1">
                <ul class="ftr_menu_list">
                  <li><a href="<?php echo base_url(); ?>college-campus-office">College Campus Office</a></li>
                  <li><a href="http://page.studymetro.com/Study-Metro-Franchisee-Summit-2016">Summit </a></li>
                  <li><a href="http://page.studymetro.com/Franchise-Inquiry-Form ">Apply for Franchisee</a></li>
                  <li><a href="<?php echo base_url(); ?>work-as-agent">Work as Agent </a></li>
                  <li><a href="http://page.studymetro.com/Knowledge-Base">Knowledge Base </a></li>
                  <li><a href="<?php echo base_url(); ?>terms-conditions">Terms & Conditions </a></li>
                  <li><a href="<?php echo base_url(); ?>privacy-policy">Privacy Policy </a></li>
                  <li><a href="<?php echo base_url(); ?>city-events">City Events </a></li>
                  <!-- <li><a href="<?php echo base_url(); ?>indian-university">Indian University</a></li> -->
                </ul>
              </div>
               </div>
               </div>
               <div class="col-md-2 col-sm-2">
        <div class="social_media">
          <ul>
            <li><a href="https://www.facebook.com/studymetro.abroad"><i class="fa fa-facebook" aria-hidden="true"></i>
 </a></li>
            <li><a href="https://twitter.com/gujstudymetro"><i class="fa fa-twitter" aria-hidden="true"></i>
 </a></li>
            <li><a href="https://plus.google.com/+HTIRIndiaBangalore"><i class="fa fa-google-plus" aria-hidden="true"></i>
 </a></li>
          </ul>
        </div>
        </div>
         </div>
          </div>
              <!-- <div class="col-md-4 col-sm-4">
                <ul class="list_term">
                  <li><a href="javascript:void(0);">© <?php echo date('Y'); ?>&nbsp; studymetro.com </a></li>
                  <li><a href="#">Terms of Service </a></li>
                  <li><a href="#"> Privacy Policy </a></li>
                </ul>
              </div> -->
           
        </div>
      </div>
      <div class="footer_address">
      <div class="container">
       <div class="row">
              <div class="col-md-12 col-sm-12">
                <ul class="footer_adress_list">
                <?php 
                $offices = getAllOffices();
                if(!empty($offices)) { foreach($offices as $o) { ?>
                  <li class="address_box">
                    <h2><?php echo $o['title']; ?></h2>
                    <div class="address_box_describe">
                        <p><?php echo $o['address']; ?></p>
                        <span><a href="mailto:<?php echo $o['email']; ?>"><?php echo $o['email']; ?></a></span>
                        <p>Tel: <?php echo $o['telephone']; ?></p>
                        <p>Mob: <?php echo $o['mobile']; ?></p>
                    </div>
                  </li>
                <?php } } ?>
                </ul>
               </div>
         </div>
      </div>
    </footer>
    <!--Footer sec end-->


  </main>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  
  <!-- Include all compiled plugins (below), or include individual files as needed -->

  <script src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/js/app.js"></script>
  <script src="<?php echo SUB_DOMAIN_BASE_URL; ?>assets/js/custom.js"></script>
  

<script type="text/javascript">
function base_url()
{
   site_url = '<?php echo base_url(); ?>';
   return site_url;
}

user_id  = "<?php echo $this->session->userdata('user_id'); ?>";
$(document).ready(function(){

var check_login = "<?php echo $this->session->userdata('login_error'); ?>";
if(check_login == "you need to login"){
  jQuery('#register').modal('show');
  <?php echo $this->session->unset_userdata('login_error'); ?>
}

if(user_id == ""){

<?php if($this->session->flashdata('reset_pswd_token')){ ?>
    $('#resetpassword').modal({backdrop:'static',keyboard:false, show:true});
<?php } ?>

$("body").on('click','.signup-btn',function() {
  var form_data = new FormData($('#signup-form')[0]);
  $.ajax({
        url  : "<?php echo base_url(); ?>front/front/signup",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.signup-btn').attr('disabled',true).text('Loading....');
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
            $('#signup-form')[0].reset();
            $('#register').modal('hide');
            showToaster('success',resp.msg);
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.signup-btn').attr('disabled',false).text('Register');
        },
        error:function(error)
        {
            $('.signup-btn').attr('disabled',false).text('Register');
        }
    });
});

$('#login').on('show.bs.modal', function (e) {
    var e = localStorage.getItem('study_metro_e');
    var p = localStorage.getItem('study_metro_p');
    if(e != "" && e != null && e != undefined){
      $('.login-email').val(atob(e));
    }
    if(p != "" && p != null && p != undefined){
      $('.login-password').val(atob(p));
    }
})

$("body").on('click','.login-btn',function() {
  var form_data = new FormData($('#login-form')[0]);
  var email = $('form#login-form input.email').val();
  var password = $('form#login-form input.password').val();
  if(email == ""){
      showToaster('success','Please enter email address');
      return false;
  }
  if(password == ""){
      showToaster('success','Please enter password');
      return false;
  }
  var QueryString = getQueryStringValue('return_uri');
  form_data.append('query_string',QueryString);
  $.ajax({
        url  : "<?php echo base_url(); ?>front/front/login",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.login-btn').attr('disabled',true).text('Loading....');
        },       
        success: function(resp){
          if(resp.type == "success"){
            showToaster('success',resp.msg);
            if(document.getElementById('remeber_me').checked) {
              localStorage.setItem('study_metro_e', btoa(email));
              localStorage.setItem('study_metro_p', btoa(password));
            } else {
              localStorage.removeItem('study_metro_e');
              localStorage.removeItem('study_metro_p');
            }
            setTimeout(function(){
                window.location.href= resp.redirect_url;
            },1000);
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.login-btn').attr('disabled',false).text('Log in');
        },
        error:function(error)
        {
            $('.login-btn').attr('disabled',false).text('Log in');
        }
    });
}); 

$("body").on('click','.forgot-btn',function() {
  var email = $('.forgot-email').val();
  if(email == ""){
      showToaster('success','Please enter email address');
      return false;
  }
  $.ajax({
        url  : "<?php echo base_url(); ?>front/front/forgot_pswd",
        type : "POST",
        data : {email:email},   
        dataType : "JSON",   
        beforeSend:function(){
          $('.forgot-btn').attr('disabled',true).text('Loading....');
        },       
        success: function(resp){
          if(resp.type == "success"){
            $('.forgot-email').val("");
            $('#forgot_pswd').modal('hide');
            showToaster('success',resp.msg);
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.forgot-btn').attr('disabled',false).text('Submit');
        },
        error:function(error)
        {
            $('.forgot-btn').attr('disabled',false).text('Submit');
        }
    });
}); 

$("body").on('click','.reset-pswd-btn',function() {
  var form_data = new FormData($('#reset-form')[0]);
  $.ajax({
        url  : "<?php echo base_url(); ?>front/front/do_reset_pswd",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.reset-pswd-btn').attr('disabled',true).text('Loading....');
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
            $('#reset-form')[0].reset();
            $('#resetpassword').modal('hide');
            showToaster('success',resp.msg);
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.reset-pswd-btn').attr('disabled',false).text('Reset');
        },
        error:function(error)
        {
            $('.reset-pswd-btn').attr('disabled',false).text('Reset');
        }
    });
}); 

$(".email, .password").keyup(function(event){
    if(event.keyCode == 13){
        jQuery(".login-btn").trigger("click");
    }
});

}

$("body").on('click','.password-btn',function() {
  var form_data = new FormData($('#change-password-form')[0]);
  $.ajax({
        url  : "<?php echo base_url(); ?>front/user/doChangePassword",
        type : "POST",
        data : form_data,   
        dataType : "JSON",   
        cache: false,
        contentType: false,
        processData: false,   
        beforeSend:function(){
          $('.password-btn').attr('disabled',true).text('Loading....');
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
            $('#change-password-form')[0].reset();
            $('#change_password').modal('hide');
            showToaster('success',resp.msg);
           }
           else{
            showToaster('error',resp.msg);  
           }
           $('.password-btn').attr('disabled',false).text('Submit');
        },
        error:function(error)
        {
            $('.password-btn').attr('disabled',false).text('Submit');
        }
    });
});


});

</script>

<script type="text/javascript">
<?php if($this->session->flashdata('error')){ ?>
    showToaster('error',"<?php echo $this->session->flashdata('error') ?>");    
<?php } ?>
<?php if($this->session->flashdata('success')){ ?>
    showToaster('success',"<?php echo $this->session->flashdata('success') ?>");    
<?php } ?>
</script>
<?php
if(isset($slug) && !in_array($slug, array('city-events','indian-university'))){
  $olark_plugin = get_option('olark_plugin');
  $vcita_plugin = get_option('vcita_plugin');
  if(!empty($olark_plugin)){
      echo $olark_plugin;
  }
  if(!empty($vcita_plugin)){
      echo $vcita_plugin;
  }
}
?>

</body>
</html>