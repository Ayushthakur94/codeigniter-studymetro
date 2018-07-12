<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summer_programs extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

	/**
	* programs index method
	*/
	public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
	* Import programs
	* @param $_POST
    */
    public function import() {
    	is_logged_in($this->url.'/import');
		$data = array();
		$data['meta_title'] = 'Import';
		$data['small_text'] = 'Import';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'import_programs');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);
		load_admin_view('summer_programs/import-summer-programs', $data);
    }

    public function importData(){
    	$data = $this->input->post();
    	ini_set('memory_limit', '-1'); 
    	set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
    	require_once APPPATH.'third_party/PHPExcel/IOFactory.php';
    	$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
	    $cacheSettings = array('memoryCacheSize' => '5000MB', 'cacheTime' => '1000'); 
	    PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
		$file_tmp_name = $_FILES["file"]["tmp_name"];
		try {
		    $objPHPExcel = PHPExcel_IOFactory::load($file_tmp_name);
		} catch(Exception $e) {
		    die('Error loading file :' . $e->getMessage());
		}
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		unset($sheetData[1]);
		foreach(array_values($sheetData) as $s)
		{
			if(!empty($s['A'])){
			$dataArr = array(
					'university_id' => $data['university_id'],
					'program_name'  => $s['A'],
					'location'      => $s['B'],
					'country'   => $s['C'],
					'period ' => $s['D'],
					'dollar_fee' => $s['E'],
					'inr_fee '    => $s['F'],
					'courses'    => $s['G'],
					'eligibility' => $s['H'],
					'info '  => $s['I'],
					'visa_info ' => $s['J'],
					'status'	=>1,
					'added_date'    => datetime()
				);
			$this->common_model->addRecords(SUMMER_PROGRAMS, $dataArr);
		   }
		}
		$this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'SummerPrograms'));
        redirect($this->url.'/view-all');
    }

    /**
	* View all programs
	* @return Array of all programs
    */
    public function viewAll() {  
    	
    	is_logged_in($this->url.'/view-all');
		$data = array();
		$data['meta_title'] = 'View All';
		$data['small_text'] = 'Summer Programs';
		$data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_summer_programs');
		$data['session_data'] = admin_session_data();
		$data['user_info'] = get_user($data['session_data']['user_id']);

		/* Fetch Data */
        $offset = $this->uri->segment(4);
	    if(!$offset) {
		 	$offset = 0;
	    }

	    $data['offset'] = $offset;
	    $data['programs'] = '';
	    $data['pagination'] = '';
	    $data['programs'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(SUMMER_PROGRAMS, (isset($_GET['s'])) ? array('location','country') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'id', 'ASC', RESULT_PER_PAGE, $offset, '');
	    if(count($data['programs']) > 0) {
	    	/* Pagination records */
	        $url = get_cms_url().$this->url.'/view-all';
	        $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(SUMMER_PROGRAMS, (isset($_GET['s'])) ? array('location','country') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
	        $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right');
	    }
		/* Load admin view */
		load_admin_view('summer_programs/view-all-summer-programs', $data);
    }

    /**
    * Delete program
    * @param $uId
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $uId = $this->uri->segment(4);
        if($uId) {
            /* Delete Records */
            $this->common_model->deleteRecords(PROGRAMS, 'id', $uId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Program'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }

    public function getUniversities()
    {
    	$country = $this->input->post('country');
    	$result  = $this->common_model->getAllRecordsOrderById(UNIVERSITIES,'name','ASC',array('country' => $country));
    	echo json_encode($result);
    }

	
}