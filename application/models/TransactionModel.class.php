<?php
class TransactionModel extends Model{
    public $table = 'transaction';
    
    public $year = '2018';
    public $term = 'S';
    public $date;
    public $in_time;
    public function getTime() {
        
        date_default_timezone_set('America/New_York');
        $this->time = date('H:i:s');

    }
    
    public function getDate() {
     
        date_default_timezone_set('America/New_York');
        $this->date = date("Y-m-d");

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
    
     public function getTotal(){
        $sql = "select count(*) as total from {$this->table}";
        return $this->db->getOne($sql);
    }
    
}