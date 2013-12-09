<?php
class Afspraak_model extends CI_Model
{
  function Afspraak_model()
  {
    parent::__construct();
  }
  public function get_car_data()
  {
       $this->load->database();
       $query=$this->db->get('auto');
       return $query->result();
  }
  
  public function get_car_data_by_id($id)
  {
      $this->load->database();
      $this->db->where('autoid', $id);
      $query = $this->db->get('auto');
      return $query->result();
  }
  
  public function get_appointment_info($id)
  {
      $this->load->database();
      $query = $this->db->query("SELECT * FROM `gebruiker`, `auto`
                                 WHERE `auto`.`autoid` = '".$id."'
                                 AND `gebruiker`.`emailadres` = '".$this->session->userdata["logged_in"]["emailadres"]."'
                                 AND `gebruiker`.`voornaam` = '".$this->session->userdata["logged_in"]["voornaam"]."'");
      return $query->result();
  }
  
  public function afspraak_maken($post)
  {
      $this->load->database();
      
      $this->db->query("INSERT INTO `afspraak` (`afspraaknr`,
                                                         `autoid`,
                                                         `gebruiker_id`,
                                                         `datum`,
                                                         `tijd`,
                                                         `bevestigd`)
                                                VALUES  (NULL,
                                                         '".$post['autoid']."',
                                                         '".$this->session->userdata["logged_in"]["user_id"]."',
                                                         '".$post['datum']."',
                                                         '".$post['tijd']."',
                                                         'nee')");
  }
  
  public function confirmation_link($post)
  {
      $this->load->database();
      $this->db->query("UPDATE `afspraak`
                        SET `bevestigd` = 'ja'
                        WHERE `afspraaknr` = '".$post['afspraaknr']."'");
  }
}