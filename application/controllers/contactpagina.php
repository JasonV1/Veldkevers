<?php
class Contactpagina extends CI_Controller {
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
}
/* End of file contact_class.php */
/* Location: ./application/controllers/contact.php */
