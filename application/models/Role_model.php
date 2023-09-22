<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Role_model (Role Model)
 * User model class to get to handle role related data 
 * @author : Kishor Mali
 * @version : 1.2
 * @since : 22 Jan 2021
 */
class Role_model extends CI_Model
{
    /**
     * This function is used to get the role listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function roleListingCount($searchText)
    {
        $this->db->select('BaseTbl.roleId, BaseTbl.role, BaseTbl.status, BaseTbl.createdDtm');
        $this->db->from('tbl_roles as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.role  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    /**
     * This function is used to get the role listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function roleListing($searchText, $page, $segment)
    {
        $this->db->select('BaseTbl.roleId, BaseTbl.role, BaseTbl.status, BaseTbl.createdDtm');
        $this->db->from('tbl_roles as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.role  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->order_by('BaseTbl.roleId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);   
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }
    
    
    /**
     * This function is used to add new role to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewRole($roleInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_roles', $roleInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get role information by id
     * @param number $roleId : This is role id
     * @return array $result : This is role information
     */
    function getRoleInfo($roleId)
    {
        $this->db->select('roleId, role, status');
        $this->db->from('tbl_roles');
        $this->db->where('roleId', $roleId);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    
    /**
     * This function is used to update the role information
     * @param array $roleInfo : This is role updated information
     * @param number $roleId : This is role id
     */
    function editRole($roleInfo, $roleId)
    {
        $this->db->where('roleId', $roleId);
        $this->db->update('tbl_roles', $roleInfo);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }


    /**
     * This function used to get access matrix of a role by roleId.
     * If the access matrix entry doesn't exists then it creates the matrix.
     * @param number $roleId : This is roleId of user
     */
    function getRoleAccessMatrix($roleId)
    {
        $result = $this->getRoleAccessMatrixQuery($roleId);
        
        if(is_null($result)) {

            $CI = &get_instance();
            $modules = $CI->config->item('moduleList');

            $accessMatrix = array('roleId'=> $roleId, 'access'=>json_encode($modules), 'createdBy'=> 1, 'createdDtm'=>date('Y-m-d H:i:s'));

            $this->insertAccessMatrix($accessMatrix);

            $result = $this->getRoleAccessMatrixQuery($roleId);
        }

        return $result;
    }

    /**
     * This function used to get role access matrix by role id
     * @param number $roleId : This is roleId of user
     */
    private function getRoleAccessMatrixQuery($roleId)
    {
        $this->db->select('roleId, access');
        $this->db->from('tbl_access_matrix');
        $this->db->where('roleId', $roleId);
        $query = $this->db->get();
        
        $result = $query->row();
        return $result;
    }

    /**
     * This method is used to insert default access rights when a role gets created
     */
    function insertAccessMatrix($accessMatrix)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_access_matrix', $accessMatrix);
        $this->db->trans_complete();
    }

    /**
     * This method is used to get access rights information for super admin
     */
    function getFromAccessMatrix2()
    {
        $this->db->select('*');
        $this->db->from('tbl_access_matrix');
        $this->db->where('roleId', 1);
        $query = $this->db->get();
        
        $result = $query->row();
        return $result;
    }

    /**
     * This method is used to generate access matrix from configuration
     * and insert into database
     */
    function generateMatrix()
    {
        $this->db->select('*');
        $this->db->from('tbl_roles');
        $query = $this->db->get();
        
        $roles = $query->result();

        if(empty($result))
        {
            $CI = &get_instance();
            $modules = $CI->config->item('moduleList');

            foreach($roles as $role)
            {
                $this->db->select('*');
                $this->db->from('tbl_access_matrix');
                $this->db->where('roleId', $role->roleId);
                $query2 = $this->db->get();

                $accessMatrices = $query2->result();

                if(empty($accessMatrices))
                {
                    $accessMatrix = array('roleId'=> $role->roleId, 'access'=>json_encode($modules), 'createdBy'=> 1, 'createdDtm'=>date('Y-m-d H:i:s'));

                    $this->insertAccessMatrix($accessMatrix);
                }
            }
        }
    }

    /**
     * This method used to update the access rights for role
     * @param number $roleId : This is role id
     * @param string $accessMatrix : This is JSON string access matrix
     */
    function updateAccessMatrix($roleId, $accessMatrix)
    {
        $this->db->where('roleId', $roleId);
        $this->db->update('tbl_access_matrix', $accessMatrix);

        return $this->db->affected_rows();
    }
}

  