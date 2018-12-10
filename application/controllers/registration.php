<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {   
        $this->load->view('registration');
    }    
    function register(){    

        $data_form = $this->input->post(NULL, TRUE);
        if($data_form){
            
            $email = $data_form['email'];
            $mobile = $data_form['mobile'];
            $name = $data_form['name'];
            $password = $data_form['password'];
            $date = date('Y-m-d H:i:s');
            $data = array(
                'email' => $email,
                'mobile' => $mobile,
                'name' => $name,
                'password' => md5($password),
                'createdDtm' => $date
            );
            
            $this->db->insert('tbl_users',$data);
            redirect("/login");
        }
     $this->load->view('/registration');
    } 
}
?>