<?php
class GpsModel extends Model{
    public $table = 'room';

    public $time = '"8:30:00"';
    public $day;
    public $jsonArray = array();
    public function getTime() {

        date_default_timezone_set('America/New_York');
        $this->time = date('H:i:s');
        return $this->time;
    }

    public function getDay() {

        date_default_timezone_set('America/New_York');
        $this->day = date('w');

    }

     public function getOccupiedRoom(){
      $this->getTime();
      $bid = $_GET['bid'];
      // $bid = "1";
      $sql = "SELECT r.rid, b.name as count,r.roomnumber as roomnumber
      FROM building b, room r
      WHERE b.bid = r.bid and r.rid
      in (SELECT t.rid from transaction t, room r
        WHERE t.in_time <= '".$this->time."' and t.out_time >= '".$this->time."') and b.bid = ".$bid;
        $sqlArray = $this->db->getAll($sql);
        // for($i = 0; $i < sizeof($sqlArray); $i++) {
        //   $sqlArray[$i]=$sqlArray;
        // }
        // var_dump($sqlArray);
        return $sqlArray;
    }

    public function getAllRoom(){
        return  $this->getAvailableRoom() + $this->getOccupiedRoom();
        // return $this->getOccupiedRoom();
    }



    public function getAvailableRoomNumber(){
        $this->getDistance();
        $this->getTime();
        $this->getDay();
        $_SESSION['checked'] = false;
        $sql = "SELECT r.rid,b.name, r.roomnumber, COUNT(b.bid) as count, b.bid FROM building b, room r WHERE r.rid not in ( SELECT c.rid from course c WHERE c.time >= '".$this->time."' and c.endtime <= '10:00:00' and c.days like '%".$this->day."%') and b.bid = r.bid GROUP BY b.bid";
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
            $x = $_GET["x"];
            $y = $_GET["y"];

            $json = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins='.$y.','.$x.'&destinations=place_id:ChIJyXUQRS4uK4gRz1bAeysBoP4|place_id:ChIJix1g5i8uK4gRKCn_A0nn5uM|place_id:ChIJ-wcMOC4uK4gRogiJzNyMsHY|place_id:ChIJ78_dZi4uK4gRpFNhe3KkCmo|place_id:ChIJHRCqJS4uK4gR9S-sy8rCfKA|place_id:ChIJvZD2eC4uK4gRb7Wl6UBVO5g|place_id:ChIJF3N0YiUuK4gRkYyKuWrUSmI|place_id:ChIJddO1UCQuK4gRsP5n9vkXX2I&mode=walking&key=AIzaSyB6wKPtbXhLjl4rrSo57PTxTqvCiYIyZH4');
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

    public function isUserStayCrtBldg(){
      $x = $_GET["x"];
      $y = $_GET["y"];
      $json = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$x.','.$y.'&key=AIzaSyB6wKPtbXhLjl4rrSo57PTxTqvCiYIyZH4');
      $obj = json_decode($json);
      $objArray = array();
      if ($obj->results[0]->types[0] == "premise"){
        $objArray[0]["isInBldg"] = "1";
      }
      else {
        $objArray[0]["isInBldg"] = "0";
      }
      return $objArray;
      // $objArray[1] = $obj->rows[0]->elements;

    }

    public function checkIn($rid) {
        $transactionModel = new TransactionModel();
        $_SESSION['rid'] = $rid;
        $_SESSION['checked'] = true;
        $_SESSION['checkin_time'] = $this->getTime();
        $transactionModel->checkIn($rid);

    }

    public function checkOut() {

            $transactionModel = new TransactionModel();
            $transactionModel->checkOut();

    }

}