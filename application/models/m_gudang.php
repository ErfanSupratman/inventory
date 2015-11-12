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
  		$query=$this->db->query( "SELECT barang.`NAMABARANG`, barang.`TANGGALSPJ`, barang.`TIPEBARANG`, barang.`MERKBARANG`, kodebarang.`KODE`, barang.`JUMLAHBARANG`, barang.`HARGABARANG`,barang.`TANGGALMASUK`, kondisi.`NAMAKONDISI`, sumber.`NAMASUMBER`, lokasi.`NAMALOKASI`, barang.`IDBARANG`
       		FROM barang INNER JOIN kondisi ON kondisi.`IDKONDISI` = barang.`IDKONDISI` 
       		INNER JOIN sumber ON sumber.`IDSUMBER` = barang.`IDSUMBER`
       		INNER JOIN lokasi ON lokasi.`IDLOKASI` = barang.`IDLOKASI`
       		INNER JOIN kodebarang ON kodebarang.`IDKODE` = barang.`IDKODE`
			GROUP BY barang.`IDBARANG`");

  		return $query->result();
  	}
  	function listBarang_by_peje($id){
  		$query=$this->db->query( "SELECT barang.`NAMABARANG`, barang.`TANGGALSPJ`, barang.`TIPEBARANG`, barang.`MERKBARANG`, kodebarang.`KODE`, barang.`JUMLAHBARANG`, barang.`HARGABARANG`,barang.`TANGGALMASUK`, kondisi.`NAMAKONDISI`, sumber.`NAMASUMBER`, lokasi.`NAMALOKASI`, barang.`IDBARANG`
       		FROM barang INNER JOIN kondisi ON kondisi.`IDKONDISI` = barang.`IDKONDISI` 
       		INNER JOIN sumber ON sumber.`IDSUMBER` = barang.`IDSUMBER`
       		INNER JOIN lokasi ON lokasi.`IDLOKASI` = barang.`IDLOKASI`
       		INNER JOIN kodebarang ON kodebarang.`IDKODE` = barang.`IDKODE`
       		WHERE lokasi.`IDUSER` = '$id' AND barang.`TERIMA` = 0");

  		return $query->result();
  	}
  	function listBarang_by_peje_all($id){
  		$query=$this->db->query( "SELECT barang.`NAMABARANG`, barang.`TANGGALSPJ`, barang.`TIPEBARANG`, barang.`MERKBARANG`, kodebarang.`KODE`, barang.`JUMLAHBARANG`, barang.`HARGABARANG`,barang.`TANGGALMASUK`, kondisi.`NAMAKONDISI`, sumber.`NAMASUMBER`, lokasi.`NAMALOKASI`, barang.`IDBARANG`
       		FROM barang INNER JOIN kondisi ON kondisi.`IDKONDISI` = barang.`IDKONDISI` 
       		INNER JOIN sumber ON sumber.`IDSUMBER` = barang.`IDSUMBER`
       		INNER JOIN lokasi ON lokasi.`IDLOKASI` = barang.`IDLOKASI`
       		INNER JOIN kodebarang ON kodebarang.`IDKODE` = barang.`IDKODE`
       		WHERE lokasi.`IDUSER` = '$id'");

  		return $query->result();
  	}

  	function listBarang_by_lokasi($id, $idloks){
  		$query=$this->db->query( "SELECT barang.`NAMABARANG`, barang.`TANGGALSPJ`, barang.`TIPEBARANG`, barang.`MERKBARANG`, kodebarang.`KODE`, barang.`JUMLAHBARANG`, barang.`HARGABARANG`,barang.`TANGGALMASUK`, kondisi.`NAMAKONDISI`, sumber.`NAMASUMBER`, lokasi.`NAMALOKASI`, barang.`IDBARANG`
       		FROM barang INNER JOIN kondisi ON kondisi.`IDKONDISI` = barang.`IDKONDISI` 
       		INNER JOIN sumber ON sumber.`IDSUMBER` = barang.`IDSUMBER`
       		INNER JOIN lokasi ON lokasi.`IDLOKASI` = barang.`IDLOKASI`
       		INNER JOIN kodebarang ON kodebarang.`IDKODE` = barang.`IDKODE`
       		WHERE lokasi.`IDUSER` = '$id' AND lokasi.`IDLOKASI` = '$idloks' AND barang.`TERIMA` = 1");

  		return $query->result();
  	}
  	function terimaBarang($id){
  		$data = array(
               'TERIMA' => 1
            );

		$this->db->where('IDBARANG', $id);
		$this->db->update('barang', $data); 

  	}
  	function listlokasi(){
		$query=$this->db->query( "SELECT lokasi.`KODELOKASI`, lokasi.`NAMALOKASI`, lokasi.`LANTAILOKASI`, user.`NAMAUSER`, user.`NIPUSER` , lokasi.`IDLOKASI`
       		FROM lokasi INNER JOIN user ON lokasi.`IDUSER` = user.`IDUSER`
			GROUP BY lokasi.`IDLOKASI`");
  		return $query->result();  		
  	}

  	function lokasi_by_barang($id){
  		$query=$this->db->query("SELECT IDLOKASI FROM barang WHERE IDBARANG = $id");
		return $query->result();
  	}
  	function addBarang(){
  		$barangname = $_POST['namabarang'];
  		$barangcode = $_POST['idkode'];
		$barangjumlah = $_POST['jumlahbarang'];
		$barangharga = str_replace(' ', '', $_POST['hargabarang']);
		$datein = $_POST['tanggalmasuk'];
			$newdatein = date('Y-m-d', strtotime($datein));
        $datespj = $_POST['tanggalspj'];
        	$newdatespj = date('Y-m-d', strtotime($datespj));
		$location = $_POST['lokasibarang'];
		$condition = $_POST['kondisibarang'];
		$brand = $_POST['namamerk'];
        $type = $_POST['tipebarang'];
		$pay = $_POST['namasumber'];
		$spek = $_POST['spekbarang'];


		$query = $this->db->query("INSERT INTO barang (IDKONDISI, IDSUMBER, IDLOKASI, IDKODE, NAMABARANG, JUMLAHBARANG, HARGABARANG, TANGGALMASUK, TANGGALSPJ, TIPEBARANG, MERKBARANG, SPEKBARANG, TERIMA ) VALUES ('$condition','$pay','$location','$barangcode','$barangname','$barangjumlah','$barangharga','$newdatein','$newdatespj','$type','$brand', '$spek',  0)");
		return $query;
  	}

  	function editBarang($id){
  		$datein = $_POST['tanggalmasuk'];
		$newdatein = date('Y-m-d', strtotime($datein));
        $datespj = $_POST['tanggalspj'];
        $newdatespj = date('Y-m-d', strtotime($datespj));
        $barangharga = str_replace(' ', '', $_POST['hargabarang']);
  		$data = array(
               'IDKONDISI' => $_POST['kondisibarang'],
               'MERKBARANG' => $_POST['namamerk'],
               'IDSUMBER' => $_POST['namasumber'],
               'IDLOKASI' => $_POST['lokasibarang'],
               'IDKODE' => $_POST['idkode'],
               'NAMABARANG' => $_POST['namabarang'],
               'JUMLAHBARANG' => $_POST['jumlahbarang'],
               'HARGABARANG' => $barangharga,
               'TANGGALMASUK' => $newdatein,
               'TANGGALSPJ' => $newdatespj,
               'TIPEBARANG' => $_POST['tipebarang'],
               'SPEKBARANG' => $_POST['spekbarang']

            );

		$this->db->where('IDBARANG', $id);
		$this->db->update('barang', $data); 
  	}

  	function pindahBarang($id){
  		// log barang pindah
  		$datein = $_POST['tanggalpindah'];
		$newdatein = date('Y-m-d', strtotime($datein));
		$idpindah = $_POST['lokasipindah'];
		$query2 = $query=$this->db->query("SELECT NAMALOKASI FROM lokasi WHERE idlokasi = '$idpindah'");
		$kode2 = $query->result();
		foreach ($kode2 as $key) {
			$data = array(
            'ISILOG' => $newdatein." ".$_POST['namabarang']." pindah dari ".$_POST['lokasibarang']." ke ".$key->NAMALOKASI." berjumlah ".$_POST['jumlahbarangpindah']
	        );
		}
  		$this->db->insert('log', $data);

		// barang pidndah 
		$selisih = $_POST['jumlahbarang'] - $_POST['jumlahbarangpindah'];
		$idpindah = $_POST['lokasipindah'];
		$query = $query=$this->db->query("SELECT IDKODE, JUMLAHBARANG FROM barang WHERE idlokasi = '$idpindah'");
		$kode = $query->result();
		$kodebar = $_POST['idkode'];
		
		if($selisih == 0){
			$data4 = array(
	           'IDKONDISI' => $_POST['kondisibarang'],
	           'IDLOKASI' => $_POST['lokasipindah'],
	           'IDKODE' => $_POST['idkode'],
	           'JUMLAHBARANG' => $_POST['jumlahbarangpindah'],
	           'TERIMA' => 0
	        );
			$this->db->where('IDBARANG', $id);
			$this->db->update('barang', $data4);
		}else{
			$data2 = array(
			           'JUMLAHBARANG' => $selisih
			        );
				$this->db->where('IDBARANG', $id);
				$this->db->update('barang', $data2); 
			$cek = 0;
			foreach ($kode as $key) {
				if($kodebar == $key->IDKODE){
					$cek = 1;
				}		
			}
			if($cek>=1){
				$total = $key->JUMLAHBARANG + $_POST['jumlahbarangpindah'];
					$data5 = array(
			           'JUMLAHBARANG' => $total,
			           'TERIMA' => 0
			        );
					$this->db->where('IDKODE', $kodebar);
					$this->db->where('IDLOKASI', $idpindah);
					$this->db->update('barang', $data5);
			}
			else if($cek != 1){

				$datein = $_POST['tanggalmasuk'];
				$newdatein = date('Y-m-d', strtotime($datein));
		        $datespj = $_POST['tanggalspj'];
		        $newdatespj = date('Y-m-d', strtotime($datespj));
		        $barangharga = str_replace(' ', '', $_POST['hargabarang']);
		  		$data3 = array(
		           'IDKONDISI' => $_POST['kondisibarang'],
		           'IDSUMBER' => $_POST['namasumber'],
		           'IDLOKASI' => $_POST['lokasipindah'],
		           'IDKODE' => $_POST['idkode'],
		           'NAMABARANG' => $_POST['namabarang'],
		           'JUMLAHBARANG' => $_POST['jumlahbarangpindah'],
		           'HARGABARANG' => $barangharga,
		           'TANGGALMASUK' => $newdatein,
		           'TANGGALSPJ' => $newdatespj, 
		           'TIPEBARANG' => $_POST['tipebarang'],
		           'MERKBARANG' => $_POST['namamerk'],
		           'SPEKBARANG' => $_POST['spekbarang'],
		           'TERIMA' => 0

		        );
				$this->db->insert('barang', $data3);
			}
		}
	
		
  	}
  	
  	function barangSelect($id){

  		$this->db->select('*');
	    $this->db->from('barang');
	    $this->db->where('idbarang', $id); 
	    $query = $this->db->get();

	    if ($query->num_rows() > 0)
	    {
	     return $query->result(); // just return $query
	    }
	  	}
  	
  	function hapusBarang($id){
  		$this->db->query("DELETE FROM barang WHERE idbarang = '$id'");
  	}
  	function hapusLokasi($id){
  		$this->db->query("DELETE FROM lokasi WHERE IDLOKASI = '$id'");
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

	function lokasiSelect($id){
		$query=$this->db->query("SELECT * FROM lokasi WHERE idlokasi = '$id'");
		return $query->result();
	}
	function getpeje(){
		$query=$this->db->query("SELECT * FROM user WHERE ROLE = 1");
		return $query->result();
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

	function addLokasi()
	{	$kodeloks = $_POST['kodelokasi'];
		$lokasicode = strtoupper($kodeloks);
		$lokasiname = $_POST['namalokasi'];
		$lokasifloor = $_POST['lantai'];
		$PJ = $_POST['PJ'];
		// $NIP_PJ = $_POST['NIP_PJ'];
		$query = $this->db->query("INSERT INTO lokasi (KODELOKASI, IDUSER, NAMALOKASI, LANTAILOKASI) 
			VALUES ('$lokasicode', '$PJ', '$lokasiname', '$lokasifloor')");

	}

	function editLokasi($id){
		$data = array(
               'KODELOKASI' => $_POST['kodelokasi'],
               'IDUSER' => $_POST['PJ'],
               'NAMALOKASI' => $_POST['namalokasi'],
               'LANTAILOKASI' => $_POST['lantai']
               
            );

		$this->db->where('IDLOKASI', $id);
		$this->db->update('lokasi', $data); 
	}
	function lokasi_by_peje($user){
		
		$query = $this->db->query("SELECT lokasi.`IDLOKASI`, lokasi.`NAMALOKASI` FROM lokasi INNER JOIN user on lokasi.`IDUSER` = user.`IDUSER` WHERE user.`USERNAME`= '$user'");
		return $query->result();
	}
	function updPwd($id){
		$password = md5($_POST['pwd']);
		$data = array(
			'PASSWORD' => $password);
		
		$this->db->where('IDUSER', $id);
		$this->db->update('user', $data);
	}


	// function loadMerk(){
	// 	$query=$this->db->query("SELECT * FROM merk");
	// 	return $query->result();
	// }

	// function addMerk()
	// {
	// 	$namabrand = $_POST['namamerk'];	
	// 	$query = $this->db->query("INSERT INTO merk (NAMAMERK) VALUES ('$namabrand')");

	// }

	function getKondisi(){
		$query=$this->db->query("SELECT * FROM kondisi");
		return $query->result();
	}
	
	function addPeje(){
		$namauser = $_POST['namauser'];
		$nipauser = $_POST['nipuser'];
		$password = md5($_POST['pwd']);
		$username = $_POST['username'];

		
		$query=$this->db->query("INSERT INTO user (NAMAUSER, NIPUSER, USERNAME, PASSWORD, ROLE)
									VALUES ('$namauser','$nipuser','$username' ,'$password', 1);");
			
		return $query;
	}
	
	function loadDosen(){
		$query=$this->db->query("SELECT * FROM user WHERE ROLE = 5");
		return $query->result();
	}
	function loadKaryawan(){
		$query=$this->db->query("SELECT * FROM user WHERE ROLE = 3 OR ROLE = 1");
		return $query->result();
	}
	function loadPetugas(){
		$query=$this->db->query("SELECT * FROM user WHERE ROLE = 2");
		return $query->result();
	}
	function editPetugas($id){
		$data = array(
               'ROLE' => 1      
            );

		$this->db->where('IDUSER', $id);
		$this->db->update('user', $data);

		$iduser = $_POST['iduser'];
		$data = array(
               'ROLE' => 2      
            );

		$this->db->where('IDUSER', $iduser);
		$this->db->update('user', $data); 
	}
	function loadSekjur(){
		$query=$this->db->query("SELECT * FROM user WHERE ROLE = 4");
		return $query->result();
	}
	function editSekjur($id){
		$data = array(
               'ROLE' => 5      
            );

		$this->db->where('IDUSER', $id);
		$this->db->update('user', $data);

		$iduser = $_POST['iduser'];
		$data = array(
               'ROLE' => 4      
            );

		$this->db->where('IDUSER', $iduser);
		$this->db->update('user', $data); 
	}
  	function get_barang_by_tempat($id_tempat)
  	{
  		$retval = $this->db->query("select 
					b.NAMABARANG, 
					b.IDKODE,
					b.TIPEBARANG,
					extract(year from b.TANGGALMASUK) `TAHUN`,
					b.JUMLAHBARANG,
					b.HARGABARANG,
					b.IDKONDISI,
					b.MERKBARANG
				from barang b
				where idlokasi = $id_tempat"
			);
  		return $retval->result();
  	}

  	function get_all_ruangan()
	{
		$retval = $this->db->query("
				select * from lokasi
			");
		return $retval->result();
	}
	
	function get_ruangan($id_tempat)
	{
		$retval = $this->db->query( "SELECT lokasi.`KODELOKASI`, lokasi.`NAMALOKASI`, lokasi.`LANTAILOKASI`, user.`NAMAUSER`, user.`NIPUSER` , lokasi.`IDLOKASI`
       		FROM lokasi INNER JOIN user ON lokasi.`IDUSER` = user.`IDUSER` WHERE lokasi.`IDLOKASI` = $id_tempat");
		if($retval->num_rows == 0)
		{
			$retval = array((object)array('KODELOKASI'=>"-","NAMALOKASI"=>"-", "NAMAUSER"=>'-', "NIPUSER"=>"-"));
			return $retval;
		}
		return $retval->result();
	}
	
	public function check_username_availablity(){
        $name = trim($this->input->post('userName'));
		$username = strtolower($name);	
	
		$query = $this->db->query("SELECT * FROM user WHERE USERNAME='$username'");
		if($query->num_rows() > 0)
			return 1;
		else
			return 0;
	}
	/*function deleteSumber($id){
		$this->db->delete("sumber",array('IDSUMBER'=>$id));
	}*/
	public function check_kodelokasi(){
		$kode = $this->input->post('kodeLoks');
		$kodelokasi = strtoupper($kode);	

		$query = $this->db->query("SELECT * FROM lokasi WHERE KODELOKASI='$kodelokasi'");
		if($query->num_rows() > 0)
			return 1;
		else
			return 0;
	}
	//kodebarang
  function listkodebarang(){
		$count =1;
		$result = array();
	   	$this->db->select('*');
	   	$this->db->from('kodebarang');
	   	$this->db->order_by('NAMAKODE','ASC');
	   	$array_keys_values = $this->db->get();
		foreach ($array_keys_values->result() as $row)
			{
    			$result[++$count] = array("IDKODE" => $row->IDKODE,"KODE" => $row->KODE, "NAMAKODE" => $row->NAMAKODE);
			}
    	return $result;		
  	}
  	function allkodebarang(){
  		$query=$this->db->query("SELECT * FROM kodebarang");
		return $query->result();
  	}
  	function tambahkodebarang(){
  		$lokasiname = $_POST['namalokasi'];
		$lokasifloor = $_POST['lantai'];
		$PJ = $_POST['PJ'];
		// $NIP_PJ = $_POST['NIP_PJ'];
		$query = $this->db->query("INSERT INTO lokasi (KODELOKASI, IDUSER, NAMALOKASI, LANTAILOKASI) 
			VALUES ('$lokasicode', '$PJ', '$lokasiname', '$lokasifloor')");
  		
  	}
  	function selectkodebarang($id){
  		$query=$this->db->query("SELECT * FROM kodebarang WHERE idkode = $id");
		return $query->result();
  	}
  	function editkodebarang($id){
  		$data = array(
               'KODE' => $_POST['kodebarang'],
               'NAMAKODE' => $_POST['namakode']            
            );

		$this->db->where('IDKODE', $id);
		$this->db->update('kodebarang', $data); 
  	}
  	function hapuskodebarang($id){
  		$query=$this->db->query("DELETE FROM kodebarang WHERE idkode = $id");
  	}

  	public function checkkodebarang(){
		$kode = $this->input->post('kode');

		$query = $this->db->query("SELECT * FROM kodebarang WHERE KODE='$kode'");
		if($query->num_rows() > 0)
			return 1;
		else
			return 0;
	}
  }
  ?>
