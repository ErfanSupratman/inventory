<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

/*Konstruktor */
class M_operator extends CI_Model
{
  	public function __construct()
  	{
    	parent::__construct();
    	$this->load->library(array('pagination'));
    	$this->load->helper('date');
  	}


  	public function updatePassword(){
  		$username = $this->session->userdata('username');
  		$newpassword = md5($_POST['formpassword']);
  		$query=$this->db->query("UPDATE table_user SET userPassword = '$newpassword' WHERE userId = '$username'");
		return $query;
	  	}

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

	public function getClient($id){
		$this->db->where('fkSiteId2', $id);
		$query = $this->db->get('table_clientsite');
		return $query->result_array();
	}

	public function insertcategory(){
		$category = $_POST['category'];
		$query=$this->db->query("INSERT INTO table_category (categoryName) VALUES ('$category')");

		return $query;
	}

	public function deleteCategory($id){
		$this->db->delete("table_case",array('fkCategoryId'=>$id));
		$this->db->delete("table_category",array('categoryId'=>$id));

	}

	public function insertcase(){
		$datestring = "%m/%d/%Y";
		$timestring = "%h:%i:%s %A";
		$day = mdate($datestring);
		$now = mdate($timestring);
		$username=$this->session->userdata('username');
		$problem = $_POST['problem'];
		$client = $_POST['clientid'];
		$category = $_POST['categoryid'];


		$query=$this->db->query("INSERT INTO Table_Case (caseDateOpened, caseTimeOpened, caseDetail,caseUpdatedBy,fkSiteId,fkCategoryId,fkCaseStatusId,fkUserId) VALUES ('$day','$now','$problem','$username','$client','$category','1','$username')");

		return $query;
	}

	public function getCategory($num, $offset){
		$this->db->order_by('categoryName', 'ASC');
		$data = $this->db->get('table_category', $num, $offset);
		return $data->result();

	}

	public function setCategory(){
		$idcat = $_POST['nilai'];
		$newcat = $_POST['categ'];

		$query=$this->db->query("UPDATE table_category SET categoryName = '$newcat' WHERE categoryId = '$idcat'");
		return $query;
	}

	public function getProblem(){
		//$this->db->set('@num_row',0);
		$query=$this->db->query("SELECT table_case.caseId, table_case.caseDateOpened , table_case.caseTimeOpened, table_case.caseAnalyst, table_casestatus.caseStatusCategory, table_user.userId, table_case.caseDetail, table_category.categoryName, table_site.siteName, table_clientsite.clientSiteName, table_case.caseResolution,table_case.caseDateClosed, table_case.caseTimeClosed, table_case.caseUpdatedBy FROM table_case INNER JOIN table_casestatus ON table_casestatus.caseStatusId = table_case.fkCaseStatusId INNER JOIN table_user ON table_user.userId = table_case.fkUserId INNER JOIN table_category ON table_category.categoryId = table_case.fkCategoryId INNER JOIN table_clientsite ON table_clientsite.clientSiteId = table_case.fkSiteId INNER JOIN table_site ON table_site.siteId = table_clientsite.fkSiteId2 WHERE table_case.fkCaseStatusId = 1 OR table_case.fkCaseStatusId = 2 GROUP BY table_case.caseId");
		return $query->result();
	}

	public function getProblemProcessed(){
		//$this->db->set('@num_row',0);
		$query=$this->db->query("SELECT table_case.caseId, table_case.caseDateOpened , table_case.caseTimeOpened, table_case.caseAnalyst, table_casestatus.caseStatusCategory, table_user.userId, table_case.caseDetail, table_category.categoryName, table_site.siteName, table_clientsite.clientSiteName, table_case.caseResolution,table_case.caseDateClosed, table_case.caseTimeClosed, table_case.caseUpdatedBy FROM table_case INNER JOIN table_casestatus ON table_casestatus.caseStatusId = table_case.fkCaseStatusId INNER JOIN table_user ON table_user.userId = table_case.fkUserId INNER JOIN table_category ON table_category.categoryId = table_case.fkCategoryId INNER JOIN table_clientsite ON table_clientsite.clientSiteId = table_case.fkSiteId INNER JOIN table_site ON table_site.siteId = table_clientsite.fkSiteId2 WHERE table_case.fkCaseStatusId = 3 GROUP BY table_case.caseId");
		return $query->result();
	}

	public function getProblemFixed(){
		//$this->db->set('@num_row',0);
		$query=$this->db->query("SELECT table_case.caseId, table_case.caseDateOpened , table_case.caseTimeOpened, table_case.caseAnalyst, table_casestatus.caseStatusCategory, table_user.userId, table_case.caseDetail, table_category.categoryName, table_site.siteName, table_clientsite.clientSiteName, table_case.caseResolution,table_case.caseDateClosed, table_case.caseTimeClosed, table_case.caseUpdatedBy FROM table_case INNER JOIN table_casestatus ON table_casestatus.caseStatusId = table_case.fkCaseStatusId INNER JOIN table_user ON table_user.userId = table_case.fkUserId INNER JOIN table_category ON table_category.categoryId = table_case.fkCategoryId INNER JOIN table_clientsite ON table_clientsite.clientSiteId = table_case.fkSiteId INNER JOIN table_site ON table_site.siteId = table_clientsite.fkSiteId2 WHERE table_case.fkCaseStatusId = 4 GROUP BY table_case.caseId");
		return $query->result();
	}


	public function setProcess(){
		$dates = "%m/%d/%Y";
		$times = "%h:%i:%s %A";
		$date = mdate($dates);
		$time = mdate($times);

		$username = $this->session->userdata('username');
		$analyst = $_POST['analis'];
		$resolution = $_POST['resolusi'];
		$caseid = $_POST['hasil'];
		$query=$this->db->query("UPDATE table_case SET caseAnalyst = '$analyst', caseResolution = '$resolution', caseDateClosed = '$date' ,caseTimeClosed = '$time', caseUpdatedBy = '$username', fkCaseStatusId = '3' WHERE caseId = '$caseid'");
		return $query;
		

	}

	public function setQueued($id){
		$username = $this->session->userdata('username');
		$data = array(
               'fkCaseStatusId' => '2',
               'caseUpdatedBy' => $username,
            );

		$this->db->where('caseId', $id);
		$this->db->update('table_case', $data); 

	}


	public function setClosed($id){
		$dateclosed = "%m/%d/%Y";
		$timeclosed = "%h:%i:%s %A";
		$datec = mdate($dateclosed);
		$timec = mdate($timeclosed);
		$username = $this->session->userdata('username');

		$data = array(
			'fkCaseStatusId' => '4',
			'caseUpdatedBy' => $username,
			'caseDateClosed' => $datec,
			'caseTimeClosed' => $timec);

		$this->db->where('caseId', $id);
		$this->db->update('table_case',$data);

	}

	public function deleteCase($id){
		$this->db->delete("table_case",array('caseId'=>$id,'fkCaseStatusId'=>'1'));
		//$this->db->delete("table_category",array('categoryId'=>$id));

	}

	public function deleteCaseProcess($id){
		$this->db->delete("table_case",array('caseId'=>$id,'fkCaseStatusId'=>'3'));
		//$this->db->delete("table_category",array('categoryId'=>$id));

	}

	public function deleteCaseClosed($id){
		$this->db->delete("table_case",array('caseId'=>$id,'fkCaseStatusId'=>'4'));
		
	}
  } ?>