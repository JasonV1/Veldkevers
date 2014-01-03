<?php
class Contact_model extends CI_Model
{
  function Contact_model()
  {
    parent::__construct();
    $this->load->database();
  }
  
  public function insert_question()
  {
      $this->load->database();
      
      $data=array(
        'voornaam'=>$this->input->post('voornaam'),
        'achternaam'=>$this->input->post('achternaam'),
        'emailadres'=>$this->input->post('emailadres'),
        'vraag'=>$this->input->post('vraag'));
      
      $this->db->insert('contact', $data);
  }
}