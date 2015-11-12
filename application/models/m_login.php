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

  function ambilPengguna($username, $password)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('USERNAME', $username);
    $this->db->where('PASSWORD', $password);
    $this->db->where('ROLE', 0);
    $query = $this->db->get();
    
    return $query->result();
  }
  function ambilPeje($username, $password)
  {

    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('USERNAME', $username);
    $this->db->where('PASSWORD', $password);
    $this->db->where('ROLE', 1);
    $query = $this->db->get();
    
    return $query->result();
  }
  
}  

?>