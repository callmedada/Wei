<?php
class TransactionModel extends Model{

     /*
        STATUS: 1 - Checked In
                2 - Checked Out
        */

    public $table = 'transaction';
    public $year = '2018';
    public $term = 'S';
    public $date;
    public $in_time;
    public function getTime() {


        date_default_timezone_set('America/New_York');
        $this->time = date('H:i:s');
        return $this->time;
    }

    public function getDate() {

        date_default_timezone_set('America/New_York');
        $this->date = date("Y-m-d");
        return $this->date;
    }

    public function add($data){
        if(empty($data)){
            return false;
        }else{
            return $this->insert($data);
        }
    }

    public function getInfo($where='',$limit='') {
         if($where !=''){
            $where = 'where '.$where;
        }
        if($limit != ''){
            $limit = 'limit '.$limit;
        }
        $sql = "select * from {$this->table} $where order by tid asc {$limit}";
        return $this->db->getAll($sql);
    }
    
    public function getTid($rid) {
        $sql = "select tid from {$this->table} where rid = {$rid} and status = '1'";
        return $this->db->getOne($sql);
    }

     public function getTotal(){
        $sql = "select count(*) as total from {$this->table}";
        return $this->db->getOne($sql);
    }

    public function delById($id){
        $id = intval($id);
        if($id<=0){
            return false;
        }else{
            return $this->delete($id);
        }
    }

    public function getById($id){
        $id = intval($id);
        if($id<=0){
            return false;
        }else{
            return $this->selectByPk($id);
        }
    }

     public function edit($data){
        $id = intval($data['tid']);
        if($id<=0){
            return false;
        }else{
            return $this->update($data);
        }
    }

       public function checkIn($rid) {
           $userModel = new UserModel();
           $username = $_SESSION['username'];
            $data = array();
            $data['uid'] = $userModel->getUserId($username);
            $data['rid'] = $rid;
            $data['year'] = $this->year;
            $data['term'] = $this->term;
            $data['in_time'] = $_SESSION['checkin_time'];
            $data['status'] = 1;
            $data['date'] = $this->getDate();
           return $this->insert($data);
        }
    
    public function checkOut($rid) {
         $userModel = new UserModel();
         $username = $_SESSION['username'];
		 
         $data = array();
         $data['tid'] = $this->getTid($rid);
         $data['uid'] = $userModel->getUserId($username);
         $data['out_time'] = $this->getTime();
         $data['status'] = 2;
         return $this->update($data);

    }
	
	public function getStatus($username) {
		$userModel = new UserModel();
		$uid = $userModel->getUserId($username);
		$sql = "select status from transaction where uid={$uid} and out_time = '0:0:0'";
		if ($this->db->getOne($sql) == false) {
			return '2';
		} else {
			return '1';
		}
	}
	
	public function getCheckedRoom($username) {
		$userModel = new UserModel();
		$uid = $userModel->getUserId($username);
		$sql = "select rid from transaction where uid={$uid} and status = 1";
		return $this->db->getOne($sql);
	}
    
}