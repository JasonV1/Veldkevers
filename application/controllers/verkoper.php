<?php
class Verkoper extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->model('verkoper_model');
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