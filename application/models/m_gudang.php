<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

/*Konstruktor */
class M_gudang extends CI_Model
{
  	public function __construct()
  	{
    	parent::__construct();
    	$this->load->database();
  	}

  function listBarang(){
  		$query=$this->db->query( "SELECT barang.`NAMABARANG`, barang.`TANGGALSPJ`, barang.`TIPEBARANG`, barang.`MERKBARANG`, barang.`KODEBARANG`, barang.`JUMLAHBARANG`, barang.`HARGABARANG`,barang.`TANGGALMASUK`, kondisi.`NAMAKONDISI`, sumber.`NAMASUMBER`, lokasi.`NAMALOKASI`, barang.`IDBARANG`
       		FROM barang INNER JOIN kondisi ON kondisi.`IDKONDISI` = barang.`IDKONDISI` 
       		INNER JOIN sumber ON sumber.`IDSUMBER` = barang.`IDSUMBER`
       		INNER JOIN lokasi ON lokasi.`IDLOKASI` = barang.`IDLOKASI`
			GROUP BY barang.`IDBARANG`");

  		return $query->result();
  	}

  	function addBarang(){
  		$barangname = $_POST['namabarang'];
  		$barangcode = $_POST['kodebarang'];
		$barangjumlah = $_POST['jumlahbarang'];
		$barangharga = $_POST['hargabarang'];
		$datein = $_POST['tanggalmasuk'];
		$newdatein = date('Y-m-d', strtotime($datein));
                $datespj = $_POST['tanggalspj'];
                $newdatespj = date('Y-m-d', strtotime($datespj));
		$location = $_POST['lokasibarang'];
		$condition = $_POST['kondisibarang'];
		$brand = $_POST['namamerk'];
                $type = $_POST['tipebarang'];
		$pay = $_POST['namasumber'];

		$query = $this->db->query("INSERT INTO barang (IDKONDISI, MERKBARANG, IDSUMBER, IDLOKASI, KODEBARANG, NAMABARANG, JUMLAHBARANG, HARGABARANG, TANGGALMASUK, TANGGALSPJ, TIPEBARANG) VALUES ('$condition','$brand','$pay','$location','$barangcode','$barangname','$barangjumlah','$barangharga','$newdatein','$newdatespj','$type')");
		return $query;
  	}

  	function hapusBarang($id){
  		$this->db->query("DELETE FROM barang WHERE idbarang = $id");
  	}

  		function getLokasi(){

		$count = 0;
		$result = array();
       	$this->db->select('*');
       	$this->db->from('lokasi');
       	$this->db->order_by('NAMALOKASI','ASC');
       	$array_keys_values = $this->db->get();
	   	$result[$count] = array("IDLOKASI" => 0, "NAMALOKASI" => ' -Pilih Lokasi-');
		foreach ($array_keys_values->result() as $row)
    			{
        			$result[++$count] = array("IDLOKASI" => $row->IDLOKASI, "NAMALOKASI" => $row->NAMALOKASI);
    			}
        return $result;
	}


	function getSumberDana(){
		$query=$this->db->query("SELECT * FROM sumber");
		return $query->result();
	}

	function addSumber()
	{
		$sumbername = $_POST['namasumber'];
		$kodesumber = $_POST['kodesumber'];
		$query = $this->db->query("INSERT INTO sumber (KODESUMBER, NAMASUMBER) VALUES ('$kodesumber','$sumbername')");
		return $query;
	}


	function loadLokasi(){
		$query=$this->db->query("SELECT * FROM lokasi");
		return $query->result();
	}

	function addLokasi()
	{
		$lokasicode = $_POST['kodelokasi'];
		$lokasiname = $_POST['namalokasi'];
		$lokasifloor = $_POST['lantai'];
		$query = $this->db->query("INSERT INTO lokasi (KODELOKASI, NAMALOKASI, LANTAILOKASI) VALUES ('$lokasicode', '$lokasiname', '$lokasifloor')");

	}

	function loadMerk(){
		$query=$this->db->query("SELECT * FROM merk");
		return $query->result();
	}

	function addMerk()
	{
		$namabrand = $_POST['namamerk'];	
		$query = $this->db->query("INSERT INTO merk (NAMAMERK) VALUES ('$namabrand')");

	}

	function getKondisi(){
		$query=$this->db->query("SELECT * FROM kondisi");
		return $query->result();
	}
	
	function addUser(){
	$password = md5($_POST['pwd']);
	$usernama = $_POST['username'];
	
	$query=$this->db->query("INSERT INTO users (NAMAUSER, PASSUSER)
								VALUES ('$usernama','$password');");
		
		return $query;
	}
	
	function loadUser(){
	$query=$this->db->query("SELECT * FROM users");
	return $query->result();
	}
	
	function hapusUser($id){
  		$this->db->query("DELETE FROM users WHERE idusers = $id");
  	}
	
	
	public function check_username_availablity(){
        $username = trim($this->input->post('username'));
		$username = strtolower($username);	
	
		$query = $this->db->query("SELECT * FROM users WHERE NAMAUSER='$username'");
		if($query->num_rows() > 1)
			return false;
		else
			return true;}
	/*function deleteSumber($id){
		$this->db->delete("sumber",array('IDSUMBER'=>$id));
	}*/


  }
  ?>
