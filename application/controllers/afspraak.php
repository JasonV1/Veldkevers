<?php
class Afspraak extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->model('afspraak_model');
    }
    
    public function index()
    {
        $this->load->view('headeronecolumn');
        $this->load->view('index.html');
        $this->load->view('footeronecolumn');
    }
    
    public function afspraak_view($id)
    {
        $this->load->view('headeronecolumn');
        $data['query']=$this->afspraak_model->get_car_data_by_id($id);
        $this->load->view('afspraak_view', $data);
        $this->load->view('footeronecolumn');
    }
    
    
}

/* End of file afspraak.php */
/* Location: ./application/controllers/afspraak.php */