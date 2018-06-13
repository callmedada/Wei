<?php 
    class ReportController extends Controller{
        
        public function __construct(){
            parent::__construct();
            if(!isset($_SESSION['username'])){
                header('Location:'.ADMIN_SITE.'Index/login');
            }
        }

        public function indexAction(){
            $this->display("report_index.html");
        }

        public function getInfoAction(){
            $curPage = isset($_GET['page'])?$_GET['page']:1;
            $limit = isset($_GET['limit'])?$_GET['limit']:10;
            $start = ($curPage-1)*$limit;

            $model = new ReportModel();
            $list = $model->getInfo("","$start,$limit");
            $total = $model->getTotal();

           
            $data = json_encode(array("count"=>$total,"msg"=>"","code"=>0,"data"=>$list));
            
            echo $data;
        }

      

        public function editAction(){
            $model = new TransactionModel();
            if(!empty($_POST)){
                $data = array();
                $data['tid'] = $_POST['tid'];
                $data['uid'] = $_POST['uid'];
                $data['year'] = $_POST['year'];
                $data['term'] = $_POST['term'];
                $data['date'] = $_POST['date'];
                $data['in_time'] = $_POST['intime'];
                $data['out_time'] = $_POST['outtime'];
                $data['rid'] = $_POST['rid'];
                $data['status'] = $_POST['status'];

                
                $list = $model->getInfo("","");//获取transaction信息
                $man = $model->getById($_GET['tid']);//获取当前transaction信息
               
                $res = $model->edit($data);
                if($res===true){
                    echo json_encode(array('msg'=>4));
                }else if($res>0){
                    echo json_encode(array('msg'=>1));
                }
                else
                {
                    echo json_encode(array('msg'=>2));
                }
            }else{
                $id = $_GET['tid'];
                $list = $model->getById($id);
                $this->assign("list",$list);
                $this->display("report_form.html");
            }
        }

        public function delAction(){
            $model = new ReportModel();
            if(!empty($_POST)){
                $id = $_POST['reid'];    
                $del = $model->delById($id);
                    if($del){
                        echo json_encode(array('msg'=>1));
                    }else{
                        echo json_encode(array('msg'=>2));
                    }
                } 
        }
        
        /**
         * 批量删除
         */
        public function deleteAction(){
            $model = new ReportModel();
           
            $ids = $_POST['data'];
            //var_dump($ids);
            $n = 0;
            foreach ($ids as $id) {
                
                   $del = $model->delById($id); 
                      
            }
            if ($n > 0) {
                echo json_encode(array('msg'=>2));
            }else{
                echo json_encode(array('msg'=>1));
            }
        }
        
    
    }

?>