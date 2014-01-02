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
    
    public function afspraak_onderhoudsbeurt($id)
    {
        $this->load->view('headeronecolumn');
        $data['query']=$this->eigenaar_model->get_appointment_info($id);
        $this->load->view('afspraak_onderhoudsbeurt', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function afspraak_maken()
    {
        $this->load->library('form_validation');
        // field name, error message, validation rules
        
        $this->form_validation->set_rules('datum', 'Datum', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            echo "Afspraak is niet gemaakt.";
            $this->auto_eigenaar();
        }
        else
        {
            echo "Afspraak is gemaakt. Ga naar uw mail om deze te bevestigen.";
            $random = random_string('unique');
            $this->eigenaar_model->afspraak_maken($_POST, $random);
            $this->load->library('email');

            $this->email->from('no-reply@veldkevers.nl', 'Garage veldkevers');
            $this->email->to($this->session->userdata["logged_in"]["emailadres"]); 
            
            $this->email->subject('Bevestigen afspraak');
            $this->email->message('Geachte klant,
                                   
                                   Bedankt voor het maken van een afspraak! 
                                   Gelieve hier te klikken om deze te bevestigen:
                                   http://localhost/veldkevers/index.php/eigenaar/afspraak_bevestigen?random='.$random.'');	

            $this->email->send();

            $this->auto_eigenaar();
        }
        
        
    }
    
    public function afspraak_bevestigen()
    {
        $this->eigenaar_model->update_appointment();
        $this->load->view('headeronecolumn');
        $this->load->view('afspraak_bevestigen');
        $this->load->view('footeronecolumn');
    }
}

// End of file verkoper.php
// File location: ./controllers/verkoper.php