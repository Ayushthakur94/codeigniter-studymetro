<div class="form-group showMenuIems">
    <?php if(!empty($pages)) { ?>
    	<?php foreach($pages as $pval) { ?>
    		<div class="checkbox">
          <label>
            <input type="checkbox" onclick="addMenuitems('pagesAppend');" data-name="<?php echo ucfirst($pval['title']); ?>" name="static_pages" value="<?php echo $pval['id']; ?>"/> <?php echo ucfirst($pval['title']); ?>
          </label>
        </div>
    	<?php } ?>
    <?php } else { echo sprintf(NO_RECORDS_FOUND, 'pages'); } ?>
</div><!-- .showMenuIems -->
<?php if(!empty($result_of) && $result_of == 'paginate') { ?>
    <?php if(!empty($pages_pagination)) { ?>
      <div class="menupaginationSearch"><?php echo $pages_pagination;?></div>
    <?php } ?>
<?php } ?>