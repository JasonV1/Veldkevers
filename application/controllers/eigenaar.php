<?php
class Eigenaar extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->model('eigenaar_model');
    }
    
    public function index()
    {
        $this->load->view('headeronecolumn');
        $this->load->view('index.html');
        $this->load->view('footeronecolumn');
    }
    
    public function welcome_eigenaar()
    {
        $this->load->view('headeronecolumn');
        $this->load->view('welcome_eigenaar');
        $this->load->view('footeronecolumn');
    }
    
    public function auto_eigenaar()
    {
        $this->load->view('headeronecolumn');
        $data['car_data']=$this->eigenaar_model->get_owner_car_data();
        $this->load->view('auto_eigenaar', $data);
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