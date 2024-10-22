<?php
/* Smarty version 3.1.30, created on 2018-03-14 23:16:55
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/menu_index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa93ce7a7d539_87868212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8511865bfe6b9924f5765a0e94dfa5e3c2f3b71' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/menu_index.html',
      1 => 1519874488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa93ce7a7d539_87868212 (Smarty_Internal_Template $_smarty_tpl) {
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
    <span style="display: inline-block;color: #666;">（注意：ID为1、2、3、4、5的菜单为系统菜单，无法删除！）</span>
    <table class="layui-hide" id="table_type" lay-filter="menus"></table>
    <?php echo '<script'; ?>
 type="text/html" id="first">
		{{ d.first == 1 ? '是' : '否' }}
	<?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/html" id="switchTpl">
		<input type="checkbox" name="play" alt="{{ d.id }}" value="{{ d.play }}" lay-skin="switch" lay-text="显示|隐藏" lay-filter="play"  {{ d.play == 'on' ? 'checked' : '' }}>
	<?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/html" id="bar">
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
Menu/getInfo',
            cols: [[
                { checkbox: true, fixed: true },
                { field: 'id', title: 'ID', sort: true, fixed: true, align: 'center' },
                { field: 'name', title: '菜单名称', sort: true, align: 'center' },
                { field: 'first', title: '一级菜单',templet:'#first', align: 'center' },
                { field: 'pid', title: '父级菜单', align: 'center' },
                { field: 'play', title: '是否显示',templet:'#switchTpl', align: 'center'},
                { field: 'created', title: '创建时间', align: 'center' },
                { fixed: 'right', title: '操作', align: 'center', toolbar: '#bar' }
            ]],
            id: 'idTest',
            page: true,
            limit: 20,
        });

        //监听表格复选框选择
		table.on('checkbox(demo)', function(obj){
			console.log(obj);
		});

		//监听显示状态,在此进行ajax操作
		form.on('switch(play)', function(obj){
			// layer.msg(this.checked ? "true" : "false");
		    // layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
            var check = "";
            if(obj.elem.checked){
                check = "on";
            }else{
                check = "off";
            }
            var id = this.alt;
            $.post('switch',{check:check,id:id},function(redata){
                if (redata.msg == 2) {
                    layer.tips("修改失败");
                }
            },'json');
            return false;
		});

        //监听工具条
        table.on('tool(menus)', function(obj) {
            var data = obj.data;
            if (obj.event === 'del') {
                layer.confirm('确定删除该数据吗？', function(index) {
                    // obj.del();
                    layer.close(index);
                    $.ajax({
                    	url:'del?id='+data.id,
                    	data:{id:data.id},
                    	type:'post',
                    	dataType:'json',
                    	success:function(redata){
                    		if(redata.msg == 2){
                    			layer.alert("该菜单为一级菜单且存在子菜单，请先删除该节点下的所有子菜单");
                    			layer.close(index);
                    		}else if(redata.msg == 3){
                    			layer.alert("删除失败，请重试");
                    			layer.close(index);
                    		}else if(redata.msg == 1){
                    			window.location.href="index";
                    		}else if(redata.msg == 4){
                                layer.msg("系统模块，无法删除！");
                                layer.close(index);
                            }
                    	}
                    });
                    return false;
                });
            } else if (obj.event === 'edit') {
                layer.open({
                    type: 2,
                    title: "添加菜单",
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
					title: "添加菜单",
					area: ['700px', '450px'],
					fixed: false, //不固定
					closeBtn: 1,//关闭窗口按钮
					maxmin: true,//窗口最大最小化按钮
					content: 'add?act=add'
				});
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
    	                    	if (redata.msg == 2) {
    	                    		layer.confirm("删除节点当中含有存在子菜单的一级菜单，请先删除该节点下所有子菜单", function(index){
    	                    			layer.close(index);
    									window.location.href="index";
    	                    		});
    	                    	}else if (redata.msg == 1) {
                                    window.location.href="index";
                                }else if(redata.msg == 3){
                                    layer.confirm("删除节点当中含有系统菜单", function(index){
                                        layer.close(index);
                                        window.location.href="index";
                                    });
                                }
    	                    },'json');
                            return false;
                        });
                    }
                    
                // layer.alert(JSON.stringify(data));
            },
            refresh: function() { //获取选中数目
                window.location.reload();
            },
            isAll: function() { //验证是否全选
                var checkStatus = table.checkStatus('idTest');
                layer.msg(checkStatus.isAll ? '全选' : '未全选');
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
