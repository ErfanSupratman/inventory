<?php if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');

class Dashpeje extends CI_Controller /* Konsruktor*/
{
  public function __construct()
  {
    parent::__construct();
      $this->load->database();
      $this->load->model(array('m_login','m_gudang'));
      require_once(realpath(APPPATH."third_party/dompdf")."/dompdf_config.inc.php");
      spl_autoload_register('DOMPDF_autoload');
      if($this->session->userdata('isLogin') == FALSE){
      	redirect('login/login_form');
      } 
      else {
        if ($this->session->userdata('username') !== 'admin') {
          $user = $this->session->userdata('username');
        }
        else{
          redirect('login/login_form');
        }

      }
  }


  function index($id = NULL)
  {
    $username = $this->session->userdata('username');
    $userid = $this->session->userdata('id');
    $jmlpage = $this->db->get('barang');
    //pengaturan pagination
    $config['base_url'] = base_url().'dashpeje/index';
    $config['total_rows'] = $jmlpage->num_rows();
    $config['per_page'] = '25';
    $config['first_page'] = 'First';
    $config['last_page'] = 'Last';
    $config['next_page'] = '&laquo;';
    $config['prev_page'] = '&raquo;';

    $this->pagination->initialize($config);
    $data['page'] = $this->pagination->create_links();
    $data['barang'] = $this->m_gudang->listBarang_by_peje($userid);
    $data['jumlah'] = count($this->m_gudang->listBarang_by_peje($userid));
    $data['lokasi'] = $this->m_gudang->lokasi_by_peje($username);
    $data['kondisi'] = $this->m_gudang->getKondisi();
    $data['kodebarang'] = $this->m_gudang->listkodebarang();
    $data['sumberdana'] = $this->m_gudang->getSumberDana();
    $data['user'] = $username;
    


    $this->load->view('css/header');
    $this->load->view('dashpeje/topnav',$data);
    $this->load->view('dashpeje/adminmenu');
    $this->load->view('dashpeje/main'); 
    $this->load->view('css/footer');
  }
  public function lokasi($id){
    $username = $this->session->userdata('username');
    $userid = $this->session->userdata('id');
    $jmlpage = $this->db->get('barang');

 
    $config['total_rows'] = $jmlpage->num_rows();
    $config['per_page'] = '25';
    $config['first_page'] = 'First';
    $config['last_page'] = 'Last';
    $config['next_page'] = '&laquo;';
    $config['prev_page'] = '&raquo;';

    $this->pagination->initialize($config);
    $data1['page'] = $this->pagination->create_links();
    $data1['barang'] = $this->m_gudang->listBarang_by_lokasi($userid, $id);
    $data1['lokasi'] = $this->m_gudang->lokasi_by_peje($username);
    $data1['namalokasi'] = $this->m_gudang->lokasiSelect($id);
    $data1['kondisi'] = $this->m_gudang->getKondisi();
    $data['kodebarang'] = $this->m_gudang->listkodebarang();
    $data1['sumberdana'] = $this->m_gudang->getSumberDana();
    $data1['user'] = $username;
    $data1['idlokasi'] = $id;
    $data1['jumlah'] = count($this->m_gudang->listBarang_by_peje($userid));


    $this->load->view('css/header');
    $this->load->view('dashpeje/topnav', $data1);
    $this->load->view('dashpeje/adminmenu');
    $this->load->view('dashpeje/mainpeje');    
    $this->load->view('css/footer');  
  }

  function tambahbarang()
  {
      $this->m_gudang->addBarang();
      $command = escapeshellcmd('C:/xampp/htdocs/inventory/assets/data/pin_word_sd.py');
      $output = shell_exec($command);
      echo $command;
      redirect('dashpeje');
  }
  // function selectbarang($id){
  //   $username = $this->session->userdata('username');
  //   $data['updatebarang'] = $this->m_gudang->barangSelect($id);
  //   $data['lokasi'] = $this->m_gudang->lokasi_by_peje($username);
  //   $data['namalokasi'] = $this->m_gudang->lokasiSelect($id);
  //   $data['kodebarang'] = $this->m_gudang->listkodebarang();
  //   $data['kondisi'] = $this->m_gudang->getKondisi();
  //   $data['sumberdana'] = $this->m_gudang->getSumberDana();

