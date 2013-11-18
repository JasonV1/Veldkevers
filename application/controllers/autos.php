<?php
class Autos extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->model('car_model');
    }
    
    public function index()
    {
        $this->load->view('headeronecolumn');
        $this->load->view('index.html');
        $this->load->view('footeronecolumn');
    }
    
    public function auto(){
        $this->load->view("headeronecolumn");
        $this->load->model('car_model'); 
        $data['query']=$this->car_model->get_car_data();
        $this->load->view('cars',$data);
        $this->load->view("footeronecolumn");
    }
}
?>
