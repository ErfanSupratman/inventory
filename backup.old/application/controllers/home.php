<?php if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    
     $this->load->library(array('session'));
     $this->load->helper('url');
     $this->load->model('m_login');
     $this->load->database();
     
  }
  
  
  public function index()
  {
    if($this->session->userdata('isLogin') == FALSE)
    {
      redirect('login/login_form');
    }else
    {
      $user = $this->session->userdata('username');
      
      $data['level'] = $this->session->userdata('level');        
      $data['pengguna'] = $this->m_login->dataPengguna($user);
      
      $this->load->view('css/header');
      $this->load->view('home_v', $data);
      $this->load->view('css/js');
      $this->load->view('css/ver');
      $this->load->view('css/footer');

    }
  }
}
?>