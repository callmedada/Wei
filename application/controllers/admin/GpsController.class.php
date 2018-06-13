<?php
    class GpsController extends Controller{

        public function __construct(){
            parent::__construct();
            if(!isset($_SESSION['username'])){
                header('Location:'.ADMIN_SITE.'Index/login');
            }
        }

        public function indexAction(){
            $this->display("Gps_index.html");
        }


        public function isUserStayCrtBldgAction(){
          $model = new GpsModel();
          $list = $model->isUserStayCrtBldg();
          $data = json_encode(array("count"=>sizeof($list),"msg"=>"","code"=>0,"data"=>$list));
          echo $data;
        }
}


?>
