<?php if(!defined('BASEPATH')) exit('Hacking Attempt. Keluar dari sistem.');

class Dashboard extends CI_Controller /* Konsruktor*/
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
        if ($this->session->userdata('username') === 'admin') {
          $user = $this->session->userdata('username');
        }
        else{
          redirect('login/login_form');
        }

      }
  }


  function index($id=NULL)
  {
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
    $data['kodebarang'] = $this->m_gudang->listkodebarang();
    $data['kondisi'] = $this->m_gudang->getKondisi();
    $data['sumberdana'] = $this->m_gudang->getSumberDana();
    $data['user'] = $this->session->userdata('username');


    $this->load->view('css/header');
    $this->load->view('dashboard/topnav',$data);
    $this->load->view('dashboard/adminmenu');
    $this->load->view('dashboard/main');
    $this->load->view('css/footer');
  }


  function tambahbarang()
  {
      $this->m_gudang->addBarang();
      $command = escapeshellcmd('C:/xampp/htdocs/inventory/assets/data/pin_word_sd.py');
      $output = shell_exec($command);
      echo $command;
      redirect('dashboard');
  }
  function selectbarang($id){
    $data['updatebarang'] = $this->m_gudang->barangSelect($id);
    $data['lokasi'] = $this->m_gudang->getLokasi();
    $data['kondisi'] = $this->m_gudang->getKondisi();
    $data['kodebarang'] = $this->m_gudang->kodeSelect();
    $data['sumberdana'] = $this->m_gudang->getSumberDana();
    $data['user'] = $this->session->userdata('username');
    $this->load->view('dashboard/editbarang', $data);

    

  }

  function editbarang($id){
    $this->m_gudang->editBarang($id);
    unlink('C:/xampp/htdocs/inventory/assets/data/'.$id.'.doc');
    $command = escapeshellcmd('C:/xampp/htdocs/inventory/assets/data/pin_word_sd.py');
    $output = shell_exec($command);
    echo $command;
    redirect('dashboard');
  }
  function deletebarang($id)
  {
    $this->m_gudang->hapusBarang($id);
    unlink('C:/xampp/htdocs/inventory/assets/data/'.$id.'.doc');
    //echo 'D:/BARBARIKA/xampp/htdocs/inventory/assets/data/'.$id.'.docx';
    redirect('dashboard');
  }

/*--------------SUMBERDANA---------------*/

  public function sumberdana()
  {
    $data['sumber'] = $this->m_gudang->getSumberdana();
    $data['user'] = $this->session->userdata('username');
    $this->load->view('css/header');
    $this->load->view('dashboard/topnav',$data);
    $this->load->view('dashboard/adminmenu');
    $this->load->view('dashboard/sumber');
    $this->load->view('css/footer');
  }

  function deletesumber($id = null)
  {
    $this->m_gudang->deleteSumber($id);
    redirect('dashboard/sumberdana');
  }

  function tambahsumber()
  {
    $this->m_gudang->addSumber();
    redirect('dashboard/sumberdana');
  }
/*----------*/


/*-------------LOKASI---------------*/
  public function lokasi(){
    $data['lokasi'] = $this->m_gudang->listLokasi();
    $data['peje'] = $this->m_gudang->getpeje();
    $data['user'] = $this->session->userdata('username');
    $this->load->view('css/header');
    $this->load->view('dashboard/topnav',$data);
    $this->load->view('dashboard/adminmenu');
    $this->load->view('dashboard/lokasi');
    $this->load->view('css/validasi_lokasi');
    $this->load->view('css/footer');
  }

  function tambahlokasi(){
    $this->m_gudang->addLokasi();
    redirect('dashboard/lokasi');
  }

    function selectlokasi($id){
    $data['lokasi'] = $this->m_gudang->lokasiSelect($id);
    $data['peje'] = $this->m_gudang->getpeje();
    $this->load->view('dashboard/userlokasi', $data);

  }
  function deletelokasi($id){
    $this->m_gudang->hapusLokasi($id);
    redirect('dashboard/lokasi');
  }

  function updatelokasi($id){
    $this->m_gudang->editLokasi($id);
    redirect('dashboard/lokasi');
  }
/*--------------PEJE-----------------*/

