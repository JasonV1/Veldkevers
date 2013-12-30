<?php

class Verkoper_model extends CI_Model
{
  function Verkoper_model()
  {
    parent::__construct();
  }
  
  public function get_afspraken()
  {
      $this->load->database();
      $query = $this->db->query("SELECT * FROM `afspraak`
                                 INNER JOIN `gebruiker` ON `afspraak`.`gebruiker_id` = `gebruiker`.`id`
                                 ORDER BY `afspraak`.`datum`, `afspraak`.`tijd`");
      
      return $query->result();
  }
  
  public function get_car_data_by_id($id)
  {
      $this->load->database();
      $this->db->where('autoid', $id);
      $query = $this->db->get('auto');
      return $query->result();
  }
  
  public function get_user_data()
  {
     $this->load->database();
     $return[''] = 'Selecteer een naam';
     $this->db->order_by('voornaam'); 
     $query = $this->db->get('gebruiker'); 
     foreach($query->result_array() as $row){
         $return[$row['id']] = $row['voornaam'];
     }
     return $return;
  }
  
  public function make_new_owner($post)
  {
      $this->load->database();
      
      $this->db->query("INSERT INTO `eigenaar` (`id`,
                                                         `autoid`,
                                                         `gekocht`,
                                                         `herinnering`,
                                                         `verkoper_id`)
                                                VALUES  ('".$post['voornaam']."',
                                                         '".$post['autoid']."',
                                                         '".$post['gekocht']."',
                                                         '".$post['herinnering']."',
                                                         '".$this->session->userdata["logged_in"]["user_id"]."')");
  }
}
// End of file verkoper_model.php
// File location: ./models/verkoper_model.php