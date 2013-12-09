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
        $data['query']=$this->afspraak_model->get_appointment_info($id);
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
            $this->load->library('email');

            $this->email->from('info@veldkevers.nl', 'Wij hebben geen naam');
            $this->email->to($this->session->userdata["logged_in"]["emailadres"]); 

            $this->email->subject('Bevestigen afspraak');
            $this->email->message('Geachte klant,
                                   
                                   Bedankt voor het maken van een afspraak! Klik op de link hieronder om de afspraak te bevestigen.
                                   http://localhost/veldkevers/index.php/afspraak/afspraak_bevestigen');	

            $this->email->send();

            $this->auto_view_klant();
        }
    }
        
    public function afspraak_bevestigen()
    {
        $this->load->view('headeronecolumn');
        $data['query']=$this->afspraak_model->confirmation_link($_POST);
        $this->load->view('afspraak_bevestigen', $data);
        $this->load->view('footeronecolumn');
    }
    
}

/* End of file afspraak.php */
/* Location: ./application/controllers/afspraak.php */