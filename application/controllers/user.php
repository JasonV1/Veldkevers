<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('user_model');
 }
 public function index()
 {
   $this->load->view('headeronecolumn');
   $this->load->view('index.html');
   $this->load->view('footeronecolumn');
 }
 
 public function registration_view()
 {
   $this->load->view('headeronecolumn');
   $this->load->view('registration');
   $this->load->view('footeronecolumn');
 }
 public function welcome()
 {
  $this->load->view('headeronecolumn');
  $this->load->view('welcome');
  $this->load->view('footeronecolumn');
 }
 public function login()
 { 
  $emailadres=$this->input->post('emailadres');
  $wachtwoord=($this->input->post('wachtwoord'));
  
  $result=$this->user_model->login($emailadres, $wachtwoord);
  if($result[0]->rol_id == 1){
      redirect('klant/welcome_klant','refresh');
  }
  if($result[0]->rol_id == 4){
      redirect('verkoper/welcome_verkoper','refresh');
  }
  if($result[0]->rol_id == 5){
      redirect('eigenaar/welcome_eigenaar','refresh');
  }
  if($result[0]->rol_id == 6){
      redirect('chef/welcome_chef','refresh');
  }
  else        
  {
      echo "Login mislukt, probeer opnieuw";
      $this->login_view();
  }
 }
 public function thank()
 {
  $data['title']= 'Thanks';
  $this->load->view('headeronecolumn',$data);
  $this->load->view('thank_view', $data);
  $this->load->view('footeronecolumn',$data);
 }
 
 public function login_view()
 {
  $this->load->view('headeronecolumn');
  $this->load->view('login_view');
  $this->load->view('footeronecolumn');
 }
 public function registration()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('voornaam', 'Voornaam', 'trim|required');
  $this->form_validation->set_rules('achternaam', 'Achternaam', 'trim|required');
  $this->form_validation->set_rules('emailadres', 'E-mail', 'trim|required|valid_email');
  $this->form_validation->set_rules('telefoonnr', 'Telefoonnr', 'trim');
  $this->form_validation->set_rules('adres', 'Adres', 'trim|required');
  $this->form_validation->set_rules('wachtwoord', 'Password', 'trim|required|min_length[4]|max_length[32]');
  $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[wachtwoord]');

  if($this->form_validation->run() == FALSE)
  {
   
   echo "Registratie mislukt";
   $this->registration_view();
  }
  else
  {
   $this->user_model->add_klant();
   $this->thank();
   $this->output->set_header('refresh:3;url=login_view'); 
  }
 }
 public function logout()
 {
  $newdata = array(
  'user_id'   =>'',
  'user_name'  =>'',
  'user_email'     => '',
  'logged_in' => FALSE,
  );
  $this->session->unset_userdata($newdata);
  $this->session->sess_destroy();
  $this->index();
 }
}