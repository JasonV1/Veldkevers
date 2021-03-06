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
     $query = $this->db->query("SELECT * FROM `gebruiker`
                                LEFT JOIN `gebruikersrol` ON `id` = `gebruikersrol`.`gebruiker_id` 
                                WHERE `gebruikersrol`.`rol_id` = 1
                                ORDER BY `gebruiker`.`achternaam`
                                ");
     foreach($query->result_array() as $row){
         $return[$row['id']] = $row['achternaam'];
     }
     return $return;
  }
  
  public function get_car_data()
  {
       $this->load->database();
       $query = $this->db->query("SELECT * FROM `auto`
                                  WHERE `verkocht` = 'nee'");
       return $query->result();    
  }
  
  public function make_new_owner($post)
  {
      $this->load->database();
      
      $this->db->query("INSERT INTO `eigenaar` (`id`,
                                                         `autoid`,
                                                         `gekocht`)
                                                VALUES  ('".$post['achternaam']."',
                                                         '".$post['autoid']."',
                                                         '".$post['gekocht']."'')");
      
      $this->db->query("UPDATE `gebruikersrol` SET `rol_id` = 5
                        WHERE `gebruiker_id` = ".$post['achternaam']."");
      
      $this->db->query("UPDATE `auto` SET `verkocht` = 'ja'
                        WHERE `autoid` = ".$post['autoid']."");
      
 
  }
  
  public function appointment_data($id)
  {
      $this->load->database();
      $query = $this->db->query("SELECT * FROM `afspraak`
                                 WHERE `afspraaknr` = '".$id."'");
      return $query->result();
  }
  
  public function cancel_appointment($post)
  {
      $this->load->database();
      
      $this->db->query("INSERT INTO `geannuleerde-afspraken` (`afspraaknr`,
                                                              `gebruiker_id`,
                                                              `reden`)
                                                VALUES  ('".$post['afspraaknr']."',
                                                         '".$post['gebruiker_id']."',
                                                         '".$post['reden']."')");
  }
}
// End of file verkoper_model.php
// File location: ./models/verkoper_model.php