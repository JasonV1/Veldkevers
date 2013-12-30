<?php

class Eigenaar_model extends CI_Model
{
  function Eigenaar_model()
  {
    parent::__construct();
    $this->load->database();
  }
  
  public function get_owner_car_data()
  {
      $query = $this->db->query("SELECT * FROM `auto`, `eigenaar`
                        WHERE `auto`.`autoid` = `eigenaar`.`autoid`
                        AND `eigenaar`.`id` = '".$this->session->userdata["logged_in"]["user_id"]."'");
      
      return $query->result();
      
  }
}