  //   $this->load->view('dashpeje/editbarang', $data);
  //   $this->load->view('css/js');
  //   $this->load->view('css/logic_date');

  // }
    function selectbarangpindah($id){
    $username = $this->session->userdata('username'); 
    $data['updatebarang'] = $this->m_gudang->barangSelect($id);
    $data['lokasi'] = $this->m_gudang->lokasi_by_peje($username);
    $data['namalokasi'] = $this->m_gudang->lokasiSelect($id);
    $data['kondisi'] = $this->m_gudang->getKondisi();
    $data['kodebarang'] = $this->m_gudang->allkodebarang();
    $data['sumberdana'] = $this->m_gudang->getSumberDana();
    $data['lokasiAll'] = $this->m_gudang->getlokasi();

    $this->load->view('dashpeje/pindahbarang', $data);

  }
  function terimabarang($id){
    $this->m_gudang->terimaBarang($id);
    redirect('dashpeje');
  }
  function pindahbarang($id){
    $data= $this->m_gudang->lokasi_by_barang($id);
    $this->m_gudang->pindahBarang($id);
    unlink('C:/xampp/htdocs/inventory/assets/data/'.$id.'.doc');
    $command = escapeshellcmd('C:/xampp/htdocs/inventory/assets/data/pin_word_sd.py');
    $output = shell_exec($command);
    foreach ($data as $a) {
      redirect('dashpeje/lokasi/'.$a->IDLOKASI);
    }
    // $username = $this->session->userdata('username');
    // $userid = $this->session->userdata('id');

    // $data['barang'] = $this->m_gudang->listBarang_by_peje_all($userid);
    // $data['lokasi'] = $this->m_gudang->lokasi_by_peje($username);
    // $data['kondisi'] = $this->m_gudang->getKondisi();
    // $data['sumberdana'] = $this->m_gudang->getSumberDana();
    // $data['user'] = $username;

    // $this->load->view('css/header');
    // $this->load->view('dashpeje/topnav', $data);
    // $this->load->view('dashpeje/adminmenu');
    // $this->load->view('dashpeje/pindahbarang');    
    // $this->load->view('css/js');
    // $this->load->view('css/logic_date');
    // $this->load->view('css/footer');
  }
  function editbarang($id){
    $data= $this->m_gudang->lokasi_by_barang($id);
    $this->m_gudang->editBarang($id);
    unlink('C:/xampp/htdocs/inventory/assets/data/'.$id.'.doc');
    $command = escapeshellcmd('C:/xampp/htdocs/inventory/assets/data/pin_word_sd.py');
    $output = shell_exec($command);
    echo $command;
    foreach ($data as $a) {
      redirect('dashpeje/lokasi/'.$a->IDLOKASI);
    }
  }
  function deletebarang($id)
  {
    $data= $this->m_gudang->lokasi_by_barang($id);
    $this->m_gudang->hapusBarang($id);
    unlink('C:/xampp/htdocs/inventory/assets/data/'.$id.'.doc');
    //echo 'D:/BARBARIKA/xampp/htdocs/inventory/assets/data/'.$id.'.docx';
    foreach ($data as $a) {
      redirect('dashpeje/lokasi/'.$a->IDLOKASI);
    }
            
  }
  function updatepassword(){
    $userid = $this->session->userdata('id');
    $this->m_gudang->updPwd($userid);
    redirect('dashpeje');
  }
  function downpdf($id)
  {
      $data['petugas'] = $this->m_gudang->loadPetugas();
      $data['sekjur'] = $this->m_gudang->loadSekjur();
      $data['data'] = $this->m_gudang->get_barang_by_tempat($id);
      $data['ruangan'] = $this->m_gudang->get_ruangan($id);
      $html = $this->load->view('test',$data,true);
      $dompdf = new DOMPDF();
      $dompdf->load_html($html);
      $dompdf->render();
      $dompdf->stream($data['ruangan'][0]->NAMALOKASI.'.pdf');
  }

}