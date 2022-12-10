<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Booking (BookingController)
 * Booking Class to control booking related operations.
 * @author : Kishor Mali
 * @version : 1.5
 * @since : 18 Jun 2022
 */
class Booking extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_model', 'bm');
        $this->isLoggedIn();
        $this->module = 'Booking';
    }

    /**
     * This is default routing method
     * It routes to default listing page
     */
    public function index()
    {
        redirect('booking/bookingListing');
    }
    
    /**
     * This function is used to load the booking list
     */
    function bookingListing()
    {
        if(!$this->hasListAccess())
        {
            $this->loadThis();
        }
        else
        {
            $searchText = '';
            if(!empty($this->input->post('searchText'))) {
                $searchText = $this->security->xss_clean($this->input->post('searchText'));
            }
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->bm->bookingListingCount($searchText);

			$returns = $this->paginationCompress ( "bookingListing/", $count, 10 );
            
            $data['records'] = $this->bm->bookingListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'CodeInsect : Booking';
            
            $this->loadViews("booking/list", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function add()
    {
        if(!$this->hasCreateAccess())
        {
            $this->loadThis();
        }
        else
        {
            $this->global['pageTitle'] = 'CodeInsect : Add New Booking';

            $this->loadViews("booking/add", $this->global, NULL, NULL);
        }
    }
    
    /**
     * This function is used to add new user to the system
     */
    function addNewBooking()
    {
        if(!$this->hasCreateAccess())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('roomName','Room Name','trim|required|max_length[50]');
            $this->form_validation->set_rules('description','Description','trim|required|max_length[1024]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->add();
            }
            else
            {
                $roomName = $this->security->xss_clean($this->input->post('roomName'));
                $description = $this->security->xss_clean($this->input->post('description'));
                
                $bookingInfo = array('roomName'=>$roomName, 'description'=>$description, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->bm->addNewBooking($bookingInfo);
                
                if($result > 0) {
                    $this->session->set_flashdata('success', 'New Booking created successfully');
                } else {
                    $this->session->set_flashdata('error', 'Booking creation failed');
                }
                
                redirect('booking/bookingListing');
            }
        }
    }

    
    /**
     * This function is used load booking edit information
     * @param number $bookingId : Optional : This is booking id
     */
    function edit($bookingId = NULL)
    {
        if(!$this->hasUpdateAccess())
        {
            $this->loadThis();
        }
        else
        {
            if($bookingId == null)
            {
                redirect('booking/bookingListing');
            }
            
            $data['bookingInfo'] = $this->bm->getBookingInfo($bookingId);

            $this->global['pageTitle'] = 'CodeInsect : Edit Booking';
            
            $this->loadViews("booking/edit", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editBooking()
    {
        if(!$this->hasUpdateAccess())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $bookingId = $this->input->post('bookingId');
            
            $this->form_validation->set_rules('roomName','Room Name','trim|required|max_length[50]');
            $this->form_validation->set_rules('description','Description','trim|required|max_length[1024]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->edit($bookingId);
            }
            else
            {
                $roomName = $this->security->xss_clean($this->input->post('roomName'));
                $description = $this->security->xss_clean($this->input->post('description'));
                
                $bookingInfo = array('roomName'=>$roomName, 'description'=>$description, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->bm->editBooking($bookingInfo, $bookingId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Booking updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Booking updation failed');
                }
                
                redirect('booking/bookingListing');
            }
        }
    }
}

?>