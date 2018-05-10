<?php
/* Smarty version 3.1.30, created on 2018-05-11 03:22:06
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/room_avaliable.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5af49bdec7e8c3_98537894',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd56a077c2c0c68774a1a55e32c7034468f110c5' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/room_avaliable.html',
      1 => 1525980124,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af49bdec7e8c3_98537894 (Smarty_Internal_Template $_smarty_tpl) {
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
         <?php if ($_SESSION['checked'] == false) {?> 
        <a class="layui-btn layui-btn-xs" lay-event="checkIn">Check In</a>
        <?php } else { ?>
        <a class="layui-btn layui-btn-xs layui-disabled">Check In</a>
        <?php }?>

        <?php if ($_SESSION['checked'] == true) {?> 
      
        <a class="layui-btn layui-btn-xs" lay-event="checkOut">Check Out</a>
        <?php } else { ?>

         <a class="layui-btn layui-btn-xs layui-disabled">Check Out</a>
        <?php }?>
        
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS');?>
layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>
 
   
    <?php echo '<script'; ?>
>
        
layui.use(['table','form'], function() {
        var table = layui.table,
        	form = layui.form;
        
     
       console.log(obj);
        //方法级渲染
        table.render({
            
            elem: '#table_type',
            url: '<?php echo @constant('ADMIN_SITE');?>
Room/getAvailableRoom?bid=<?php echo $_GET['bid'];?>
',
            id:'rid',
            cols: [[
              
                { field: 'roomnumber', title: 'Room Number', sort: true, fixed: true, align: 'center' },
                { fixed: 'right', title: '操作', align: 'center', toolbar: '#barDemo' }
                
              
            ]],
            id: 'idTest',
            page: true,
        });
    

        //监听表格复选框选择
		table.on('checkbox(demo)', function(obj){
			console.log(obj);
		});
        
        var $ = layui.$, active = {
            refresh: function() {
                window.location.reload();
            }
        };
    
        table.on('tool(role)', function(obj) {
                console.log(obj.data.rid);
                var data = obj.data;
                if (obj.event === 'checkIn') {
                    layer.confirm('确定Check In吗？', function(index) {
                        // obj.del();
                        layer.close(index);
                        $.ajax({
                            url:'checkIn?rid='+<?php echo $_GET['rid'];?>
 ,
                            data:{'rid':<?php echo $_GET['rid'];?>
},
                            type:'POST',
                            dataType:'json',
                            success:function(redata){
                                if(redata.msg == 2){
                                    layer.msg("Check In Error，请重试");
                                }else if(redata.msg == 1){
                                    window.location.reload();
                                }else if(redata.msg == 3){
                                    layer.msg("Unknown Error!!");
                                }
                            }
                        });
                        return false;
                    });
                } else if (obj.event === 'checkOut') {
                   layer.confirm('确定Check Out吗？', function(index) {
                        // obj.del();
                        layer.close(index);
                       console.log(data);
                        $.ajax({
                            url:'checkOut?rid=' + data.rid,
                            //<?php echo $_GET['rid'];?>

                            data:{'rid': "1"},
                            type:'POST',
                            dataType:'json',
                            success:function(redata){
                                if(redata.msg == 2){
                                    layer.msg("你只能Check Out当前Check In房间");
                                }else if(redata.msg == 1){
                                     window.location.reload();
                                }else if(redata.msg == 3){
                                    layer.msg("Unknown Error!!");
                                }
                            }
                        });
                        return false;
                    });
                }
            });

       $('.demoTable .layui-btn').on('click', function() {
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
        
    });
    

    
    
    <?php echo '</script'; ?>
>
    
   
</body>

</html><?php }
}
