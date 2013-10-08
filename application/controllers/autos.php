<?php
class Autos extends CI_Controller {
    public function index(){
        $this->load->view("headeronecolumn");
        $this->load->view("index.html");
        $this->load->view("footeronecolumn");
    }
    
    public function bananas(){
        $this->load->view("headeronecolumn");
        $this->load->view("apeshit");
        $this->load->view("footeronecolumn");
    }
}
?>
