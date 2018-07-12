<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

    /**
	* Index of users controller
    */
    public function index() {
    	is_logged_in($this->url.'/view-all');
    	redirect($this->url.'/view-all');
    	exit();
    }

    /**
    * Add new menu
    * @param $_POST
    */
    public function addNew() {
        is_logged_in($this->url.'/add-new');
        $data = array();
        $data['result_of'] = 'paginate';
        $data['meta_title'] = 'Add New';
        $data['small_text'] = 'Menu';
        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'add_new_menu');
        $data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);
        $data['base_url'] = get_cms_url('').$this->url.'/filtermenuitem';
        $data['paginate_url'] = get_cms_url('').$this->url.'/paginatemenuitem';

        $offset = 0;
        $url = get_cms_url('').$this->url.'/paginatemenuitem';
        
        /* Fetch pages for menu item */
        $data['pages'] = '';
        $data['pages_pagination'] = '';
        $data['pages'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(STATIC_PAGE, '', '', '', 'id', 'DESC', RESULT_PER_PAGE, $offset, array('status' => 1));
        if(count($data['pages']) > 0) {
            /* Pagination records */
            $total_records3 = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(STATIC_PAGE, '', '', '', array('status' => 1));
            $data['pages_pagination'] = custom_pagination($url, $total_records3, RESULT_PER_PAGE, 'right');
        }

        /* Load admin view */
        load_admin_view('menus/add-new-menu', $data);
    }

    /**
    * Add new menu data in database
    * @param $_POST
    */
    public function addmenu() {
        is_logged_in($this->url.'/view-all');
        if(isset($_POST['submit'])) {
            $attrArr = array();
            if(isset($_POST['extra_attributes'])) {
                foreach($_POST['extra_attributes'] as $key => $val) {
                    $menuAttr = explode('||', $val);
                    $target = $menuAttr[1];
                    $extraClass = (!empty($menuAttr[2])) ? str_replace(' ', '-', $menuAttr[2]) : '';
                    $favIcon = (!empty($menuAttr[3])) ? $menuAttr[3] : '';
                    
                    $attrArr[$key] = array(
                        'item_id' => $menuAttr[0],
                        'target' => $target,
                        'class' => $extraClass,
                        'icon' => $favIcon
                    );
                }
            }

            $postData = array(
                'menu_name' => $_POST['menu_name'],
                'menu_structure' => $_POST['menu_structure'],
                'menu_attributes' => json_encode($attrArr),
                'is_primary' => 0,
                'date_created' => date('Y-m-d H:i:s')
            );

            $menuId = $this->common_model->addRecords(MENU, $postData);
            if($menuId) {
                $this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Menu'));
                redirect($this->url.'/view-all');
            } else {
                $this->session->set_flashdata('general_error', GENERAL_ERROR);
                redirect($this->url.'/view-all');
            }
        }
    }

    /**
    * Filter Menu Items
    * @param $_POST['search_type'] = groups, group_types, pages
    */
    public function filtermenuitem() {
		$data = array();
        /* Search for pages */
        if($_POST['search_type'] == 'pages') {
            $data['pages'] = '';
            $data['pages'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(STATIC_PAGE, (!empty($_POST['keyword'])) ? array('title', 'slug','content') : '', (!empty($_POST['keyword'])) ? $_POST['keyword'] : '', 'OR', 'id', 'DESC', '', '', array('status' => 1));
            /* Load admin view */
            load_admin_view('menu-addons/menu-pages', $data, false, false, false);
        }
    }

    /**
    * paginate Menu Items
    */
    public function paginatemenuitem() {
        $data = array();
        $data['result_of'] = 'paginate';

        if(isset($_POST['offset'])) {
            $offset = $_POST['offset'];
        } else{
            $offset = 0;
        }

        $url = get_cms_url('').$this->url.'/paginatemenuitem';
        
        if($_POST['search_type'] == 'pages') {
            /* Fetch pages for menu item */
            $data['pages'] = '';
            $data['pages_pagination'] = '';
            $data['pages'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(STATIC_PAGE, '', '', '', 'id', 'DESC', RESULT_PER_PAGE, $offset, array('status' => 1));
            if(count($data['pages']) > 0) {
                /* Pagination records */
                $total_records3 = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(STATIC_PAGE, '', '', '', array('status' => 1));
                $data['pages_pagination'] = custom_pagination($url, $total_records3, RESULT_PER_PAGE, 'right');
            }
            load_admin_view('menu-addons/menu-pages', $data, false, false, false);
        }
    }

    /**
    * View all menus
    */
    public function viewAll() {
        is_logged_in($this->url.'/view-all');
        $data = array();
        $data['meta_title'] = 'View All';
        $data['small_text'] = 'Menus';
        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'view_all_menus');
        $data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);

        /* Fetch Data */
        $offset = $this->uri->segment(4);
        if(!$offset) {
            $offset = 0;
        }
        $data['offset'] = $offset;
        $data['menus'] = array();
        $data['pagination'] = array();
        $data['menus'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(MENU, (isset($_GET['s'])) ? array('menu_name') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', 'menu_id', 'DESC', RESULT_PER_PAGE, $offset, '');
        if(count($data['menus']) > 0) {
            /* Pagination records */
            $url = get_cms_url().$this->url.'/view-all';
            $total_records = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(MENU, (isset($_GET['s'])) ? array('menu_name') : '', (isset($_GET['s'])) ? $_GET['s'] : '', 'OR', '');
            $data['pagination'] = custom_pagination($url, $total_records, RESULT_PER_PAGE, 'right');
        }

        /* Load admin view */
        load_admin_view('menus/view-all-menus', $data);
    }

    /**
    * Manage Menu Location
    */
    public function manageLocation() {
        is_logged_in($this->url.'/manage-location');
        $data = array();
        $data['meta_title'] = 'Manage Location';
        $data['small_text'] = 'Menu';
        $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'manage_menu_location');
        $data['session_data'] = admin_session_data();
        $data['user_info'] = get_user($data['session_data']['user_id']);

        $data['menus'] = $this->common_model->getAllRecords(MENU);

        if($this->input->post('submit')) {
            $this->form_validation->set_rules('is_primary', 'Select Primary Menu', 'trim|required');

            if($this->form_validation->run() == true){
                $this->common_model->updateRecords(MENU, array('is_primary' => 1), array('menu_id' => $_POST['is_primary']));
                $this->common_model->updateCustomSql('UPDATE '.MENU.' SET is_primary = 0 WHERE menu_id != '.$_POST['is_primary']);
                
                $this->session->set_flashdata('item_success', sprintf(ITEM_UPDATE_SUCCESS, 'Menu'));
                redirect($this->url.'/view-all');
            }
        }
        /* Load admin view */
        load_admin_view('menus/manage-menu-location', $data);
    }

    /**
    * Delete Menu
    * @param $_POST
    */
    public function delete() {
        is_logged_in($this->url.'/view-all');
        $menuId = $this->uri->segment(4);
        if($menuId) {
            /* Delete Records */
            $this->common_model->deleteRecords(MENU, 'menu_id', $menuId);
            $this->session->set_flashdata('item_success', sprintf(ITEM_DELETE_SUCCESS, 'Menu'));
            redirect($this->url.'/view-all');
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }

    /**
    * Edit Menu
    * @param $_POST
    */
    public function edit() {
        is_logged_in($this->url.'/view-all');
        $menuId = $this->uri->segment(4);
        if($menuId) {
            $data = array();
            $data['result_of'] = 'paginate';
            $data['meta_title'] = 'Edit';
            $data['small_text'] = 'Menu';
            $data['body_class'] = array('admin_dashboard', 'is_logged_in', 'edit_menu');
            $data['session_data'] = admin_session_data();
            $data['user_info'] = get_user($data['session_data']['user_id']);
            $data['base_url'] = get_cms_url('').$this->url.'/filtermenuitem';
            $data['paginate_url'] = get_cms_url('').$this->url.'/paginatemenuitem';
            $data['menu'] = $this->common_model->getSingleRecordById(MENU, array('menu_id' =>$menuId));

            $offset = 0;
            $url = get_cms_url('').$this->url.'/paginatemenuitem';
            
            /* Fetch pages for menu item */
            $data['pages'] = '';
            $data['pages_pagination'] = '';
            $data['pages'] = $this->common_model->getPaginateRecordsByOrderByLikeCondition(STATIC_PAGE, '', '', '', 'id', 'DESC', RESULT_PER_PAGE, $offset, array('status' => 1));
            if(count($data['pages']) > 0) {
                /* Pagination records */
                $total_records3 = $this->common_model->getTotalPaginateRecordsByOrderByLikeCondition(STATIC_PAGE, '', '', '', array('status' => 1));
                $data['pages_pagination'] = custom_pagination($url, $total_records3, RESULT_PER_PAGE, 'right');
            }

            /* Load admin view */
            load_admin_view('menus/edit-menu', $data);
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }

    /**
    * Update Menu in database
    * @param $_POST
    */
    public function updateMenu() {
        is_logged_in($this->url.'/view-all');
        $menuId = $this->uri->segment(4);
        if($menuId) {
            if(isset($_POST['submit'])) {
                $attrArr = array();
                if(isset($_POST['extra_attributes'])) {
                    foreach($_POST['extra_attributes'] as $key => $val) {
                        $menuAttr = explode('||', $val);
                        $target = $menuAttr[1];
                        $extraClass = (!empty($menuAttr[2])) ? str_replace(' ', '-', $menuAttr[2]) : '';
                        $favIcon = (!empty($menuAttr[3])) ? $menuAttr[3] : '';
                        
                        $attrArr[$key] = array(
                            'item_id' => $menuAttr[0],
                            'target' => $target,
                            'class' => $extraClass,
                            'icon' => $favIcon
                        );
                    }
                }

                $postData = array(
                    'menu_name' => $_POST['menu_name'],
                    'menu_structure' => $_POST['menu_structure'],
                    'menu_attributes' => json_encode($attrArr),
                    'date_created' => date('Y-m-d H:i:s')
                );

                $this->common_model->updateRecords(MENU, $postData, array('menu_id' => $menuId));
                $this->session->set_flashdata('item_success', sprintf(ITEM_ADD_SUCCESS, 'Menu'));
                redirect($this->url.'/view-all');
            }
        } else {
            $this->session->set_flashdata('invalid_item', INVALID_ITEM);
            redirect($this->url.'/view-all');
        }
    }
}