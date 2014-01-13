<?php
class Verkoper extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->model('verkoper_model');
     $this->load->model('car_model');
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
        else if ( $this->session->userdata["logged_in"]["rol_id"] ==  1 )
        {
               echo "U heeft niet de juiste gebruikersrol, u wordt doorgestuurd naar uw homepage.";
               header('refresh:3;url='.base_url().'index.php/klant/welcome_klant'); 
               exit();
        }
    }
    
    public function index()
    {
        $this->load->view('headeronecolumn');
        $this->load->view('index.html');
        $this->load->view('footeronecolumn');
    }
    
    public function welcome_verkoper()
    {
        $this->load->view('headeronecolumn');
        $data = $this->beveiliging();
        $this->load->view('welcome_verkoper', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function cancel_appointment_view($id)
    {
        $this->load->view('headeronecolumn');
        $data = $this->beveiliging();
        $data['query']=$this->verkoper_model->appointment_data($id);
        $this->load->view('cancel_appointment_view', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function cancel_appointment()
    {
        $this->load->library('form_validation');
        // field name, error message, validation rules
        
        $this->form_validation->set_rules('reden', 'Reden', 'required');
        
        
        if($this->form_validation->run() == FALSE)
        {
            echo "Kan afspraak niet annuleren";
            
            $this->cancel_appointment_view();
        }
        else
        {
            echo "Afspraak geannuleerd";
            $this->verkoper_model->cancel_appointment($_POST);
            $this->cancel_appointment_view();
        }
    }
    
    public function auto_view_verkoper()
    {
        $this->load->view('headeronecolumn');
        $data = $this->beveiliging();
        $data['query']=$this->verkoper_model->get_car_data();
        $this->load->view('auto_view_verkoper',$data);
        $this->load->view('footeronecolumn');
    }
    
    public function koppel_auto($id)
    {
        $this->load->view('headeronecolumn');
        $data = $this->beveiliging();
        $data['car_data']=$this->verkoper_model->get_car_data_by_id($id);
        $data['achternaam']=$this->verkoper_model->get_user_data();
        $this->load->view('koppel_auto_view', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function make_new_owner()
    {
        $this->load->library('form_validation');
        // field name, error message, validation rules
        
        $this->form_validation->set_rules('achternaam', 'Achternaam', 'required');
        $this->form_validation->set_rules('gekocht', 'Gekocht', 'required');
        $this->form_validation->set_rules('herinnering', 'Herinnering', 'required');
        
        
        if($this->form_validation->run() == FALSE)
        {
            echo "Kan auto niet koppelen";
            
            $this->auto_view_verkoper();
        }
        else
        {
            echo "De auto is met succes gekoppeld.";
            $this->verkoper_model->make_new_owner($_POST);
            $this->auto_view_verkoper();
        }
    }
    
    public function afspraken()
    {
        $this->load->view('headeronecolumn');
        $data = $this->beveiliging();
        $data['query']=$this->verkoper_model->get_afspraken();
        $this->load->view('afspraken_view', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function auto_overzicht_verkoper($id)
    {
        $this->load->view('headeronecolumn');
        $data = $this->beveiliging();
        $data['query']=$this->verkoper_model->get_car_data_by_id($id);
        $this->load->view('auto_overzicht_verkoper',$data);
        $this->load->view('footeronecolumn');
    }
    
    private function get_laagste_prijs($aankoopdatum, $prijs)
    {
        $today = new Datetime();
        $sell_date = new Datetime($aankoopdatum);
        
        $diff = $today->diff($sell_date);
        //var_dump($diff->m);
        if ($diff->m < 3)
        {
            return 1.4 * $prijs;
        }
        else if ($diff->m < 6)
        {
            return 1.3 * $prijs;
        }
        else if ($diff->m < 12)
        {
            return 1.1 * $prijs;
        }
        else
        {
            return $prijs;
        }
    }
    
    private function get_advies_prijs($aankoopdatum, $prijs)
    {
        $today = new Datetime();
        $sell_date = new Datetime($aankoopdatum);
        
        $diff = $today->diff($sell_date);
        //var_dump($diff->m);
        if ($diff->m < 3)
        {
            return 2 * $prijs;
        }
        else if ($diff->m < 6)
        {
            return 1.8 * $prijs;
        }
        else if ($diff->m < 12)
        {
            return 1.4 * $prijs;
        }
        else
        {
            return $prijs;
        }
    }
    
    public function bekijk_prijzen($id)
    {
        $this->load->view('headeronecolumn');
        $data['query']=$this->verkoper_model->get_car_data_by_id($id);
        $data = $this->beveiliging();
        $data['query'] = $data['query'][0];
//        var_dump($data['query']); exit();
        $data['laagste']=$this->get_laagste_prijs($data['query']->aankoopdatum, $data['query']->prijs);
        $data['advies']=$this->get_advies_prijs($data['query']->aankoopdatum, $data['query']->prijs);
        $this->load->view('bekijk_prijzen', $data);
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

// End of file verkoper.php
// File location: ./controllers/verkoper.php