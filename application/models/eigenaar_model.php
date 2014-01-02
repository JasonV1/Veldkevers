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
  
  public function get_appointment_info($id)
  {
      $this->load->database();
      $query = $this->db->query("SELECT * FROM `gebruiker`, `auto`
                                 WHERE `auto`.`autoid` = '".$id."'
                                 AND `gebruiker`.`emailadres` = '".$this->session->userdata["logged_in"]["emailadres"]."'
                                 AND `gebruiker`.`voornaam` = '".$this->session->userdata["logged_in"]["voornaam"]."'");
      return $query->result();
  }
  
  public function afspraak_maken($post, $random)
  {
      
      $this->db->query("INSERT INTO `afspraak-eigenaren` (`afspraaknr`,
                                                           `autoid`,
                                                           `gebruiker_id`,
                                                           `datum`,
                                                           `bevestigd`,
                                                           `random`)
                                                  VALUES  (NULL,
                                                           '".$post['autoid']."',
                                                           '".$this->session->userdata["logged_in"]["user_id"]."',
                                                           '".$post['datum']."',
                                                           'nee',
                                                           '".$random."')");
  }
  
  public function update_appointment()
  {
    $rand = $this->input->get('random');
    $this->db->where('random',$rand);
    $data = array(
    'bevestigd' => 'ja',
    );
    return $this->db->update('afspraak-eigenaren', $data);

  }
}