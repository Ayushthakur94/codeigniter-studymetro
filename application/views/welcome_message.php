<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php admin_meta_title((!empty($meta_title)) ? $meta_title : ''); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php admin_favicon(); ?>
</head>
<body>
	<h1 align="center">Welcome to <?php echo get_option('site_name'); ?></h1>
</body>
</html>