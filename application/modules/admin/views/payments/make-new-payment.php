<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'add_new_payment_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <!-- form start -->
	          <form role="form" method="GET" action="<?php echo base_url(); ?>admin/payments/add-new">

	          <!-- Validation error and flash data -->
	          	<?php if($this->session->flashdata('general_error')){ ?>
                <div class="alert alert-danger alert-dismissable errors-msgs">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <div class="errors"></div>
                  <?php echo $this->session->flashdata('general_error'); ?>
                </div>
                <?php } ?>

		        <div class="box-header with-border">
		            <h3 class="box-title">Make New Payment</h3>
	          	</div>

	          	<div class="box-body">

              <?php if(!empty($_GET['amount'])) { ?>
		            <div class="col-md-12">
		            	<div class="col-md-6">
			                <div class="form-group photo_1">
			                  <label for="photos">Payment Method</label>
			                  <select name="pay_type" required class="form-control" id="pay_type">
                          <option value="0">PayPal</option>
      						        <option value="1">Citrus</option>
      						      </select>
			                </div>
			            </div>
		            </div>
              <?php } ?>

                <div class="col-md-12 pre-req">
                  <div class="col-md-6">
                  <div class="form-group photo_1">
                      <label for="photos">Amount</label>
                      <input type="text" name="amount" onkeypress="return validateNumbers(event)" placeholder="Amount" required class="form-control margin_bottom10" value="<?php echo @$_GET['amount']; ?>" />
                    </div>
                  </div>
                </div>

                <div class="col-md-12 pre-req">
                  <div class="col-md-6">
                  <div class="form-group photo_1">
                      <label for="photos">Remark</label>
                      <textarea rows="6" name="remark" placeholder="Remark" class="form-control"><?php echo @$_GET['remark']; ?></textarea>
                    </div>
                  </div>
                </div>

		        </div>
	            <div class="box-footer">
	            <button type="submit" class="btn btn-primary pay-btn" title="Pay Now">Pay</button>
	            <button type="button" onclick="cancelAction()" class="btn btn-danger">Cancel</button>
	            </div>
	          </form>

            <?php if(!empty($_GET['amount'])) { 
              $merchantTxnId = uniqid(); 
              $currency = "USD";
              $orderAmount = $_GET['amount'];
              $data = CITRUS_VANITY_URL.$orderAmount.$merchantTxnId.$currency;
              $securitySignature = hash_hmac('sha1', $data, CITRUS_SECRET_KEY);
            ?>
              <form align="center" id="citrus-form" method="post" action="<?php echo CITRUS_FORM_URL; ?>">
                 <input type="hidden" id="merchantTxnId" name="merchantTxnId" value="<?php echo $merchantTxnId; ?>" />
                 <input type="hidden" id="orderAmount" name="orderAmount" value="<?php echo $orderAmount; ?>" />
                 <input type="hidden" id="currency" name="currency" value="<?php echo $currency; ?>" />
                 <input type="hidden" name="returnUrl" value="" class="citrus-return-url" value="<?php echo base_url(); ?>admin/payments/citrus_return?<?php echo http_build_query($_GET); ?>" />
                 <input type="hidden" id="secSignature" name="secSignature" value="<?php echo $securitySignature; ?>" />
              </form>
              <form action="<?php echo PAYPAL_FORM_URL; ?>" method="post" id="paypal-form">
                  <input type="hidden" name="cmd" value="_xclick" />
                  <input type="hidden" name="charset" value="utf-8" />
                  <input type="hidden" name="business" value="<?php echo PAYPAL_BUSINESS_ID; ?>" />
                  <input type="hidden" name="item_name" value="Payment" />
                  <input type="hidden" name="custom" value="<?php echo $_GET['remark']; ?>" class="custom-field pay-remark" /> 
                  <input type="hidden" name="amount" value="<?php echo $_GET['amount']; ?>" class="pay-amount" />
                  <input type="hidden" name="currency_code" value="USD" />
                  <input type="hidden" name="return" value="<?php echo base_url(); ?>admin/payments/paypal_success" />
                  <input type="hidden" name="cancel_return" value="<?php echo base_url(); ?>admin/payments/cancel_payment" />
                  <input type="hidden" name="bn" value="Business_BuyNow_WPS_SE" />
              </form>
            <?php } ?>
	        </div><!-- /.box -->
      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php if(!empty($_GET['amount'])){ ?>
  <script> 
    $('document').ready(function(){
      $('.pre-req').remove();
      $('.pay-btn').attr('type','button');

      $('body').on('click','.pay-btn',function(){
        var type = $('select[name="pay_type"]').val();
        if(type == 0){
          $('#paypal-form').submit();
        }else{
          $('#citrus-form').submit();
        }
      });

    });
  </script>
<?php } ?>

<script> 

</script>

