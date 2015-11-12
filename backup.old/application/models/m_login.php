<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class M_login extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  
  /*public function getPriv(){
    $query=$this->db->query("SELECT * FROM Table_Privilege");
    return $query->result();

  }*/

  function getLogin(){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('NAMAUSER', $username);

    return $query->result();

  }

  function ambilPengguna($username, $password)
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('NAMAUSER', $username);
    $this->db->where('PASSUSER', $password);
    $query = $this->db->get();
    
    return $query->num_rows();
  }
  
  function dataPengguna($username)
  {
   $this->db->select('NAMAUSER');
   $this->db->where('NAMAUSER', $username);
   $query = $this->db->get('users');
   
   return $query->row();
  }
  
}  

?>