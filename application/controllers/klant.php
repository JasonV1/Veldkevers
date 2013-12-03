<?php
class Klant extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->model('klant_model');
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
    
    public function personeelsleden()
    {
        $this->load->view('headeronecolumn');
        $data['verkopers']=$this->klant_model->get_salesmen_data();
        $data['chefs']=$this->klant_model->get_chef_data();
        $this->load->view('personeelsleden_view', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function afspraak_view($id)
    {
        $this->load->view('headeronecolumn');
        $data['query']=$this->klant_model->get_appointment_info($id);
        $this->load->view('afspraak_view', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function afspraak_maken()
    {
        $this->load->library('form_validation');
        // field name, error message, validation rules
        
        $this->form_validation->set_rules('datum', 'Datum', 'trim|required');
        $this->form_validation->set_rules('tijd', 'Tijd', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            echo "Afspraak is niet gemaakt.";
            $this->auto_view_klant();
        }
        else
        {
            echo "Afspraak is gemaakt. Ga naar uw mail om deze te bevestigen.";
            $this->klant_model->afspraak_maken($_POST);
            $this->auto_view_klant();
        }
    }
    
    public function auto_view_klant(){
        $this->load->view("headeronecolumn");
        $this->load->model('car_model'); 
        $data['query']=$this->klant_model->get_car_data();
        $this->load->view('auto_view_klant',$data);
        $this->load->view("footeronecolumn");
    }
    
    public function auto_overzicht_klant($id){
        $this->load->view("headeronecolumn");
        $data['query']=$this->klant_model->get_car_data_by_id($id);
        $this->load->view('auto_overzicht_klant',$data);
        $this->load->view("footeronecolumn");
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

// End of file: klant.php
// Location: ./controllers/klant.php