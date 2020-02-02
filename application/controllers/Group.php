<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Group extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('group_model');
        $this->isLoggedIn();   
    }



    function groupListing()
    {
       if(!in_array('viewGroup', $this->permission)) {
           $this->loadThis();
       }
        else
        {        

            $this->global['pageTitle'] = 'CodeInsect : Group Listing';
            
            $this->loadViews("groups/groups", $this->global, NULL);

        }
    }
 
    public function fetch_group(){   

      if(!in_array('viewGroup', $this->permission)) {
          $this->loadThis();
      }

         $fetch_data = $this->group_model->make_group_datatables();  
         $data = array();  
         foreach($fetch_data as $row)  
         {  
              $sub_array = array();  

              $perms = [];
              foreach (unserialize($row->permission) as $pr) {
                $perms[] = '<span class="badge badge-primary">' . $pr . '</span>';
              }
                $perm = implode(" | ", $perms);
              

              // echo '<pre>';print_r($perm);
              // exit();


              $sub_array[] = '   <div class="icheck-primary d-inline">
              <input type="checkbox" class="checkbox" name="delete[]" value="'.$row->group_id.'" id="'.$row->group_id.'">
             <label for="'.$row->group_id.'">
             </label>
              </div>
              '; 
              // $sub_array[] = $row->stu_id;  
              $sub_array[] = $row->group_name;  
              $sub_array[] = $perm;  
              // $sub_array[] = unserialize($row->permission);  
 
              $sub_array[] = '<a class="btn btn-sm btn-success" href="#" title="View"><i class="fas fa-eye"></i></a>
               <a class="btn btn-sm btn-info" href="'. base_url().'editGroup/'.$row->group_id .'" title="Edit"><i class="fas fa-edit"></i></a>
              <a class="btn btn-sm btn-danger deleteGroup" href="#" data-grp-id="'.$row->group_id.'" title="Delete"><i class="fa fa-trash"></i></a>';  
              $data[] = $sub_array;  
         }  
         $output = array(  
              "draw"            => intval($_POST["draw"]),
              "recordsTotal"    => $this->group_model->get_all_data(),
              "recordsFiltered" => $this->group_model->get_filtered_data(),
              "data"            => $data
         );  
         echo json_encode($output);  
         // echo '<pre>';print_r($output);
         // exit();
    } 



    function addGroup()
    {
       if(!in_array('createGroup', $this->permission)) {
           $this->loadThis();
       }
        else
        {
         
            $this->global['pageTitle'] = 'CodeInsect : Add New Group';

            $this->loadViews("groups/addGroup", $this->global, NULL);
        }
    }

    function addNewGroup()
    {
        if(!in_array('createGroup', $this->permission)) {
            $this->loadThis();
        }
        else
        {
            
            $this->form_validation->set_rules('group_name','Group Name','trim|required|max_length[128]');
   
            if($this->form_validation->run() == FALSE)
            {
                $this->addGroup();
            }
            else
            {
                  // true case
                   $permission = serialize($this->input->post('permission'));

               	$groupInfo = array(
               		'group_name' => $this->input->post('group_name'),
               		'permission' => $permission, 
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => $this->vendorId,
                    'status'     => 0
               	);

               	// pre($groupInfo);
               	// exit;
                
                $result = $this->group_model->addNewGroup($groupInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Group created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Group creation failed');
                }
                
                redirect('addGroup');
            }
        }
    }

    function editGroup($groupId = NULL)
    {
        if(!in_array('updateGroup', $this->permission)) {
            $this->loadThis();
        }
        else
        {
            if($groupId == null)
            {
                redirect('groupListing');
            }
            
            $data['group_data'] = $this->group_model->getGroupInfo($groupId);

            $this->global['pageTitle'] = 'CodeInsect : Edit Group';
            
            $this->loadViews("groups/editGroup", $this->global, $data, NULL);
        }
    }

    function editOldGroup()
    {
        if(!in_array('updateGroup', $this->permission)) {
            $this->loadThis();
        }
        else
        {
          $this->form_validation->set_rules('group_name','Group Name','trim|required|max_length[128]');
          
          if($this->form_validation->run() == FALSE)
          {
              $this->addGroup();
          }
          else
          {
                // true case

            $groupId = $this->input->post('group_id');
            
            $permission = serialize($this->input->post('permission'));

              $groupInfo = array(
                'group_name' => $this->input->post('group_name'),
                'permission' => $permission, 
                'modified_at' => date('Y-m-d H:i:s'),
                'modified_by' => $this->vendorId,
                'status'     => 0
              );

              // pre($groupInfo);
              // exit;
              
              $result = $this->group_model->editOldGroup($groupInfo, $groupId);
              
              if($result === TRUE)
              {
                  $this->session->set_flashdata('success', 'This Group updated successfully');
              }
              else
              {
                  $this->session->set_flashdata('error', 'Group updatetion failed');
              }
              
              redirect('groupListing');
          }
        }
    }


    function deleteGroup()
    {
      if(!in_array('deleteGroup', $this->permission)) {
        $this->loadThis();
      }
      $grp_id = $this->input->post('grp_id');
      $groupInfo = array(
        'modified_at'=>date('Y-m-d H:i:s'),
        'modified_by'=> $this->vendorId,
        'status'=>1
      );
      // $this->load->model('student_model');

      $result = $this->group_model->deleteGrpInfo($grp_id, $groupInfo);

      if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
      else { echo(json_encode(array('status'=>FALSE))); }

    }

    function deleteBulkGroup()
    {
      if(!in_array('deleteGroup', $this->permission)) {
        $this->loadThis();
      }
      $grp_ids = $this->input->post('grp_ids');

      $groupInfo = [];

      if(is_array($grp_ids)){
       foreach ($grp_ids as $grp_id){
          $groupInfo[] = array(
            'group_id' =>  $grp_id, 
            'modified_at'=>date('Y-m-d H:i:s'),
            'modified_by'=> $this->vendorId,
            'status'=>1
          );
        }
      }

      $result = $this->group_model->deleteBulkGrpInfo($groupInfo);

      if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
      else { echo(json_encode(array('status'=>FALSE))); }

    }





 }
 ?>