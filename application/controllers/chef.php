<?php
class Chef extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->model('chef_model'); 
    }
    
    public function beveiliging()
    {
        if ( !isset( $this->session->userdata["logged_in"]["emailadres"]) )
        {
               echo "U bent niet ingelogd en daarom niet bevoegd om deze pagina te bekijken.";
               header('refresh:3;url='.base_url().'index.php'); 
               exit();
        }
        else if ( $this->session->userdata["logged_in"]["rol_id"] ==  4 )
        {
               echo "U heeft niet de juiste gebruikersrol, u wordt doorgestuurd naar uw homepage.";
               header('refresh:3;url='.base_url().'index.php/verkoper/welcome_verkoper'); 
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
    
    public function welcome_chef()
    {
        $this->load->view('headeronecolumn');
        $data = $this->beveiliging();
        $this->load->view('welcome_chef', $data);
        $this->load->view('footeronecolumn');
    }
    
        public function auto_view_chef(){
        $this->load->view("headeronecolumn");
        $data = $this->beveiliging();
        $data['query']=$this->chef_model->get_car_data();
        $this->load->view('auto_view_chef',$data);
        $this->load->view("footeronecolumn");
    }
    
    public function auto_overview_chef($id){
        $this->load->view("headeronecolumn");
        $data = $this->beveiliging();
        $data['query']=$this->chef_model->get_car_data_by_id($id);
        $this->load->view('auto_overview_chef',$data);
        $this->load->view("footeronecolumn");
    }
    
    public function edit_car_view($id)
    {
        $this->load->view("headeronecolumn");
        $data = $this->beveiliging();
        $data['query']=$this->chef_model->get_car_data_by_id($id);
        $this->load->view("edit_car", $data);
        $this->load->view("footeronecolumn");
    }
    
    public function edit_appointment_view($id)
    {
        $this->load->view("headeronecolumn");
        $data = $this->beveiliging();
        $data['query']=$this->chef_model->get_appointment_data($id);
        $this->load->view("edit_appointment", $data);
        $this->load->view("footeronecolumn");
    }
    
    public function new_car_view()
    {
        $this->load->view("headeronecolumn");
        $data = $this->beveiliging();
        $this->load->view("new_car", $data);
        $this->load->view("footeronecolumn");
    }
    
    public function new_car()
    {
        $this->load->library('form_validation');
        // field name, error message, validation rules
        
        $this->form_validation->set_rules('merk', 'Merk', 'trim|required');
        $this->form_validation->set_rules('type', 'Type', 'trim|required');
        $this->form_validation->set_rules('bouwjaar', 'Bouwjaar', 'trim|required');
        $this->form_validation->set_rules('prijs', 'Prijs', 'trim|required');
        $this->form_validation->set_rules('afbeelding', 'Afbeelding', 'trim|required');
        $this->form_validation->set_rules('filmpje', 'Filmpje', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            echo "Kan auto niet toevoegen";
            $this->new_car_view();
        }
        else
        {
            echo "De auto is met succes toegevoegd.";
            $this->chef_model->add_car();
            $this->new_car_view();
        }
    }
    
    public function edit_car()
    {
        $this->load->library('form_validation');
        // field name, error message, validation rules
        
        $this->form_validation->set_rules('merk', 'Merk', 'trim|required');
        $this->form_validation->set_rules('type', 'Type', 'trim|required');
        $this->form_validation->set_rules('bouwjaar', 'Bouwjaar', 'trim|required');
        $this->form_validation->set_rules('prijs', 'Prijs', 'trim|required');
        $this->form_validation->set_rules('afbeelding', 'Afbeelding', 'trim|required');
        $this->form_validation->set_rules('filmpje', 'Filmpje', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            echo "Kan auto niet wijzigen";
            $this->auto_view_chef();
        }
        else
        {
            echo "De auto is met succes gewijzigd.";
            $this->chef_model->edit_car($_POST);
            $this->auto_view_chef();
        }
    }
    
    public function delete_car($id)
    {
        $this->chef_model->delete_car($id);
        $this->auto_view_chef();
    }
    
    public function afspraken()
    {
        $this->load->view('headeronecolumn');
        $data = $this->beveiliging();
        $data['query']=$this->chef_model->get_afspraken();
        $this->load->view('afspraken_view_chef', $data);
        $this->load->view('footeronecolumn');
    }

    public function adressen()
    {
        $this->load->view('headeronecolumn');
        $data = $this->beveiliging();
        $data['query']=$this->chef_model->get_adressen();
        $this->load->view('adressen_view', $data);
        $this->load->view('footeronecolumn');
    }
    
    public function adressen_word()
    {
        
        // Load the library  
        $this->load->library('labels');  

        // Specify the format  
        $config['format'] = 'word';  
        // Specify the address layout, using HTML <br /> tags to determine line breaks  
        // The elements listed here become the address array keys (see below)  
        $config['layout'] = "voornaam achternaam<br />straatnaam<br />";  
        $this->labels->initialize($config);  

        // List the addresses to used on the labels  
        // Notice how the array keys correpond to the 'layout' element above  
        
        $addresses = array(  
           array(  
               'voornaam'=>'Hallo',  
               'achternaam'=>'Marks',  
               'straatnaam'=>'22 Sweet Avenue' 
           )
        ); 

        $this->labels->output($addresses);  
    }
    
    public function edit_appointment()
    {
        $this->load->library('form_validation');
        // field name, error message, validation rules
        
        $this->form_validation->set_rules('datum', 'Datum', 'trim|required');
        $this->form_validation->set_rules('tijd', 'Tijd', 'trim|required');
        $this->form_validation->set_rules('bevestigd', 'Bevestigd', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            echo "Kan afspraak niet wijzigen";
            $this->afspraken();
        }
        else
        {
            echo "De afspraak is met succes gewijzigd.";
            $this->chef_model->edit_appointment($_POST);
            $this->afspraken();
        }
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

// End of file chef.php
// File location: ./controllers/chef.php