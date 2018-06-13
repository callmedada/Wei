<?php
/* Smarty version 3.1.30, created on 2018-05-31 04:26:11
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/room_avaliable.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b0f08e33b7bb4_42484424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd56a077c2c0c68774a1a55e32c7034468f110c5' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/room_avaliable.html',
      1 => 1527711953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0f08e33b7bb4_42484424 (Smarty_Internal_Template $_smarty_tpl) {
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
        <a class="layui-btn layui-btn-xs" lay-event="checkIn">Check In</a>
        <a class="layui-btn layui-btn-xs" lay-event="checkOut">Check Out</a>
		<a class="layui-btn layui-btn-xs" lay-event="report">Report</a>
        
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
        
     
        //方法级渲染
        table.render({
            
            elem: '#table_type',
            url: '<?php echo @constant('ADMIN_SITE');?>
Room/getAvailableRoom?bid=<?php echo $_GET['bid'];?>
',
            id:'rid',
            cols: [[
              
                { field: 'roomnumber', title: 'Room Number', sort: true, fixed: true, align: 'center'},
                { fixed: 'right', title: '操作', align: 'center', toolbar: '#barDemo' }
                
              	
            ]],
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
               
                var data = obj.data;
                console.log(data.rid);
                if (obj.event === 'checkIn') {
                    layer.confirm('确定Check In吗？', function(index) {
                        // obj.del();
                        layer.close(index);
                        $.ajax({
                            url:'checkIn?rid='+data.rid ,
                            data:{'rid':data.rid},
                            type:'POST',
                            dataType:'json',
                            success:function(redata){
                                if(redata.msg == 2){
                                    layer.msg("你还没有Check Out");
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
                       
                        $.ajax({
                            url:'checkOut?rid=' + data.rid,
                            //<?php echo $_GET['rid'];?>

                            data:{'rid': data.rid},
                            type:'POST',
                            dataType:'json',
                            success:function(redata){
                                if(redata.msg == 2){
                                    layer.msg("你只能Check Out当前Check In房间");
                                }else if(redata.msg == 1){
                                     window.location.reload();
                                }else if(redata.msg == 3){
                                    layer.msg("你还没有Check In");
                                }
                            }
                        });
                        return false;
                    });
                } else if (obj.event === 'report') {
					window.location.href = "showReportForm?b= <?php echo $_GET['b'];?>
&r=" + data.roomnumber+"&rid="+data.rid;
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
