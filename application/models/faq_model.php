<?php
class Faq_model extends CI_Model
{
  function Faq_model()
  {
    parent::__construct();
    $this->load->database();
  }
  public function get_faq()
  {
      $query = $this->db->get('faq');
      return $query->result();
  }
}