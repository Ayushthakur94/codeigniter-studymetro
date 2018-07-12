<div id="customLinkAppend">
  <div class="box box-primary collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Custom Link</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        	<div class="form-group">
            <label for="link_text">Link Text</label>
            <input type="text" name="link_text" class="form-control" id="link_text" placeholder="Enter link text"/>
          </div>
          <div class="form-group">
            <label for="link_url">Link Url</label>
            <input type="text" name="link_url" class="form-control" id="link_url" placeholder="Enter link url"/>
          </div>
          <div class="form-group menuAddLink" style="margin-top: 0px;">
            <input type="button" name="submit" value="Add Item" class="btn btn-primary" onclick="addCustomLinkInStructure('customLinkAppend', 'custom_link');"/>
          </div>
      </div><!-- /.box-body -->
  </div><!-- .box -->
</div><!-- #customLinkAppend -->