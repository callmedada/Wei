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
    
     public function getDistance() {
            $json = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=place_id:ChIJix1g5i8uK4gRKCn_A0nn5uM&destinations=place_id:ChIJyXUQRS4uK4gRz1bAeysBoP4|place_id:ChIJix1g5i8uK4gRKCn_A0nn5uM|place_id:ChIJ-wcMOC4uK4gRogiJzNyMsHY|place_id:ChIJ78_dZi4uK4gRpFNhe3KkCmo|place_id:ChIJvZD2eC4uK4gRb7Wl6UBVO5g|place_id:ChIJF3N0YiUuK4gRkYyKuWrUSmI|place_id:ChIJddO1UCQuK4gRsP5n9vkXX2I&mode=walking&key=AIzaSyB6wKPtbXhLjl4rrSo57PTxTqvCiYIyZH4');
            $obj = json_decode($json);
         var_dump($obj->rows[0]->elements[0]);
            return $obj->rows;
        }
}