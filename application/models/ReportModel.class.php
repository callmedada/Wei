<?php
class ReportModel extends Model{
    
       
    public $table = 'report';
    public $date;
    
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
        $sql = "select * from {$this->table} $where order by reid asc {$limit}";
        return $this->db->getAll($sql);
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
	
	public function submitReport($rid, $desc) {
		$data = array();
		$data['date'] = $this->getDate();
		$data['time'] = $this->getTime();
		$data['rid'] = $rid;
		$data['description'] = $desc;
		return $this->add($data);
	}
	
}