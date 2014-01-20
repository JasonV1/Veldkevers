<?php
class Faq extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->model('faq_model');
    }
    public function index(){
        $this->load->view("headeronecolumn");
        $this->load->view("index.html");
        $this->load->view("footeronecolumn");
    }
    
    public function faq_page(){
        $this->load->view("headeronecolumn");
        $data['query']=$this->faq_model->get_faq();
        $this->load->view("faq_page", $data);
        $this->load->view("footeronecolumn");
    }
}

/* End of file faq.php */
/* Location: ./application/controllers/faq.php */