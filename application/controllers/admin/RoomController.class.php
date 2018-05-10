<?php 
    class RoomController extends Controller{
        public $bid;
        public function __construct(){
            parent::__construct();
            if(!isset($_SESSION['username'])){
                header('Location:'.ADMIN_SITE.'Index/login');
            }
        }

        public function indexAction(){
            $this->display("room_index.html");
        }
        
        public function getOccupiedRoomAction(){
            $model = new RoomModel();
            $list = $model->getOccupiedRoom();
            $data = json_encode(array("count"=>sizeof($list),"msg"=>"","code"=>0,"data"=>$list));
            echo $data;
        }
        public function getAllRoomAction(){
            $model = new RoomModel();
            $list = $model->getAllRoom();
            $data = json_encode(array("count"=>sizeof($list),"msg"=>"","code"=>0,"data"=>$list));
            echo $data;
        }
        
        public function getAvailableRoomNumberAction(){
            $curPage = isset($_GET['page'])?$_GET['page']:1;
            $limit = isset($_GET['limit'])?$_GET['limit']:10;
            $start = ($curPage-1)*$limit;

            $model = new RoomModel();
            $list = $model->getAvailableRoomNumber();
            $total = $model->getTotal();
            asort($list);
            $data = json_encode(array("count"=>$total,"msg"=>"","code"=>0,"data"=>$list));
            //var_dump($list);
            echo $data;
        }
        
       public function getDistanceAction() {
            $model = new RoomModel();
            $list = $model->getDistance();
           
            $data = json_encode(array("count"=>sizeof($list),"msg"=>"","code"=>0,"data"=>$list));
            echo $data;
       }
        
        public function getAvailableRoomAction(){
            $model = new RoomModel();
            $list = $model->getAvailableRoom();
            $data = json_encode(array("count"=>sizeof($list),"msg"=>"","code"=>1,"data"=>$list));
            echo $data;
            }
        
        public function showAvailableRoomAction() {
            $this->bid = $_GET['bid'];
            $this->display("room_avaliable.html", $this->bid);
        }
        
        public function checkInAction() {
            $model = new RoomModel();
            $rid = $_GET['rid'];
            $model->checkIn($rid);
             echo json_encode(array('msg'=>1));
        }
        
        public function checkOutAction() {
            if($_SESSION["checked"] == true && $_SESSION['rid'] == $_GET['rid']) {
                $model = new RoomModel();
                $model->checkOut();
                $_SESSION['checked'] = false;
                echo json_encode(array('msg'=>1));
            } else {
                echo json_encode(array('msg'=>2));
            }
        }
 }

    
?>