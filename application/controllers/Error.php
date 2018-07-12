<?php
class Error extends CI_Controller {

	function error_404()
	{
		$data = array();
		$data['meta_title'] = '404 Page Not found';
		$data['body_class'] = '404_page_not_found';
		load_admin_view('custom_errors/error_404', $data, false, false, false);
	}
}