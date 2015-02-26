<?php if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');

class Dashboard extends CI_Controller /* Konsruktor*/
{
  public function __construct()
  {
    parent::__construct();
      $this->load->database();
      $this->load->model(array('m_login','m_gudang'));

      if($this->session->userdata('isLogin') == FALSE){
      redirect('login/login_form');
      } else {
      $user = $this->session->userdata('username');
      }

  }


function index($id=NULL){

/*if($this->session->userdata('isLogin') == FALSE){
  redirect('login/login_form');
} else {
  $user = $this->session->userdata('username');
  }*/


  $jmlpage = $this->db->get('barang');
  //pengaturan pagination
             $config['base_url'] = base_url().'dashboard/index';
             $config['total_rows'] = $jmlpage->num_rows();
             $config['per_page'] = '25';
             $config['first_page'] = 'First';
             $config['last_page'] = 'Last';
             $config['next_page'] = '&laquo;';
             $config['prev_page'] = '&raquo;';

             $this->pagination->initialize($config);
             $data['page'] = $this->pagination->create_links();
             $data['barang'] = $this->m_gudang->listBarang();
             $data['lokasi'] = $this->m_gudang->getLokasi();
             $data['kondisi'] = $this->m_gudang->getKondisi();
             $data['merk'] = $this->m_gudang->loadMerk();
             $data['sumberdana'] = $this->m_gudang->getSumberDana();

             
             $this->load->view('css/header');
             $this->load->view('dashboard/topnav',$data);
             $this->load->view('dashboard/adminmenu');
             $this->load->view('dashboard/main');
             $this->load->view('css/js');
             $this->load->view('css/logic_date');
             $this->load->view('css/footer');

}


  function tambahbarang(){
    $this->m_gudang->addBarang();
    $command = escapeshellcmd('C:/xampp/htdocs/inventory/assets/data/pin_word_sd.py');
    $output = shell_exec($command);
    echo $command;
    redirect('dashboard');
  }

  function deletebarang($id){
    $this->m_gudang->hapusBarang($id);
    unlink('C:/xampp/htdocs/inventory/assets/data/'.$id.'.doc');
    //echo 'D:/BARBARIKA/xampp/htdocs/inventory/assets/data/'.$id.'.docx';
    redirect('dashboard');
  }

/*--------------SUMBERDANA---------------*/

public function sumberdana(){
            $data['sumber'] = $this->m_gudang->getSumberdana();
             $this->load->view('css/header');
             $this->load->view('dashboard/topnav',$data);
             $this->load->view('dashboard/adminmenu');
             $this->load->view('dashboard/sumber');
             $this->load->view('css/js');
             //$this->load->view('css/store_process');
             $this->load->view('css/footer');

}

  function deletesumber($id = null){
    $this->m_gudang->deleteSumber($id);
    redirect('dashboard/sumberdana');
}

  function tambahsumber(){
     $this->m_gudang->addSumber();
    redirect('dashboard/sumberdana');
  }
/*----------*/


/*-------------LOKASI---------------*/
public function lokasi(){
  $data['lokasi'] = $this->m_gudang->loadLokasi();

             $this->load->view('css/header');
             $this->load->view('dashboard/topnav',$data);
             $this->load->view('dashboard/adminmenu');
             $this->load->view('dashboard/lokasi');
             $this->load->view('css/js');
             $this->load->view('css/footer');
}

  function tambahlokasi(){
    $this->m_gudang->addLokasi();
    redirect('dashboard/lokasi');
  }

  /*--------------MERK-----------------*/
public function merk(){
  $data['merk'] = $this->m_gudang->loadMerk();
             $this->load->view('css/header');
             $this->load->view('dashboard/topnav',$data);
             $this->load->view('dashboard/adminmenu');
             $this->load->view('dashboard/merk');
             $this->load->view('css/js');
             $this->load->view('css/footer');
           }

  function tambahmerk(){
    $this->m_gudang->addMerk();
    redirect('dashboard/merk');
  }


  function download($id){
    redirect('dashboard');
}

/*-----------------USER------------------------------------------------------*/

public function user(){
			 $data['user_list'] = $this->m_gudang->loadUser(); 
			 $this->load->view('css/header');
             $this->load->view('dashboard/topnav');
             $this->load->view('dashboard/adminmenu');
             $this->load->view('dashboard/userlist',$data);
             $this->load->view('css/js');
             $this->load->view('css/footer');
           }
		   
		   
	function tambahuser(){
	$this->m_gudang->addUser();
	redirect('dashboard/user');
	}



  public function check_username_availablity(){
      $get_result = $this->m_gudang->check_username_availablity();
  
        if(!$get_result )
            echo '<span style="color:#f00">Username already in use.</span>';
        else
            echo '<span style="color:#00c">Username Available</span>';
    }

  public function deleteuser($id = null){
  $this->m_gudang->hapusUser($id);
  redirect('dashboard/user');
  }

}


?>