/*--------------MERK-----------------*/
  // public function merk(){
  //   $data['merk'] = $this->m_gudang->loadMerk();
  //   $this->load->view('css/header');
  //   $this->load->view('dashboard/topnav',$data);
  //   $this->load->view('dashboard/adminmenu');
  //   $this->load->view('dashboard/merk');
  //   $this->load->view('css/js');
  //   $this->load->view('css/footer');
  // }    

  // function tambahmerk(){
  //   $this->m_gudang->addMerk();
  //   redirect('dashboard/merk');
  // }


  function download($id){
    redirect('dashboard');
  }

/*-----------------USER------------------------------------------------------*/

  public function user(){
    $data['petugas'] = $this->m_gudang->loadPetugas(); 
    $data['sekjur'] = $this->m_gudang->loadSekjur();
    $data['dosen'] = $this->m_gudang->loadDosen();
    $data['karyawan'] = $this->m_gudang->loadKaryawan();
    $data['user'] = $this->session->userdata('username');

    $this->load->view('css/header');
    $this->load->view('dashboard/topnav',$data);
    $this->load->view('dashboard/adminmenu');
    $this->load->view('dashboard/userlist');
    $this->load->view('css/validasi_peje');
    $this->load->view('css/footer');
  }
		   
  function tambahpeje(){
    $this->m_gudang->addPeje();
    redirect('dashboard/user');
  }

  function updatepassword(){
    $userid = $this->session->userdata('id');
    $this->m_gudang->updPwd($userid);
    redirect('dashboard');
  }
  function editpetugas($id){
    $this->m_gudang->editPetugas($id);
    redirect('dashboard/user');
  }
  function editsekjur($id){
    $this->m_gudang->editSekjur($id);
    redirect('dashboard/user');
  }
  public function check_username_availablity(){
    $hasil = $this->m_gudang->check_username_availablity();

    if($hasil == 1)
      echo 'Username sudah digunakan';
    elseif ($hasil == 0)
      echo 'Username tersedia';
  }
  public function check_kodelokasi_oke(){
    $hasil= $this->m_gudang->check_kodelokasi();
    
    if($hasil == 1)
      echo 'Kodelokasi sudah terdaftar';
    elseif($hasil == 0)
      echo 'Kodelokasi dapat ditambahkan';
  }

  public function deleteuser($id = null){
    $this->m_gudang->hapusUser($id);
    redirect('dashboard/user');
  }

  //-----------------------Cetak Inventaris---------------
  public function cetak()
  {
      $data['data'] = $this->m_gudang->get_all_ruangan();
      $data['user'] = $this->session->userdata('username');

      $this->load->view('css/header');
      $this->load->view('dashboard/topnav', $data);
      $this->load->view('dashboard/adminmenu');
      $this->load->view('dashboard/cetak');
      $this->load->view('css/footer');
  }

  function downPDF()
  {
      $id_tempat = (int)$this->input->post()['ruangan'];
      $data['petugas'] = $this->m_gudang->loadPetugas();
      $data['sekjur'] = $this->m_gudang->loadSekjur();
      $data['data'] = $this->m_gudang->get_barang_by_tempat($id_tempat);
      $data['ruangan'] = $this->m_gudang->get_ruangan($id_tempat);
      $html = $this->load->view('test',$data,true);
      $dompdf = new DOMPDF();
      $dompdf->load_html($html);
      $dompdf->render();
      $dompdf->stream($data['ruangan'][0]->NAMALOKASI.'.pdf');
  }
  //kodebarang
  public function kodebarang(){
    $data['kode'] = $this->m_gudang->allkodebarang();
    $data['user'] = $this->session->userdata('username');
    $this->load->view('css/header');
    $this->load->view('dashboard/topnav',$data);
    $this->load->view('dashboard/adminmenu');
    $this->load->view('dashboard/kodebarang');
    $this->load->view('css/validasi_kode');
    $this->load->view('css/footer');
  }

  function addkode(){
    $this->m_gudang->tambahkodebarang();
    redirect('dashboard/kodebarang');
  }

  function selectkode($id){
  $data['kode'] = $this->m_gudang->selectkodebarang($id);
  $this->load->view('dashboard/editkode', $data);

  }
  function deletekode($id){
    $this->m_gudang->hapuskodebarang($id);
    redirect('dashboard/kodebarang');
  }
  function checkkode(){
    $hasil= $this->m_gudang->checkkodebarang();
    
    if($hasil == 1)
      echo 'Kode sudah terdaftar';
    elseif($hasil == 0)
      echo 'Kode dapat ditambahkan';
  }
  function updatekode($id){
    $this->m_gudang->editkodebarang($id);
    redirect('dashboard/kodebarang');
  }

}