<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
 public function __construct()
 {
  parent::__construct();
 }
 function login($emailadres,$wachtwoord)
 {
  $this->db->where("emailadres",$emailadres);
  $this->db->where("wachtwoord",$wachtwoord);

  $query=$this->db->get("gebruiker");
  if($query->num_rows()>0)
  {
   foreach($query->result() as $rows)
   {
    //add all data to session
    $newdata = array(
      'user_id'  => $rows->id,
      'emailadres'    => $rows->emailadres,
      'logged_in'  => TRUE,
    );
   }
   $this->session->set_userdata($newdata);
   return true;
  }
  return false;
 }
 public function add_user()
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
  
  $data1=array(
    'rolnaam'=>$this->input->post('rolnaam')
  );
  var_dump($data1);
  $this->db->insert('rollen', $data1);
  
  $this->db->trans_complete();
  
 }
}
?>