<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model 
{
	/**
	* Get all users order by first_name
	*/
	public function getAllUsersByNameASC($data) {
		$sql = 'SELECT m.*, m1.meta_value AS first_name, m2.meta_value AS last_name 
				FROM '.USER.' m
				INNER JOIN '.USER_META.' m1
				ON m.id = m1.user_id
				INNER JOIN '.USER_META.' m2
				ON m.id = m2.user_id
				WHERE m.is_blocked = '.$data['is_blocked'].'
				AND m.user_type = '.$data['user_type'].'
				AND (m1.meta_key = "first_name" AND m2.meta_key = "last_name")
				ORDER BY m1.meta_value ASC';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	* Get all users order by first_name excluding not in users id
	*/
	public function getAllExcludingUsersByNameASC($data) {
		$sql = 'SELECT m.*, m1.meta_value AS first_name, m2.meta_value AS last_name 
				FROM '.USER.' m
				INNER JOIN '.USER_META.' m1
				ON m.id = m1.user_id
				INNER JOIN '.USER_META.' m2
				ON m.id = m2.user_id
				WHERE m.is_blocked = '.$data['is_blocked'].'
				AND m.user_type = '.$data['user_type'].'
				AND (m1.meta_key = "first_name" AND m2.meta_key = "last_name")';

		if(!empty($data['not_in_users'])) {
			$sql .= ' AND m.id NOT IN ('.$data["not_in_users"].')';
		}
		
		$sql .= ' ORDER BY m1.meta_value ASC';
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	/**
	* Get group leaders
	*/
	public function getGroupLeaders($data) {
		$sql = 'SELECT m.*
				FROM '.USER.' m
				INNER JOIN '.GROUP_ASSIGNMENT.' m1
				ON m.id = m1.user_id
				INNER JOIN '.GROUP_ASSIGNMENT.' m2
				ON m.id = m2.user_id
				WHERE (m1.assignment_key = "is_group_admin" AND m1.assignment_value = 1)
				AND (m2.assignment_key = "security_role" AND m2.assignment_value = '.GROUP_LEADER_SECURITY_ROLE.')
				AND m1.group_id = '.$data['group_id'].'
				AND m2.group_id = '.$data['group_id'].'
				LIMIT '.$data['limit'].'
				OFFSET '.$data['offset'];
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	* Get group leaders count
	*/
	public function getGroupLeadersCount($data) {
		$sql = 'SELECT m.*
				FROM '.USER.' m
				INNER JOIN '.GROUP_ASSIGNMENT.' m1
				ON m.id = m1.user_id
				INNER JOIN '.GROUP_ASSIGNMENT.' m2
				ON m.id = m2.user_id
				WHERE (m1.assignment_key = "is_group_admin" AND m1.assignment_value = 1)
				AND (m2.assignment_key = "security_role" AND m2.assignment_value = '.GROUP_LEADER_SECURITY_ROLE.')
				AND m1.group_id = '.$data['group_id'].'
				AND m2.group_id = '.$data['group_id'];
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	/**
	* Get group members
	*/
	public function getGroupMembers($data) {
		$sql = 'SELECT m.*
				FROM '.USER.' m
				INNER JOIN '.GROUP_ASSIGNMENT.' m1
				ON m.id = m1.user_id
				INNER JOIN '.GROUP_ASSIGNMENT.' m2
				ON m.id = m2.user_id
				WHERE (m1.assignment_key = "is_group_admin" AND m1.assignment_value = 0)
				AND (m2.assignment_key = "security_role" AND m2.assignment_value = '.NORMAL_USER_SECURITY_ROLE.')
				AND m1.group_id = '.$data['group_id'].'
				AND m2.group_id = '.$data['group_id'].'
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
				INNER JOIN '.GROUP_ASSIGNMENT.' m2
				ON m.id = m2.user_id
				WHERE (m1.assignment_key = "is_group_admin" AND m1.assignment_value = 0)
				AND (m2.assignment_key = "security_role" AND m2.assignment_value = '.NORMAL_USER_SECURITY_ROLE.')
				AND m1.group_id = '.$data['group_id'].'
				AND m2.group_id = '.$data['group_id'];
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	/**
	* Get group member requests
	* @param $data
	*/
	public function getGroupMemberRequests($data) {
		$sql = 'SELECT m.*
				FROM '.USER.' m
				INNER JOIN '.GROUP_ASSIGNMENT.' m1
				ON m.id = m1.user_id
				INNER JOIN '.GROUP_ASSIGNMENT.' m2
				ON m.id = m2.user_id
				WHERE (m1.assignment_key = "security_role" AND m1.assignment_value = 2)
				AND (m2.assignment_key = "is_group_admin" AND m2.assignment_value = 0)
				AND m1.group_id = '.$data['group_id'].'
				AND m2.group_id = '.$data['group_id'].'
				LIMIT '.$data['limit'].'
				OFFSET '.$data['offset'];
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	* Get group member request count
	* @param $data
	*/
	public function getGroupMemberRequestsCount($data) {
		$sql = 'SELECT m.*
				FROM '.USER.' m
				INNER JOIN '.GROUP_ASSIGNMENT.' m1
				ON m.id = m1.user_id
				INNER JOIN '.GROUP_ASSIGNMENT.' m2
				ON m.id = m2.user_id
				WHERE (m1.assignment_key = "security_role" AND m1.assignment_value = 2)
				AND (m2.assignment_key = "is_group_admin" AND m2.assignment_value = 0)
				AND m1.group_id = '.$data['group_id'].'
				AND m2.group_id = '.$data['group_id'];
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	/**
	* Get group chat members
	* @param $data
	* @return $members
	*/
	public function getGroupChatmembers($data) {
		$sql = 'SELECT m.*, m1.group_id
				FROM '.USER.' m
				INNER JOIN '.GROUP_ASSIGNMENT.' m1
				ON m.id = m1.user_id
				WHERE m1.group_id = '.$data['id'].'
				AND m1.user_id != '.$data['user_id'].'
				GROUP BY m1.user_id';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	* Get all contact us request users
	* @return $userData
	*/
	public function getAllContactUsUsers() {
		$sql = 'SELECT m.id AS `user_id`, m2.meta_value AS `first_name`, m3.meta_value AS `last_name`
				FROM '.USER.' m
				INNER JOIN '.GROUP_CONTACT.' m1
				ON m.id = m1.user_id
				INNER JOIN '.USER_META.' m2
				ON m.id = m2.user_id
				INNER JOIN '.USER_META.' m3
				ON m.id = m3.user_id
				WHERE m2.meta_key = "first_name"
				AND m3.meta_key = "last_name"
				GROUP BY m1.user_id';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	* Get all contact us request groups
	* @return $groupData
	*/
	public function getAllContactUsGroups() {
		$sql = 'SELECT group_id, name 
				FROM '.GROUP_CONTACT.'
				LEFT JOIN '.GROUP.'
				ON '.GROUP_CONTACT.'.group_id = '.GROUP.'.id
				GROUP BY group_id';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	* Get all contact us request handled users
	* @return $userData
	*/
	public function getAllContactUsHandledUsers() {
		$sql = 'SELECT m.id AS `user_id`, m2.meta_value AS `first_name`, m3.meta_value AS `last_name`
				FROM '.USER.' m
				INNER JOIN '.GROUP_CONTACT_RESPONSE.' m1
				ON m.id = m1.handle_user_id
				INNER JOIN '.USER_META.' m2
				ON m.id = m2.user_id
				INNER JOIN '.USER_META.' m3
				ON m.id = m3.user_id
				WHERE m2.meta_key = "first_name"
				AND m3.meta_key = "last_name"
				GROUP BY m1.handle_user_id';
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}