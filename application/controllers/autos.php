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
    
    public function auto_view(){
        $this->load->view("headeronecolumn");
        $this->load->model('car_model'); 
        $data['query']=$this->car_model->get_car_data();
        $this->load->view('auto_view',$data);
        $this->load->view("footeronecolumn");
    }
    
    public function auto_overzicht($id){
        $this->load->view("headeronecolumn");
        $data['query']=$this->car_model->get_car_data_by_id($id);
        $this->load->view('auto_overzicht',$data);
        $this->load->view("footeronecolumn");
    }
    
}
/* End of file Autos.php */
/* Location: ./application/controllers/autos.php */
