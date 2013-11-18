<?php
class Car_model extends CI_Model
{
  function Car_model()
  {
    parent::__construct();
  }
  public function get_car_data()
  {
       $this->load->database();
       $query=$this->db->get('auto');
       return $query->result();
  }
}
?>