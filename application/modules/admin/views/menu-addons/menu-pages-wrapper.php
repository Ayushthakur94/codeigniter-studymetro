<div id="pagesAppend">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Pages</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a href="#tab_5" data-toggle="tab" aria-expanded="true">View All</a>
                  </li>
                  <li class="">
                    <a href="#tab_6" data-toggle="tab" aria-expanded="false">Search</a>
                  </li>
                </ul>
                <div class="tab-content">
                    <i class="fa fa-refresh fa-spin menuRefreshSpin" style="display: none;"></i>
                    <div class="tab-pane active" id="tab_5">
                        <?php include 'menu-pages.php'; ?>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_6">
                        <div class="searchmenuItem">
                            <input type="text" name="keyword" autocomplete="off" class="form-control" placeholder="Search Group" onclick="displayattr('pagesAppend');" onkeyup="searchData('pagesAppend', 'searchPages');"/>
                            <input type="hidden" name="search_type" value="pages"/>
                            <a href="javascript:void(0);" onclick="removeItem('pagesAppend');">
                                <i class="fa fa-times closeValue" style="display: none;"></i>
                            </a>
                            <i class="fa fa-refresh fa-spin refreshSpin" style="display: none;"></i>
                        </div><!-- .searchmenuItem -->
                        <div id="searchPages"></div>
                    </div><!-- /.tab-content -->
                </div><!-- .tab-content -->
            </div><!-- .nav-tabs-custom -->

            <div class="form-group menuAddLink">
              <input disabled="disabled" type="button" name="submit" value="Add Item" class="btn btn-primary" onclick="addMenuItemInStructure('pagesAppend', 'static_pages');"/>
            </div>
        </div><!-- /.box-body -->
    </div><!-- .box -->
</div><!-- #pagesAppend -->