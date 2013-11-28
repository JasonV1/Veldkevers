<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
 public function __construct()
 {
  parent::__construct();
 }
 function login($emailadres, $wachtwoord)
 {
  $query = $this->db->query("SELECT * FROM `gebruiker` 
                             LEFT JOIN `gebruikersrol` ON `id` = `gebruikersrol`.`gebruiker_id` 
                             WHERE `gebruiker`.`emailadres` =  '".$emailadres."'
                             AND `gebruiker`.`wachtwoord` = '".$wachtwoord."'");
  if($query->num_rows()>0)
  {
   foreach($query->result() as $rows)
   {
    //add all data to session
    $newdata = array(
      'rol_id' => $rows->rol_id,
      'user_id'  => $rows->id,
      'emailadres'    => $rows->emailadres,
      'logged_in'  => TRUE,
    );
   }
   $this->session->set_userdata("logged_in", $newdata);
   return $query->result();
   
  }
 }
 public function add_klant()
 {
  $this->db->trans_start();
  $data=array(
    'voornaam'=>$this->input->post('voornaam'),
    'achternaam'=>$this->input->post('achternaam'),
    'emailadres'=>$this->input->post('emailadres'),
    'telefoonnr'=>$this->input->post('telefoonnr'),
    'adres'=>$this->input->post('adres'),
    'wachtwoord'=>($this->input->post('wachtwoord'))
   );
  
  $this->db->insert('gebruiker', $data);
  
  $table1_id = $this->db->insert_id();
  
  $this->db->query('INSERT INTO gebruikersrol VALUES(1,' . $table1_id . ')');
  
  $this->db->trans_complete();
  
 }
}
?>