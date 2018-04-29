<?php
/* Smarty version 3.1.30, created on 2018-04-30 03:46:31
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/room_index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ae621176bfe43_81030614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f23e442201075b05e7b897abc77bce10012e7ee6' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/room_index.html',
      1 => 1525031185,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ae621176bfe43_81030614 (Smarty_Internal_Template $_smarty_tpl) {
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
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
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
Room/getAvaliableRoom',
            cols: [[
                { checkbox: true, fixed: true },
                { field: 'name', title: 'Building', sort: true, fixed: true, align: 'center' },
                { field: 'roomnumber', title: 'Room Number', sort: true, align: 'center' },
                { field: 'distance', title: 'Distance', sort: true, align: 'center' }
              
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
