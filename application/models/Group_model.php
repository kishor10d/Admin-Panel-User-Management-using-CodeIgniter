<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Group_model extends CI_Model
{

	var $table = "tbl_groups as BaseTbl";  
	// var $select_column = array("BaseTbl.group_id, BaseTbl.group_name, BaseTbl.permission, BaseTbl.status");  
	var $select_column = array("*");  
	// var $order_column = array("BaseTbl.group_id, BaseTbl.group_name, BaseTbl.permission, BaseTbl.status");  
	var $order_column = array("*");  
	function make_query()  
	{  
	     $this->db->select($this->select_column);  
	     $this->db->from($this->table);  
	        // $this->db->group_start();  //group start

	     $this->db->where('BaseTbl.status', 0);
	        // $this->db->group_end();  //group ed  
// 


	     if(isset($_POST["search"]["value"]))  
	     {  
	        // $this->db->group_start();  //group start
	          $this->db->like("BaseTbl.group_name", $_POST["search"]["value"]);  
	          // $this->db->or_like("BaseTbl.permission", $_POST["search"]["value"]);  
	        // $this->db->group_end();  //group ed  
	     }  
	     if(isset($_POST["order"]))  
	     {  
	          $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
	     }  
	     else  
	     {  
	          $this->db->order_by('BaseTbl.group_id', 'AESC');  
	     }  
	}  
	function make_group_datatables(){  
	     $this->make_query();  
	     // $this->db->where('BaseTbl.status', 0);
	     if($_POST["length"] != -1)  
	     {  
	          $this->db->limit($_POST['length'], $_POST['start']);  
	     }  
	     $query = $this->db->get();  
	     return $query->result();  
	}  
	function get_filtered_data(){  
	     $this->make_query();  
	     $this->db->where('BaseTbl.status', 0);
	     $query = $this->db->get();  
	     return $query->num_rows();  
	}       
	function get_all_data()  
	{  
	     $this->db->select("*");  
	     $this->db->from($this->table);  
	     $this->db->where('BaseTbl.status', 0);
	     return $this->db->count_all_results();  
	}  




	// function groupListing()
	// {
	//     $this->db->select('BaseTbl.group_id, BaseTbl.group_name, BaseTbl.permission, BaseTbl.status');
	//     $this->db->from('tbl_groups as BaseTbl');
	//     $this->db->where('BaseTbl.status', 0);
	//     $this->db->order_by('BaseTbl.group_id', 'AESC');

	//     $query = $this->db->get();
	//     $result = $query->result();        
	//     return $result;
	// }
	

	function addNewGroup($groupInfo)
	{
	    $this->db->trans_start();
	    $this->db->insert('tbl_groups', $groupInfo);
	    
	    $insert_id = $this->db->insert_id();
	    
	    $this->db->trans_complete();
	    
	    return $insert_id;
	}


	public function getUserGroupByUserId($user_id)
	{
		$this->db->select('BaseTbl.permission');
		$this->db->from($this->table);
		$this->db->join('tbl_users as user', 'user.roleId = BaseTbl.group_id', 'left');  
		$this->db->where('user.userId', $user_id);
		$this->db->where('BaseTbl.status', 0);
		$query = $this->db->get();  
		return $query->row_array();  

	}

	    function getGroupInfo($groupId)
	    {
	        $this->db->select('group_id, group_name, permission');
	        $this->db->from('tbl_groups');
	        $this->db->where('status', 0);
			// $this->db->where('roleId !=', 1);
	        $this->db->where('group_id', $groupId);
	        $query = $this->db->get();
	        
	        return $query->row_array();
	    }


	    function editOldGroup($groupInfo, $groupId)
	    {
	     
	        $this->db->where('group_id', $groupId);
	        $this->db->update('tbl_groups', $groupInfo);
	        
	        if ($this->db->affected_rows() > 0) {
	      	  	return TRUE;
	        } else {
	        	return FALSE;
	        }
	        
	    }

	    function deleteGrpInfo($grp_id, $groupInfo)
	    {
	      $this->db->where('group_id', $grp_id);
	      $this->db->update('tbl_groups',$groupInfo);
	      return $this->db->affected_rows();
	    }

	    
	    function deleteBulkGrpInfo($groupInfo= array())
	    {

	      $this->db->update_batch('tbl_groups',$groupInfo, 'group_id');
	     

	      return $this->db->affected_rows();
	    }
	    


	// public function getAllGroup($user_id)
	// {
	// 	$this->db->select('BaseTbl.permission');
	// 	$this->db->from($this->table);
	// 	$this->db->where('BaseTbl.group_id', 1);
	// 	$this->db->where('BaseTbl.status', 0);
	// 	$query = $this->db->get();  
	// 	return $query->row_array();  

	// }

}
?>