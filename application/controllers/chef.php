<?php
class Chef extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->model('chef_model'); 
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
        $this->load->view('welcome_chef');
        $this->load->view('footeronecolumn');
    }
    
        public function auto_view_chef(){
        $this->load->view("headeronecolumn");
        $data['query']=$this->chef_model->get_car_data();
        $this->load->view('auto_view_chef',$data);
        $this->load->view("footeronecolumn");
    }
    
    public function auto_overview_chef($id){
        $this->load->view("headeronecolumn");
        $data['query']=$this->chef_model->get_car_data_by_id($id);
        $this->load->view('auto_overview_chef',$data);
        $this->load->view("footeronecolumn");
    }
    
    public function edit_car_view($id)
    {
        $this->load->view("headeronecolumn");
        $data['query']=$this->chef_model->get_car_data_by_id($id);
        $this->load->view("edit_car", $data);
        $this->load->view("footeronecolumn");
    }
    
    public function new_car_view()
    {
        $this->load->view("headeronecolumn");
        $this->load->view("new_car");
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