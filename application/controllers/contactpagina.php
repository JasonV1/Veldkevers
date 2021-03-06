<?php
class Contactpagina extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->model('contact_model');
    }
    public function index(){
        $this->load->view("headeronecolumn");
        $this->load->view("index.html");
        $this->load->view("footeronecolumn");
    }
    
    public function contact(){
        $this->load->view("headeronecolumn");
        $this->load->view("contact");
        $this->load->view("footeronecolumn");
    }
    
    public function contactform()
    {
        $this->load->library('form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('voornaam', 'Voornaam', 'trim|required');
        $this->form_validation->set_rules('achternaam', 'Achternaam', 'trim|required');
        $this->form_validation->set_rules('emailadres', 'Emailadres', 'trim|required|valid_email');
        $this->form_validation->set_rules('vraag', 'Vraag', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
         echo "Vraag versturen mislukt";
         $this->contact();
        }
        else
        {
         echo "Uw vraag is verstuurd! Er wordt zo snel mogelijk contact met u opgenomen.";
         $this->contact_model->insert_question();
         
         $this->load->library('email');

         $this->email->from($_POST['emailadres'], $_POST['voornaam']);
         $this->email->to('jason.vdv.94@gmail.com'); 

         $this->email->subject('Bevestigen afspraak');
         $this->email->message('Hallo,
                                Er is een vraag binnengekomen via de contactpagina:
                                
                                Naam: '.$_POST['voornaam'].' '.$_POST['achternaam'].'
                                E-mailadres: '.$_POST['emailadres'].'
                                Vraag: '.$_POST['vraag'].'');	

         $this->email->send();
         $this->contact();
        }
    }
}
/* End of file contactpagina.php */
/* Location: ./application/controllers/contactpagina.php */
