<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php admin_content_header($meta_title, $small_text, 'add_new_menu_header'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
        	<div class="col-md-4">
        		<h4>Select Menu Items</h4>
        		<?php include 'menu-addons/menu-pages-wrapper.php'; ?>
        		<?php include 'menu-addons/menu-custom-link.php'; ?>
            <input type="hidden" name="base_url" value="<?php echo $base_url; ?>">
            <input type="hidden" name="paginate_url" value="<?php echo $base_url; ?>">
          </div><!-- .col-md-4 -->

          <div class="col-md-8">
            <h4>Menu Structure</h4>
            <!-- form start -->
      			<form role="form" action="<?php cms_url('admin/menu/addmenu'); ?>" method="post" onsubmit="return checkMenuform();">
        			<div class="box box-primary">
	        			<div class="box-body">
			            	<!-- Validation error and flash data -->
				            <?php if(validation_errors() || $this->session->flashdata('general_error')) { ?>
				                <div class="alert alert-danger alert-dismissable">
				                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				                  <?php echo validation_errors(); ?>
				                  <?php echo $this->session->flashdata('general_error'); ?>
				                </div>
				            <?php } ?>
				            <div class="form-group">
		                  <label for="menu_name">Menu Name</label>
		                  <input type="text" name="menu_name" class="form-control" id="menu_name" placeholder="Enter menu name" value="<?php echo set_value('menu_name'); ?>" />
		                </div>
                    <div class="form-group">
                      <label for="menu_name">Menu Elements</label>
                      <div class="nestableMenu">
                        <div class="cf nestable-lists">
                          <div class="dd" id="nestable">
                            <ol class="dd-list">
                            </ol>
                          </div><!-- #nestable -->
                        </div>
                        <textarea id="nestable-output" name="menu_structure" style="display:none;"></textarea>
                      </div><!-- .nestableMenu -->
                    </div>
	           			</div><!-- box-body -->

			            <div class="box-footer">
			              <input type="submit" name="submit" value="Add" class="btn btn-primary"/>
			            </div><!-- .box-footer -->
		            </div><!-- .box box-primary -->
      			</form>
      		</div><!-- .col-md-8 -->

          <!-- Modal -->
          <div class="modal fade" id="menuAttrModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="extra_class">Extra Class</label>
                    <input type="text" name="extra_class" class="form-control" id="extra_class" placeholder="Enter extra class"/>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="in_new_tab" value="1" /> Open in new tab
                    </label>
                  </div>
                  <div class="form-group">
                    <label for="icon">Select Icon</label>
                    <div class="liatAllFavIcons">
                      <?php include 'menu-addons/fav-icons.php'; ?>
                    </div>
                    <input type="hidden" name="item_id" value=""/>
                    <input type="hidden" name="item_name" value=""/>
                    <input type="hidden" name="item_type" value=""/>
                    <input type="hidden" name="selected_fav_icon" value=""/>
                  </div>
                  <div class="form-group">
                    <input type="button" name="add_attributes" value="Save" class="btn btn-primary" onclick="appendMenuAttributes();" />
                  </div>
                </div>
                <div class="modal-footer"></div>
              </div>
              
            </div>
          </div><!-- .modal -->

      	</div><!--/.col (left) -->
    </div><!-- .row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->