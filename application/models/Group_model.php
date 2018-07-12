<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends CI_Model 
{	
	/**
	* Get group menu items
	* @param $data
	* $data['login_state'] == 1, It fetch public and private both groups
	* $data['login_state'] == 0, It fetch only public groups
	*/
	function getMenuGroups($data) {
		$sql = 'SELECT t.*, t1.attribute_key AS include_in_public_menu, t1.attribute_value AS include_in_public_menu_val, t2.attribute_key AS hide_from_group_list, t2.attribute_value AS hide_from_group_list_val, t3.attribute_key AS include_in_private_menu, t3.attribute_value AS include_in_private_menu_val 
				FROM '.GROUP.' t 
				INNER JOIN '.GROUP_ATTRIBUTE.' t1
				ON t.id = t1.group_id
				INNER JOIN '.GROUP_ATTRIBUTE.' t2
				ON t.id = t2.group_id
				INNER JOIN '.GROUP_ATTRIBUTE.' t3
				ON t.id = t3.group_id
				WHERE t.type_id = '.$data['type_id'].'
				AND t.status = '.$data['status'];

		if($data['login_state'] == 1) {
			$sql .= ' AND (t1.attribute_key = "include_in_public_menu" AND t1.attribute_value IN (0,1))
			AND (t2.attribute_key = "hide_from_group_list" AND t2.attribute_value = 0)
			AND (t3.attribute_key = "include_in_private_menu" AND t3.attribute_value IN (0,1))
			AND t.visibility IN (1,2)';
		} else {
			$sql .= ' AND (t1.attribute_key = "include_in_public_menu" AND t1.attribute_value = 1)
			AND (t2.attribute_key = "hide_from_group_list" AND t2.attribute_value = 0)
			AND (t3.attribute_key = "include_in_private_menu" AND t3.attribute_value = 0)
			AND t.visibility = 1';
		}

		$sql .= ' ORDER BY t.id DESC';

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	* Get Group Leaders
	* @param $data
	*/
	public function getAllGroupLeaders($data) {
		$this->db->join(GROUP_ASSIGNMENT, GROUP_ASSIGNMENT.'.user_id = '.USER.'.id', 'left');
		$this->db->where(array('group_id' => $data['group_id'], 'assignment_key' => 'is_group_admin', 'assignment_value' => '1'));
		$this->db->limit($data['limit']);
		$this->db->offset($data['offset']);
		$query = $this->db->get(USER);
		return $query->result_array();
	}

	/**
	* Get Group Leaders Count
	* @param $data
	*/
	public function getAllGroupLeadersCount($data) {
		$this->db->join(GROUP_ASSIGNMENT, GROUP_ASSIGNMENT.'.user_id = '.USER.'.id', 'left');
		$this->db->where(array('group_id' => $data['group_id'], 'assignment_key' => 'is_group_admin', 'assignment_value' => '1'));
		$query = $this->db->get(USER);
		return $query->num_rows();
	}

	/**
	* Get group leaders
	*/
	public function getGroupLeaders($data) {
		$result = $users = array();
		$this->db->select('user_id');
		$this->db->where($data);
		$query = $this->db->get(GROUP_ASSIGNMENT);
		$result = $query->result_array();
		if(!empty($result)) {
			foreach($result as $val) {
				$users[] = $val['user_id'];
			}
		}
		return $users;
	}

	/**
	* Get group members and leaders
	* @param $data
	*/
	public function getGroupMembersAndLeaders($data) {
		$result = $returnArr = array();
		$sql = 'SELECT `user_id` FROM '.GROUP_ASSIGNMENT.'
				WHERE (`assignment_key` = "is_group_admin" AND `assignment_value` IN(0,1))
				AND group_id = '.$data['group_id'];

		$query = $this->db->query($sql);
		$result = $query->result_array();

		if(!empty($result)) {
			foreach($result as $val) {
				$returnArr[] = $val['user_id'];
			}
		}

		return $returnArr;
	}

	/**
	* Get group members
	*/
	public function getGroupMembers($data) {
		$sql = 'SELECT m.*
				FROM '.USER.' m
				INNER JOIN '.GROUP_ASSIGNMENT.' m1
				ON m.id = m1.user_id
				WHERE (m1.assignment_key = "is_group_admin" AND m1.assignment_value = 0)
				AND m1.group_id = '.$data['group_id'].'
				LIMIT '.$data['limit'].'
				OFFSET '.$data['offset'];
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	* Get group members count
	*/
	public function getGroupMembersCount($data) {
		$sql = 'SELECT m.*
				FROM '.USER.' m
				INNER JOIN '.GROUP_ASSIGNMENT.' m1
				ON m.id = m1.user_id
				WHERE (m1.assignment_key = "is_group_admin" AND m1.assignment_value = 0)
				AND m1.group_id = '.$data['group_id'];
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}