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
            $random = random_string('unique');
            $this->klant_model->afspraak_maken($_POST, $random);
            $this->load->library('email');

            $this->email->from('no-reply@veldkevers.nl', 'Garage veldkevers');
            $this->email->to($this->session->userdata["logged_in"]["emailadres"]); 
            
            $this->email->subject('Bevestigen afspraak');
            $this->email->message('Geachte klant,
                                   
                                   Bedankt voor het maken van een afspraak! 
                                   Gelieve hier te klikken om deze te bevestigen:
                                   http://localhost/veldkevers/index.php/klant/afspraak_bevestigen?random='.$random.'');	

            $this->email->send();

            $this->auto_view_klant();
        }
        
        
    }
    
    
    public function afspraak_bevestigen()
    {
        $this->klant_model->update_appointment();
        $this->load->view('headeronecolumn');
        $this->load->view('afspraak_bevestigen');
        $this->load->view('footeronecolumn');
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
    
    public function bekijk_afspraken()
    {
        $this->load->view('headeronecolumn');
        $data['afspraken']=$this->klant_model->view_appointments();
        $this->load->view('bekijk_afspraken', $data);
        $this->load->view('footeronecolumn');
    }
}

// End of file: klant.php
// Location: ./controllers/klant.php