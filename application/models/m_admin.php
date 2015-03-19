<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

/*Konstruktor */
class M_admin extends CI_Model
{
  	public function __construct()
  	{
    	parent::__construct();
    	$this->load->database();
  	}


  	/*Query Penambahan Site*/
	public function addSite()
	{
		$sitename = $_POST['sitename'];
		$query = $this->db->query("INSERT INTO Table_Site (siteName) VALUES ('$sitename')");
		return $query;
	}

	/*Query Mengambil Site List*/
	public function getSiteList(){

		$count = 0;
		$result = array();
       	$this->db->select('*');
       	$this->db->from('Table_Site');
       	$this->db->order_by('siteName','ASC');
       	$array_keys_values = $this->db->get();
	   	$result[$count] = array("siteId" => 0, "siteName" => ' -Select Site-');
		foreach ($array_keys_values->result() as $row)
    			{
        			$result[++$count] = array("siteId" => $row->siteId, "siteName" => $row->siteName);
    			}
        return $result;
	}

	/*Query Penambahan Client*/
	public function addClient()
	{
		$clientname = $_POST['clientname'];
		$siteid = $_POST['siteid'];
		$query = $this->db->query("INSERT INTO Table_ClientSite (clientSiteName, fkSiteId2) VALUES ('$clientname','$siteid')");
		return $query;
	}

	/*Query menampilkan isi database list*/
	public function tableSite(){

		$query=$this->db->query("SELECT * FROM Table_Site ORDER BY siteName ASC");
        return $query->result();

	}


