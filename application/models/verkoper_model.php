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
}
// End of file verkoper_model.php
// File location: ./models/verkoper_model.php