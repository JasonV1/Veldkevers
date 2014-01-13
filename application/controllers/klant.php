<?php
class Klant extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->model('klant_model');
    }
    
    public function beveiliging()
    {
        if ( !isset( $this->session->userdata["logged_in"]["emailadres"]) )
        {
               echo "U bent niet ingelogd en daarom niet bevoegd om deze pagina te bekijken.";
               header('refresh:3;url='.base_url().'index.php'); 
               exit();
        }
        else if ( $this->session->userdata["logged_in"]["rol_id"] ==  6 )
        {
               echo "U heeft niet de juiste gebruikersrol, u wordt doorgestuurd naar uw homepage.";
               header('refresh:3;url='.base_url().'index.php/chef/welcome_chef'); 
               exit();
        }
        else if ( $this->session->userdata["logged_in"]["rol_id"] ==  5 )
        {
               echo "U heeft niet de juiste gebruikersrol, u wordt doorgestuurd naar uw homepage.";
               header('refresh:3;url='.base_url().'index.php/eigenaar/welcome_eigenaar'); 
               exit();
        }
        else if ( $this->session->userdata["logged_in"]["rol_id"] ==  4 )
        {
               echo "U heeft niet de juiste gebruikersrol, u wordt doorgestuurd naar uw homepage.";
               header('refresh:3;url='.base_url().'index.php/verkoper/welcome_verkoper'); 
               exit();
        }
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
        $data = $this->beveiliging();
        $this->load->view('welcome_klant', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function personeelsleden()
    {
        $this->load->view('headeronecolumn');
        $data = $this->beveiliging();
        $data['verkopers']=$this->klant_model->get_salesmen_data();
        $data['chefs']=$this->klant_model->get_chef_data();
        $this->load->view('personeelsleden_view', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function afspraak_view($id)
    {
        $this->load->view('headeronecolumn');
        $data = $this->beveiliging();
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
            echo "Afspraak is niet gemaakt, waarschijnlijk omdat u bent vergeten een veld in te vullen. Gelieve het opnieuw te proberen.";
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
        $data = $this->beveiliging();
        $this->load->view('afspraak_bevestigen', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function auto_view_klant(){
        $this->load->view("headeronecolumn");
        $this->load->model('car_model'); 
        $data = $this->beveiliging();
        $data['query']=$this->klant_model->get_car_data();
        $this->load->view('auto_view_klant',$data);
        $this->load->view("footeronecolumn");
    }
    
    public function auto_overzicht_klant($id){
        $this->load->view("headeronecolumn");
        $data['query']=$this->klant_model->get_car_data_by_id($id);
        $data = $this->beveiliging();
        $this->load->view('auto_overzicht_klant',$data);
        $this->load->view("footeronecolumn");
    }
    
    public function bekijk_afspraken()
    {
        $this->load->view('headeronecolumn');
        $data['afspraken']=$this->klant_model->view_appointments();
        $data = $this->beveiliging();
        $this->load->view('bekijk_afspraken', $data);
        $this->load->view('footeronecolumn');
    }
}

// End of file: klant.php
// Location: ./controllers/klant.php