	//Problem Menampilkan
	public function getTotalClientOfList(){
		$query=$this->db->query("SELECT table_site.siteName,table_site.siteId, COUNT(table_clientsite.fkSiteId2) AS TotalClientSite
		FROM table_clientsite LEFT JOIN table_site ON table_clientsite.fkSiteId2=table_site.siteId GROUP BY siteName");
		return $query->result();
	}

	public function getClientList()
	{
		$query=$this->db->query("SELECT table_clientsite.clientSiteName, table_site.siteName, table_clientsite.clientSiteId FROM table_site INNER JOIN table_clientsite ON table_clientsite.fkSiteId2=table_site.siteId");
		return $query->result();
	}

	public function getPriv()
	{
    	$query=$this->db->query("SELECT table_privilege.privilegeStatus, COUNT(table_user.fkPrivilegeId) AS TotalPrivilegeUser
								FROM table_user LEFT JOIN table_privilege 
								ON table_user.fkPrivilegeId=table_privilege.privilegeId GROUP BY privilegeStatus;");
    	return $query->result();
  	}

	public function addUser()
	{
		$userid = $_POST['userId'];
		$userpassword = md5(12345);
		$usernama = $_POST['completename'];
		$useremail = $_POST['email'];
		$usertelpon = $_POST['phone'];
		$usernodesktop = $_POST['desktop'];
		$usertypedesktop = $_POST['type'];
		$usercompany = $_POST['company'];
		$privilegeid = $_POST['level'];

		$query=$this->db->query("INSERT INTO table_user (userId, userPassword, userName, userEmail, userTelp, userNoDesktop, userTypeDesktop, userCompany, fkPrivilegeId, userStatus)
								VALUES ('$userid','$userpassword','$usernama','$useremail','$usertelpon','$usernodesktop','$usertypedesktop','$usercompany','$privilegeid','1');");
		
		return $query;
	}

	public function listUser()
	{
		$query=$this->db->query("SELECT table_user.userId, table_user.userName, table_user.userEmail, table_user.userTelp, table_user.userNoDesktop, table_user.userTypeDesktop, table_user.userCompany, table_privilege.privilegeStatus FROM table_user INNER JOIN table_privilege ON table_user.fkPrivilegeId=table_privilege.privilegeID");
		return $query->result();
	}

	public function check_username_availablity(){
        $username = trim($this->input->post('userId'));
		$username = strtolower($username);	
	
		$query = $this->db->query("SELECT * FROM table_user WHERE userId='$username'");
		if($query->num_rows() > 0)
			return false;
		else
			return true;}

	public function insertcategory(){
		$category = $_POST['category'];
		$query=$this->db->query("INSERT INTO table_category (categoryName) VALUES ('$category')");

		return $query;
	}

	public function getReport(){
		//$site = trim($this->input->post('siteid'));
		//$dateone = trim($this->input->post('start'));
		//$datetwo = trim($this->input->post('endingdate'));
		//$site = $_POST['siteid']
		//$dateone = $_POST['start'];
		//$datetwo = $_POST['endingdate'];

		$query=$this->db->query("SELECT table_case.caseDateOpened, table_case.caseTimeOpened , 
			table_case.caseAnalyst , table_casestatus.caseStatusCategory , 
			table_user.userId , table_case.caseDetail , table_category.categoryName , table_site.siteName, 
			table_clientsite.clientSiteName , table_case.caseResolution , table_case.caseTimeClosed , table_case.caseDateClosed,
			table_case.caseUpdatedBy FROM table_case INNER JOIN table_casestatus ON table_casestatus.caseStatusId = 
			table_case.fkCaseStatusId INNER JOIN table_user ON table_user.userId = table_case.fkUserId
			INNER JOIN table_category ON table_category.categoryId = table_case.fkCategoryId INNER JOIN table_clientsite ON table_clientsite.clientSiteId = 
			table_case.fkSiteId INNER JOIN table_site ON table_site.siteId = table_clientsite.fkSiteId2 WHERE table_case.fkCaseStatusId = 4 GROUP BY table_case.caseId");
		return $query->result_array();

	
	}

public function deleteSite($id){
		$this->db->delete("table_clientsite",array('fkSiteId2'=>$id));
		$this->db->delete("table_site",array('siteId'=>$id));
	}

public function deleteClient($id){
		$this->db->delete("table_clientsite",array('clientSiteId'=>$id));
	}

public function deleteUser($id){
		$this->db->delete("table_user",array('userId'=>$id));
	}

public function updatePassword(){
  		$username = $this->session->userdata('username');
  		$newpassword = md5($_POST['formpassword']);
  		$query=$this->db->query("UPDATE table_user SET userPassword = '$newpassword' WHERE userId = '$username'");
		return $query;
	  	}

public function setSitename(){
		$idcat = $_POST['nilai'];
		$newcat = $_POST['categ'];

		$query=$this->db->query("UPDATE table_site SET siteName = '$newcat' WHERE siteId = '$idcat'");
		return $query;
	}


public function setClientname(){
		$idcat = $_POST['nilai'];
		$newcat = $_POST['categ'];

		$query=$this->db->query("UPDATE table_clientsite SET clientSiteName = '$newcat' WHERE clientSiteId = '$idcat'");
		return $query;
	}

public function setUserData(){
		$idcat = $_POST['nilai'];
		$usernama = $_POST['completename'];
		$useremail = $_POST['email'];
		$usertelpon = $_POST['phone'];
		$usernodesktop = $_POST['desktop'];
		$usertypedesktop = $_POST['type'];
		$usercompany = $_POST['company'];
		$privilegeid = $_POST['level'];


		$query=$this->db->query("UPDATE table_user SET userName = '$usernama', userEmail='$useremail', userTelp='$usertelpon', userNoDesktop='$usernodesktop', userTypeDesktop='$usertypedesktop', userCompany='$usercompany', fkPrivilegeId='$privilegeid' WHERE userId = '$idcat'");
		return $query;
	}

public function submitSetting(){
	$title = $_POST['title'];
	$slogan = $_POST['slogan'];
	$contact = $_POST['contact'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];

	$query=$this->db->query("UPDATE table_setting SET settingTitle = '$title', settingSlogan = '$slogan', settingContact ='$contact', settingAddress1='$address1', settingAddress2='$address2'");
	return $query;
}



}?>