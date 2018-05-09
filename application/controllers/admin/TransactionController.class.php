<?php 
    class TransactionController extends Controller{
        
        public function __construct(){
            parent::__construct();
            if(!isset($_SESSION['username'])){
                header('Location:'.ADMIN_SITE.'Index/login');
            }
        }

        public function indexAction(){
            $this->display("transaction_index.html");
        }

        public function getInfoAction(){
            $curPage = isset($_GET['page'])?$_GET['page']:1;
            $limit = isset($_GET['limit'])?$_GET['limit']:10;
            $start = ($curPage-1)*$limit;

            $model = new TransactionModel();
            $list = $model->getInfo("","$start,$limit");
            $total = $model->getTotal();

           
            $data = json_encode(array("count"=>$total,"msg"=>"","code"=>0,"data"=>$list));
            
            echo $data;
        }

        public function addAction(){
            $model = new TransactionModel();
            if(!empty($_POST)){
                $data = array();
                $data['uid'] = $_POST['uid'];
                $data['year'] = $_POST['year'];
                $data['term'] = $_POST['term'];
                $data['date'] = $_POST['date'];
                $data['in_time'] = $_POST['intime'];
                $data['out_time'] = $_POST['outtime'];
                $data['rid'] = $_POST['rid'];
                $data['status'] = $_POST['status'];

                
                
                $list = $model->getInfo("","");//获取所有信息
               
                $res = $model->add($data);
                if($res){
                    echo json_encode(array('msg'=>1));
                }else{
                    echo json_encode(array('msg'=>2));
                }
            }else{
                $transaction = new TransactionModel();
              
                $this->display("transaction_form.html");
            }
        }

        public function editAction(){
            $model = new UserModel();
            if(!empty($_POST)){
                $data = array();
                $data['id'] = $_POST['id'];
                // $data['name'] = $_POST['name'];
                $data['password'] = $_POST['password'];
                $data['alias'] = $_POST['alias'];
                $data['major'] = $_POST['major'];
                $data['avatar'] = $_POST['avatar'];
                $data['role_id'] = $_POST['role_id'];
                // $data['email'] = $_POST['email'];
                // $data['phone'] = $_POST['phone'];
                
                $list = $model->getInfo("","");//获取所有账号信息
                $man = $model->getById($_POST['id']);//获取当前账号信息
                foreach ($list as $v) {
                    //传过来的账号名不等于原账号名，且存在于已有账号名当中
                    if ($v['name'] == $_POST['name'] && $man['name'] != $_POST['name']) {
                        echo json_encode(array('msg'=>3));die;
                    }
                }
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
                $id = $_GET['id'];
                $list = $model->getById($id);
                $this->assign("list",$list);

                $roleModel = new RoleModel();
                $role = $roleModel->getInfo("`isadmin` = 0","");
                $this->assign("role",$role);

                $this->display("user_form.html");
            }
        }

        public function delAction(){
            $model = new UserModel();
            if(!empty($_POST)){
                $id = $_POST['id'];
                if ($_POST['name'] == $_SESSION['username']) {
                    echo json_encode(array('msg'=>3));
                }else{
                    $del = $model->delById($id);
                    if($del){
                        echo json_encode(array('msg'=>1));
                    }else{
                        echo json_encode(array('msg'=>2));
                    }
                } 
            }
        }
        /**
         * 批量删除
         */
        public function deleteAction(){
            $model = new UserModel();
            $ids = $_POST['data'];
            $n = 0;
            foreach ($ids as $id) {
                $info = $model->getById($id);
                if ($info['name'] == $_SESSION['username']) {
                    $n++;
                }else{
                   $del = $model->delById($id); 
               }           
            }
            if ($n > 0) {
                echo json_encode(array('msg'=>2));
            }else{
                echo json_encode(array('msg'=>1));
            }
        }
    }

?>