<?php if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');

class Operator extends CI_Controller /* Konsruktor*/
{
  public function __construct()
  {
    parent::__construct();
     $this->load->library(array('form_validation','session'));
     $this->load->helper('url');
     $this->load->database();
     $this->load->model(array('m_login','m_operator'));
     $level = $this->session->userdata('level');
     
     if($level<>2){
        redirect('home');
     }
}

public function getSite(){
    $data['site_list'] = $this->m_operator->getSiteList();  
  }

/*Index page /operator */
public function index($id=NULL)
  {
      if($this->session->userdata('isLogin') == FALSE)
          {
            redirect('login/login_form');
            }else
          {
            $user = $this->session->userdata('username');
            $data['level'] = $this->session->userdata('level');
            $data['pengguna'] = $this->m_login->dataPengguna($user);
          }

          //Memanggil data table_category
            $jumlahcat = $this->db->get('table_category');

            //pengaturan pagination
             $config['base_url'] = base_url().'operator/index';
             $config['total_rows'] = $jumlahcat->num_rows();
             $config['per_page'] = '5';
             $config['first_page'] = 'First';
             $config['last_page'] = 'Last';
             $config['next_page'] = '&laquo;';
             $config['prev_page'] = '&raquo;';

             //Inisialisasi
             $this->pagination->initialize($config);
             $data['page'] = $this->pagination->create_links();

          $data['site_list'] = $this->m_operator->getSiteList(); 
          $data['category_list'] = $this->m_operator->getCategory($config['per_page'], $id);
          $data['case_list'] = $this->m_operator->getProblem();
          $data['case_processed'] = $this->m_operator->getProblemProcessed();
          $data['case_fix'] = $this->m_operator->getProblemFixed();

      $this->load->view('css/header');
      $this->load->view('operator/topnav',$data);
      $this->load->view('operator/operatormenu');
      $this->load->view('operator/ticket');
      $this->load->view('css/js');
      $this->load->view('css/logic_dropdown');
      $this->load->view('css/store_process');
      $this->load->view('css/footer');
  }

public function getclientbysite($id){
  //$this->load->model('m_operator');
  $data['client_list'] = $this->m_operator->getClient($id);
  echo json_encode($data['client_list']);
}


public function addcategory(){
    //$this->load->model('m_operator');
    $this->m_operator->insertcategory();
    redirect('operator');}

public function updatecategory(){
  $this->m_operator->setCategory();
  redirect('operator');
}

public function addcase(){
    //$this->load->model('m_operator');
    $this->m_operator->insertcase();
    redirect('operator');
    }

public function updateprocess(){
  $this->m_operator->setProcess();
  redirect('operator');
}

public function updatequeued($id = null){
  $this->m_operator->setQueued($id);
  redirect('operator');
}

public function deletecase($id=null){
  $this->m_operator->deleteCase($id);
  redirect('operator');
}

public function deletecaseproses($id=null){
  $this->m_operator->deleteCaseProcess($id);
  redirect('operator');
}

public function deletecaseclosed($id=null){
  $this->m_operator->deleteCaseClosed($id);
  redirect('operator');
}

public function closecase($id = null){
  $this->m_operator->setClosed($id);
  redirect('operator');
}

public function delete($id = null){
  $this->m_operator->deleteCategory($id);
  redirect('operator');
}


public function profile(){
   {
      if($this->session->userdata('isLogin') == FALSE)
        {
          redirect('login/login_form');
        }else{
        $user = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $data['pengguna'] = $this->m_login->dataPengguna($user);
  }

      $this->load->view('css/header');
      $this->load->view('operator/topnav',$data);
      $this->load->view('operator/operatormenu');
      $this->load->view('operator/profile');
      $this->load->view('css/js');
      $this->load->view('css/logic_dropdown');
      $this->load->view('css/footer');

}
}

public function updatepass(){
  $this->m_operator->updatePassword();
  redirect('operator');
}

} ?>