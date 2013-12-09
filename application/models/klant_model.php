<?php
class Klant_model extends CI_Model
{
  function Klant_model()
  {
    parent::__construct();
  }
  public function get_salesmen_data()
  {
       $this->load->database();
       $query=$this->db->query("SELECT DISTINCT * FROM `gebruiker`
                                INNER JOIN `gebruikersrol` ON `gebruiker`.`id` = `gebruikersrol`.`gebruiker_id` 
                                WHERE `gebruikersrol`.`rol_id` = 4");
       return $query->result();
  }
  
  public function get_chef_data()
  {
      $this->load->database();
      $query=$this->db->query("SELECT DISTINCT * FROM `gebruiker`
                               INNER JOIN `gebruikersrol` ON `gebruiker`.`id` = `gebruikersrol`.`gebruiker_id` 
                               WHERE `gebruikersrol`.`rol_id` = 6");
      return $query->result();
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
  
  public function afspraak_maken($post, $random)
  {
      $this->load->database();
      
      $this->db->query("INSERT INTO `afspraak` (`afspraaknr`,
                                                         `autoid`,
                                                         `gebruiker_id`,
                                                         `datum`,
                                                         `tijd`,
                                                         `bevestigd`,
                                                         `random`)
                                                VALUES  (NULL,
                                                         '".$post['autoid']."',
                                                         '".$this->session->userdata["logged_in"]["user_id"]."',
                                                         '".$post['datum']."',
                                                         '".$post['tijd']."',
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
    return $this->db->update('afspraak', $data);

  }
}

// End of file: klant_model.php
// Location: ./models/klant_model.php