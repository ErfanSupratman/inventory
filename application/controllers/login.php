<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    
    $this->load->model('m_login');
    
  }
  
  
  function index()
  {
    $session = $this->session->userdata('isLogin');
      if($session == FALSE)
      {
        redirect('login/login_form');
      }
      elseif($session == TRUE)
      {
        redirect('dashboard');
      }
      else
      redirect('login/logout');
  }
  
  
  function login_form()
  {
    $session = $this->session->userdata('isLogin');
    
      if($session == TRUE)
      {
        redirect('dashboard');
      }
      else {

    $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'required|md5|xss_clean');
    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    
      if($this->form_validation->run()==FALSE)
      {
      //$data['site_title'] = $this->m_login->getSiteTitle();
      // $data['priv'] = $this->m_login->getPriv();

        $this->load->view('css/header');
        $this->load->view('confirm');
        $this->load->view('css/js');
        $this->load->view('modal');
        $this->load->view('form_login');
        $this->load->view('css/ver');
        $this->load->view('css/footer');
      }else
      {
       $username = $this->input->post('username');
       $password = $this->input->post('password');
       //$level = $this->input->post('level');
       
       $cek = $this->m_login->ambilPengguna($username, $password);
        
        if($cek <> 0 )
        {
          $this->session->set_userdata('isLogin', TRUE);
          $this->session->set_userdata('username',$username);
         
         redirect('dashboard');
        }else {
         echo " <script>
		            alert('Login attempt failed, please check your username, password and login as!');
		            history.go(-1);
		          </script>";        
        }
      }  
  }
}
  
  
  function logout()
  {
   $this->session->sess_destroy();
   redirect('login/login_form');
  }

}

?>