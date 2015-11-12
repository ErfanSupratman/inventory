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
    $command = escapeshellcmd('D:/BARBARIKA/xampp/htdocs/inventory/assets/data/pin_word_sd.py');
    $output = shell_exec($command);
    echo $command;
    redirect('dashboard');
  }

  function deletebarang($id){
    $this->m_gudang->hapusBarang($id);
    unlink('D:/BARBARIKA/xampp/htdocs/inventory/assets/data/'.$id.'.docx');
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



  public function check_username_availablity(){
      $this->load->model('m_admin');
      $get_result = $this->m_admin->check_username_availablity();
  
        if(!$get_result )
            echo '<span style="color:#f00">Username already in use. </span>';
        else
            echo '<span style="color:#00c">Username Available</span>';
    }

  public function deleteuser($id = null){
  $this->m_admin->deleteUser($id);
  redirect('admin/user');
}

public function createrepport()
{
  $datestring = "%d/%m/%Y - %h:%i %A";
  $waktu = mdate($datestring);
  //$site = trim($this->input->post('siteid'));
  //$dateone = trim($this->input->post('start'));
  //$datetwo = trim($this->input->post('endingdate'));
  //$hasil = $this->m_admin->getReport($dateone,$datetwo);
  $hasil = $this->m_admin->getReport();
      //print_r($hasil);
//exit();
      require_once APPPATH.'libraries/PHPExcel.php';
      $excel = new PHPExcel();
      
      /*Start PageStyle*/
      $fontBig = array('size' => '16', 'bold' => true, 'name'=>'Calibri');
      $fontBold = array('size' => '11', 'bold' => true, 'name'=>'Calibri');
      $fontData = array('size' => '10', 'bold' => true, 'name'=>'Arial');

      $titleStyle = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        )
    );

      $border = $styleArray = array(
        'borders' => array(
          'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
          )
        )
      );
      /*End Page Style*/
      
      $excel->setActiveSheetIndex(0);
      $excel->setActiveSheetIndex(0)->mergeCells('C1:I2');
      $excel->setActiveSheetIndex(0)->mergeCells('A1:B1');
      $excel->setActiveSheetIndex(0)->mergeCells('J1:K1');
      $sheet = $excel->getActiveSheet();
      $sheet->getStyle()->getNumberFormat()->setFormatCode('@');
      $sheet->setTitle('REPORT Troubleshoot');

      $colsname = array('No' => 'A', 'Date Opened' => 'B', 'Time Opened' => 'C', 'Analyst' => 'D', 'Status' => 'E', 'Customer' => 'F', 'Details' => 'G', 'Category' => 'H', 'Resolution' => 'I' , 'Time Closed' => 'J', 'Date Closed' => 'K' );

      $endcol = 'K';
      $sheet->setCellValue('C1', 'IPS ACTIVITY LOG WEEKLY');
      $sheet->setCellValue('A1', 'LOGO');
      $sheet->setCellValue('J1', 'NOMOR');
      
      $sheet->getStyle('C1:I2')->getFont()->applyFromArray($fontBig);
      $sheet->getStyle('A1')->getFont()->applyFromArray($fontBig);
      $sheet->getStyle('A2:A3')->getFont()->applyFromArray($fontBold);
      $sheet->getStyle("C1:I2")->applyFromArray($titleStyle);

      foreach ($colsname as $key => $value){
        $sheet->getColumnDimension($value)->setAutoSize(true);
        $sheet->getRowDimension($value)->setRowHeight(100);
        $sheet->setCellValue($value.'5', $key);
      }
      $sheet->getStyle('A5:'.$endcol.'5')->getFont()->applyFromArray($fontBold);
      $sheet->getStyle('A5:'.$endcol.'5')->applyFromArray($titleStyle);

      $row = 5;
      if (isset($hasil)) {
        foreach ($hasil as $r) {
          $row++;
          $sheet->setCellValue('A'.$row, ($row-5));
          $sheet->getCell('B'.$row)->setValueExplicit($r['caseDateOpened'], PHPExcel_Cell_DataType::TYPE_STRING);
          $sheet->setCellValue('C'.$row, $r['caseTimeOpened']);
          $sheet->setCellValue('D'.$row, $r['caseAnalyst']);
          $sheet->setCellValue('E'.$row, $r['caseStatusCategory']);
          $sheet->setCellValue('F'.$row, $r['clientSiteName']);
          $sheet->setCellValue('G'.$row, $r['caseDetail']);
          $sheet->setCellValue('H'.$row, $r['categoryName']);
          $sheet->setCellValue('I'.$row, $r['caseResolution']);
          $sheet->setCellValue('J'.$row, $r['caseTimeClosed']);
          $sheet->setCellValue('K'.$row, $r['caseDateClosed']);
        }
        $sheet->getStyle('A5:'.$endcol.$row)->applyFromArray($border);
      }
      
      $writer = new PHPExcel_Writer_Excel5($excel);
      header('Content-type: application/vnd.ms-excel');
      $waktu = str_replace('/', '_', $waktu);
      $filename = 'IPS_LOGBOOK_'.$waktu.'.xls';
      header("Content-Disposition: attachment; filename=\"".$filename."\"");
      $writer->save('php://output'); 
      $excel->disconnectWorksheets();
      unset($excel);

    }

}

?>