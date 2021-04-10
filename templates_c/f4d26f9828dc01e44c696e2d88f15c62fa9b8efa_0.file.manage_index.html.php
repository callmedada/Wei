<?php
/* Smarty version 3.1.30, created on 2018-03-14 23:18:51
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/manage_index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa93d5b10ff35_61884295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4d26f9828dc01e44c696e2d88f15c62fa9b8efa' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/manage_index.html',
      1 => 1519874488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa93d5b10ff35_61884295 (Smarty_Internal_Template $_smarty_tpl) {
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
    	<button class="layui-btn" data-type="add"><i class="layui-icon">&#xe654;</i></button>
        <button class="layui-btn" data-type="delCheckData"><i class="layui-icon">&#xe640;</i></button>
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
Manage/getInfo',
            cols: [[
                { checkbox: true, fixed: true },
                { field: 'id', title: 'ID', sort: true, fixed: true, align: 'center' },
                { field: 'name', title: '账号', sort: true, align: 'center' },
                { field: 'role_id', title: '角色', sort: true, align: 'center' },
                { field: 'last_ip', title: '最后登录IP', sort: true, align: 'center' },
                { field: 'last_time', title: '最后登录时间', sort: true, align: 'center' },
                { field: 'created', title: '创建时间', align: 'center' },
                { fixed: 'right', title: '操作', align: 'center', toolbar: '#barDemo' }
            ]],
            id: 'idTest',
            page: true,
        });

        //监听表格复选框选择
		table.on('checkbox(demo)', function(obj){
			console.log(obj);
		});

        //监听工具条
        table.on('tool(role)', function(obj) {
            var data = obj.data;
            if (obj.event === 'del') {
                layer.confirm('确定删除该数据吗？', function(index) {
                    // obj.del();
                    layer.close(index);
                    $.ajax({
                    	url:'del?id='+data.id,
                    	data:{id:data.id,name:data.name},
                    	type:'post',
                    	dataType:'json',
                    	success:function(redata){
                            if(redata.msg == 2){
                    			layer.msg("删除失败，请重试");
                    		}else if(redata.msg == 1){
                    			window.location.href="index";
                    		}else if(redata.msg == 3){
                                layer.msg("该账号为当前登录账号，无法删除！");
                            }
                    	}
                    });
                    return false;
                });
            } else if (obj.event === 'edit') {
                layer.open({
                    type: 2,
                    title: "编辑后台账号",
                    area: ['700px', '450px'],
                    fixed: false, //不固定
                    closeBtn: 1,//关闭窗口按钮
                    maxmin: true,//窗口最大最小化按钮
                    content: 'edit?id='+data.id+'&act=edit'
                });
            }
        });

        var $ = layui.$, active = {
        	add: function() {
        		layer.open({
					type: 2,
					title: "添加后台账号",
					area: ['700px', '450px'],
					fixed: false, //不固定
					closeBtn: 1,//关闭窗口按钮
					maxmin: true,//窗口最大最小化按钮
					content: 'add?act=add'
				});
        	},
            refresh: function() { //获取选中数目
                window.location.reload();
            },
            delCheckData: function() { //删除选中数据
                var checkStatus = table.checkStatus('idTest'),
                    data = checkStatus.data;
                if (data.length == 0) {
                	layer.alert("请先选择删除项");
                }else{
                    layer.confirm('确定删除该数据吗？', function(index) {
                    	var ids = [];
	                    for(var i=0;i<data.length;i++){
	                    	ids.push(data[i].id);
	                    }
	                    $.post('delete',{data:ids},function(redata){
                            if (redata.msg==1) {
                                window.location.href="index";
                            }else if (redata.msg==2){
                                layer.confirm("删除的数据当中含有当前登录账号，无法删除！",function(){
                                    window.location.reload();
                                });
                            }
	                    },'json');
                    });
                }
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