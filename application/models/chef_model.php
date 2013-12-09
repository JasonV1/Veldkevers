<?php
class Chef_model extends CI_Model
{
  function Chef_model()
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
  
  public function add_car()
  {
    $data=array(
    'merk'=>$this->input->post('merk'),
    'type'=>$this->input->post('type'),
    'bouwjaar'=>$this->input->post('bouwjaar'),
    'prijs'=>$this->input->post('prijs'),
    'afbeelding'=>$this->input->post('afbeelding'),
    'filmpje'=>$this->input->post('filmpje'));
  
    
    $this->db->insert('auto', $data);
  }
  
  public function delete_car($id)
  {
      $this->load->database();
      $this->db->query("DELETE FROM `auto`
                        WHERE `autoid` = '".$id."'"); 
  }
  
  public function edit_car($post)
  {
    $this->load->database();
    
    $this->db->query("UPDATE `auto` SET `merk` = '".$post['merk']."',
				 `type` = '".$post['type']."',
				 `bouwjaar` = '".$post['bouwjaar']."',
                                 `prijs` = '".$post['prijs']."',
                                 `afbeelding` = '".$post['afbeelding']."',  
                                 `filmpje` = '".$post['filmpje']."'    
                               WHERE `autoid` = '".$post['autoid']."'");
    
    
  }
  
  public function edit_appointment($post)
  {
    $this->load->database();
    
    $this->db->query("UPDATE `afspraak` SET `datum` = '".$post['datum']."',
				 `tijd` = '".$post['tijd']."',
				 `bevestigd` = '".$post['bevestigd']."'   
                               WHERE `afspraaknr` = '".$post['afspraaknr']."'");
    
    
  }
  
  public function get_afspraken()
  {
      $this->load->database();
      $query = $this->db->query("SELECT * FROM `afspraak`
                                 INNER JOIN `gebruiker` ON `afspraak`.`gebruiker_id` = `gebruiker`.`id`
                                 ORDER BY `afspraak`.`datum`, `afspraak`.`tijd`");
      
      return $query->result();
  }
  
  public function get_adressen()
  {
      $this->load->database();
      $query = $this->db->query("SELECT DISTINCT * FROM `gebruiker`
                                INNER JOIN `gebruikersrol` ON `gebruiker`.`id` = `gebruikersrol`.`gebruiker_id` 
                                WHERE `gebruikersrol`.`rol_id` = 1");
      return $query->result();
  }
  
  public function get_appointment_data($id)
  {
      $this->load->database();
      
      $query = $this->db->query("SELECT * FROM `afspraak`, `gebruiker`
                                 WHERE `afspraak`.`afspraaknr` = '".$id."'
                                 AND `afspraak`.`gebruiker_id` = `gebruiker`.`id`
                                 ");
      return $query->result();
  }
}

// End of file chef_model.php
// File location: ./models/chef_model.php