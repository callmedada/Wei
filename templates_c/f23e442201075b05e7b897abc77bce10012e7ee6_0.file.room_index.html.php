<?php
/* Smarty version 3.1.30, created on 2018-05-01 04:17:09
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/room_index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ae779c5ac2361_87720397',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f23e442201075b05e7b897abc77bce10012e7ee6' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/room_index.html',
      1 => 1525119427,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ae779c5ac2361_87720397 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="<?php echo @constant('JS');?>
layui/css/layui.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS');?>
forbidRight.js"><?php echo '</script'; ?>
>
</head>
<body>
    <div class="layui-btn-group demoTable">
<!--
    	<button class="layui-btn" data-type="add"><i class="layui-icon">&#xe654;</i></button>
        <button class="layui-btn" data-type="delCheckData"><i class="layui-icon">&#xe640;</i></button>
-->
        <button class="layui-btn" data-type="refresh"><i class="layui-icon">&#x1002;</i></button>
    </div>
    
    <table class="layui-hide" id="table_type" lay-filter="role"></table>
    <?php echo '<script'; ?>
 type="text/html" id="barDemo">
        <!-- <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a> -->
        <a class="layui-btn layui-btn-xs" lay-event="edit">显示可用房间</a>
       
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS');?>
layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        var x, y, counter = 0;
        var timer;
function getLocation() {
     console.log(x);
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
        
        if(x === undefined) {
          timer = setTimeout(getLocation, 100);
            counter++;
        if(counter == 150) {
            document.getElementById('gps').innerHTML = "GPS获取错误，请重试";
            return;
        }
      }
    
    
        
    if(x != undefined) {
        document.getElementById('gps').innerHTML = "";
        document.getElementById('loader').style.display = 'none';
        clearTimeout(timer);
        //real action
    layui.use(['table','form'], function() {
        var table = layui.table,
        	form = layui.form;
        
        
       
       
        //方法级渲染
        table.render({
            elem: '#table_type',
            url: '<?php echo @constant('ADMIN_SITE');?>
Room/getAvaliableRoomNumber?'+'x=' + x + "&y=" + y ,
            cols: [[
                
                { field: 'name', title: 'Building', sort: true, fixed: true, align: 'center' },
                { field: 'count', title: 'Number of Avaliable Room', sort: true, align: 'center' },
                { field: 'distance', title: 'Distance', sort: true, align: 'center' },
                { fixed: 'right', title: '操作', align: 'center', toolbar: '#barDemo' }
              
            ]],
            id: 'idTest',
            page: true,
        });
    

        //监听表格复选框选择
		table.on('checkbox(demo)', function(obj){
			console.log(obj);
		});
        
        table.on('tool(role)', function(obj) {
            console.log(obj.data.bid)
            var data = obj.data;
            if (obj.event === 'edit') {
                layer.open({
                    type: 2,
                    title: "显示可用房间",
                    area: ['700px', '450px'],
                    fixed: false, //不固定
                    closeBtn: 1,//关闭窗口按钮
                    maxmin: true,//窗口最大最小化按钮
                    content: 'showAvaliableRoom?bid='+obj.data.bid
                });
            }
        });
               
        
        var $ = layui.$, active = {
            refresh: function() {
                window.location.reload();
            }
        };
           

       $('.demoTable .layui-btn').on('click', function() {
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
        
    });
    
}
}
    
    
function showPosition(position) {
    y = position.coords.latitude; 
    x = position.coords.longitude; 
    
}
       
       
        window.onload = getLocation();
    
    
    <?php echo '</script'; ?>
>
   
    <p id="gps">正在获取GPS信息</p>
<style>
.loader {
  border: 13px solid #f3f3f3;
  border-radius: 50%;
  border-top: 13px solid lightseagreen;
  width: 20px;
  height: 20px;

    margin: auto;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
    <div class="loader" id="loader"></div>
   
</body>

</html><?php }
}
