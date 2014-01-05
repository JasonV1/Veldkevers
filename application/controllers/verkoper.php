<?php
class Verkoper extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->model('verkoper_model');
     $this->load->model('car_model');
    }
    
    public function index()
    {
        $this->load->view('headeronecolumn');
        $this->load->view('index.html');
        $this->load->view('footeronecolumn');
    }
    
    public function welcome_verkoper()
    {
        $this->load->view('headeronecolumn');
        $this->load->view('welcome_verkoper');
        $this->load->view('footeronecolumn');
    }
    
    public function cancel_appointment()
    {
        $this->load->view('headeronecolumn');
        $this->load->view('cancel_appointment');
        $this->load->view('footeronecolumn');
    }
    
    public function auto_view_verkoper()
    {
        $this->load->view('headeronecolumn');
        $data['query']=$this->verkoper_model->get_car_data();
        $this->load->view('auto_view_verkoper',$data);
        $this->load->view('footeronecolumn');
    }
    
    public function koppel_auto($id)
    {
        $this->load->view('headeronecolumn');
        $data['car_data']=$this->verkoper_model->get_car_data_by_id($id);
        $data['achternaam']=$this->verkoper_model->get_user_data();
        $this->load->view('koppel_auto_view', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function make_new_owner()
    {
        $this->load->library('form_validation');
        // field name, error message, validation rules
        
        $this->form_validation->set_rules('achternaam', 'Achternaam', 'required');
        $this->form_validation->set_rules('gekocht', 'Gekocht', 'required');
        $this->form_validation->set_rules('herinnering', 'Herinnering', 'required');
        
        
        if($this->form_validation->run() == FALSE)
        {
            echo "Kan auto niet koppelen";
            
            $this->auto_view_verkoper();
        }
        else
        {
            echo "De auto is met succes gekoppeld.";
            $this->verkoper_model->make_new_owner($_POST);
            $this->auto_view_verkoper();
        }
    }
    
    public function afspraken()
    {
        $this->load->view('headeronecolumn');
        $data['query']=$this->verkoper_model->get_afspraken();
        $this->load->view('afspraken_view', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function logout()
    {
     $newdata = array(
     'user_id'   =>'',
     'user_name'  =>'',
     'user_email'     => '',
     'logged_in' => FALSE,
     );
     $this->session->unset_userdata($newdata );
     $this->session->sess_destroy();
     $this->index();
    }
}

// End of file verkoper.php
// File location: ./controllers/verkoper.php