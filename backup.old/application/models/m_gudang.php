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
  		$query=$this->db->query( " SELECT barang.`NAMABARANG`, barang.`KODEBARANG`, barang.`JUMLAHBARANG`, barang.`HARGABARANG`,barang.`TANGGALMASUK`, kondisi.`NAMAKONDISI`, merk.`NAMAMERK`, sumber.`NAMASUMBER`, lokasi.`NAMALOKASI`, barang.`IDBARANG`
       		FROM barang INNER JOIN kondisi ON kondisi.`IDKONDISI` = barang.`IDKONDISI`
       		INNER JOIN merk ON merk.`IDMERK` = barang.`IDMERK` 
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
		$location = $_POST['lokasibarang'];
		$condition = $_POST['kondisibarang'];
		$brand = $_POST['namamerk'];
		$pay = $_POST['namasumber'];

		$query = $this->db->query("INSERT INTO barang (IDKONDISI, IDMERK, IDSUMBER, IDLOKASI, KODEBARANG, NAMABARANG, JUMLAHBARANG, HARGABARANG, TANGGALMASUK) VALUES ('$condition','$brand','$pay','$location','$barangcode','$barangname','$barangjumlah','$barangharga','$newdatein')");
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
	/*function deleteSumber($id){
		$this->db->delete("sumber",array('IDSUMBER'=>$id));
	}*/


  }
  ?>
