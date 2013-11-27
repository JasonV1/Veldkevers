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
}

// End of file: klant_model.php
// Location: ./models/klant_model.php