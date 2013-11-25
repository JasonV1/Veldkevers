<?php
class Klant extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
    }
    
    public function index()
    {
        $this->load->view('headeronecolumn');
        $this->load->view('index.html');
        $this->load->view('footeronecolumn');
    }
    
    public function welcome_klant()
    {
        $this->load->view('headeronecolumn');
        $this->load->view('welcome_klant');
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