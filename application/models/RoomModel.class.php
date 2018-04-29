<?php
class RoomModel extends Model{
    public $table = 'room';
    
    public $time = '"8:30:00"';
    public $day;

    public function getTime() {
        
        date_default_timezone_set('America/New_York');
        $this->time = date('H:i:s');

    }
    
    public function getDay() {
     
        date_default_timezone_set('America/New_York');
        $this->day = date('w');

    }
    
    public function getAvaliableRoom(){
        $this->getTime();
        $this->getDay();
        $sql = "SELECT r.rid,b.name, r.roomnumber FROM building b, room r WHERE r.rid not in ( SELECT c.rid from course c WHERE c.time >= '".$this->time."' and c.endtime <= '10:00:00' and c.days like '%".$this->day."%') and b.bid = r.bid";
        return $this->db->getAll($sql);
    }
    
     public function getTotal(){
        $sql = "select count(*) as total from {$this->table}";
        return $this->db->getOne($sql);
    }
}