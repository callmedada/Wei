<?php 
    class RoomController extends Controller{
        
        public function __construct(){
            parent::__construct();
            if(!isset($_SESSION['username'])){
                header('Location:'.ADMIN_SITE.'Index/login');
            }
        }

        public function indexAction(){
            $this->display("room_index.html");
        }
        
        public function getAvaliableRoomAction(){
            $curPage = isset($_GET['page'])?$_GET['page']:1;
            $limit = isset($_GET['limit'])?$_GET['limit']:10;
            $start = ($curPage-1)*$limit;

            $model = new RoomModel();
            $list = $model->getAvaliableRoom();
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

    }
?>