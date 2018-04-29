<?php
class RoomModel extends Model{
    public $table = 'room';
    
    public $time = '"8:30:00"';
    public $day;
    public $jsonArray = array();
    public function getTime() {
        
        date_default_timezone_set('America/New_York');
        $this->time = date('H:i:s');

    }
    
    public function getDay() {
     
        date_default_timezone_set('America/New_York');
        $this->day = date('w');

    }
    
    public function getAvaliableRoom(){
        $this->getDistance();
        $this->getTime();
        $this->getDay();
        $sql = "SELECT r.rid,b.name, r.roomnumber FROM building b, room r WHERE r.rid not in ( SELECT c.rid from course c WHERE c.time >= '".$this->time."' and c.endtime <= '10:00:00' and c.days like '%".$this->day."%') and b.bid = r.bid";
        $sqlArray = $this->db->getAll($sql);
        $keyArray = array_keys($this->jsonArray);
        //$sqlArray[0]["distance"] = "100";
//        var_dump($sqlArray[0]["name"]);
//        var_dump($keyArray[0]);
        
        
        //添加distance到sql输出结果中
        for($i = 0; $i < sizeof($sqlArray); $i++) {
            for($j = 0; $j < sizeof($this->jsonArray); $j++) {
               if($sqlArray[$i]["name"] == $keyArray[$j]) {
                   $sqlArray[$i]["distance"] = $this->jsonArray[$keyArray[$j]]; 
               }

            }
        }
            
          //var_dump($sqlArray);  
        return $sqlArray;
    }
    
     public function getTotal(){
        $sql = "select count(*) as total from {$this->table}";
         
        return $this->db->getOne($sql);
    }
    
     public function getDistance() {
            $json = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=43.7703361,-79.4151365&destinations=place_id:ChIJyXUQRS4uK4gRz1bAeysBoP4|place_id:ChIJix1g5i8uK4gRKCn_A0nn5uM|place_id:ChIJ-wcMOC4uK4gRogiJzNyMsHY|place_id:ChIJ78_dZi4uK4gRpFNhe3KkCmo|place_id:ChIJHRCqJS4uK4gR9S-sy8rCfKA|place_id:ChIJvZD2eC4uK4gRb7Wl6UBVO5g|place_id:ChIJF3N0YiUuK4gRkYyKuWrUSmI|place_id:ChIJddO1UCQuK4gRsP5n9vkXX2I&mode=walking&key=AIzaSyB6wKPtbXhLjl4rrSo57PTxTqvCiYIyZH4');
            $obj = json_decode($json);
            $objArray = array();
            $objArray[0] = $obj->destination_addresses;
            $objArray[1] = $obj->rows[0]->elements;
            //var_dump($objArray[1][0]->distance->value);
           
        
            for ($i = 0; $i < sizeof($objArray[0]); $i++) {
               $this->jsonArray[ explode(',', $objArray[0][$i])[0] ] = $objArray[1][$i]->distance->value;
            }
            asort($this->jsonArray, SORT_NUMERIC);
           
            return $this->jsonArray;
        }
}