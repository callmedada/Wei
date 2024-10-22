<?php
/* Smarty version 3.1.30, created on 2018-03-14 23:17:04
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/catalog_index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa93cf0ce4591_29949563',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8621aeb5af3abadcca1e2d41f4849910cf7fdfc9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/catalog_index.html',
      1 => 1519874488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa93cf0ce4591_29949563 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="<?php echo @constant('JS');?>
layui/css/layui.css" />
    <!-- <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS');?>
forbidRight.js"><?php echo '</script'; ?>
> -->
    <style type="text/css">
        #zhu{width: 100%;margin-top: 20px;overflow: hidden;}
        #tree{width: 25%;display: inline-block;float: left;border: 1px solid #eee;margin-left: 5%;}
        .layui-table-view{width: 69%;float: left;margin-top: 0;}
        .layui-tree-skin-shihuang .layui-tree-branch{color: #FF8000;} 
    </style>
</head>

<body>
    <div class="layui-btn-group demoTable">
    	<button class="layui-btn" data-type="add"><i class="layui-icon">&#xe654;</i></button>
        <button class="layui-btn" data-type="refresh"><i class="layui-icon">&#x1002;</i></button>
    </div>
    <span style="display: inline-block;color: #666;">（可在右边查看所有分类树形图）</span>
    <div id="zhu">
        <table class="layui-hide" id="table_type" lay-filter="menus"></table>
        <ul id="tree"></ul>
    </div>
    <?php echo '<script'; ?>
 type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-xs" lay-event="add">新增</a>
        <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="edit">编辑</a>
        {{ d.play == 1 ? '<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>' : "" }}
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS');?>
layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
    layui.use(['table','form','tree','laypage'], function() {
        var table = layui.table,
        	form = layui.form,
            tree = layui.tree,
            laypage = layui.laypage;

        //方法级渲染 
        table.render({
            elem: '#table_type',
            url: '<?php echo @constant('ADMIN_SITE');?>
Catalog/getInfo',
            cols: [[
                { field: 'id', title: 'ID', width:"8%", sort: true, fixed: true, align: 'center' },
                { field: 'sort', title: '排序', width:"8%", sort: true, align: 'center' },
                { field: 'name', title: '名称', width:"16%", align: 'center' },
                { field: 'pid', title: '所属类型', width:"8%", align: 'center' },
                { field: 'created', title: '创建时间', width:"13%", align: 'center' },
                { fixed: 'right', title: '操作', width:"13%", align: 'left', toolbar: '#barDemo' }
            ]],
            id: 'idTest',
            page: {
                limit: '10',
                // curr: 1  
            }
        });

        //树形图
        layui.tree({
            elem: '#tree', //传入元素选择器
            skin: 'shihuang',
            nodes: <?php echo $_smarty_tpl->tpl_vars['data']->value;?>
 ,
            click: function(node){
                console.log(node); //node即为当前点击的节点数据
            }
        });
        
        //监听工具条
        table.on('tool(menus)', function(obj) {
            var data = obj.data;
            if (obj.event === 'del') {
                layer.confirm('确定删除该数据吗？', function(index) {
                    obj.del();
                    layer.close(index);
                    $.ajax({
                    	url:'del?id='+data.id,
                    	data:{id:data.id},
                    	type:'post',
                    	dataType:'json',
                    	success:function(redata){
                    		if(redata.msg == 1){
                    			layer.alert('删除成功！', {
                                    icon: 1,
                                    skin: 'layer-ext-moon'
                                });
                    		}
                    	}
                    });
                    return false;
                });
            } else if (obj.event === 'edit') {
                layer.open({
                    type: 2,
                    title: "编辑分类",
                    area: ['700px', '450px'],
                    fixed: false, //不固定
                    closeBtn: 1,//关闭窗口按钮
                    maxmin: true,//窗口最大最小化按钮
                    content: 'edit?id='+data.id+'&act=edit'
                });
            } else if (obj.event === 'add') {
                layer.open({
                    type: 2,
                    title: "新增分类",
                    area: ['700px', '450px'],
                    fixed: false, //不固定
                    closeBtn: 1,//关闭窗口按钮
                    maxmin: true,//窗口最大最小化按钮
                    content: 'add?id='+data.id+'&act=add'
                });
            }
        });

        var $ = layui.$, active = {
        	add: function() {
        		layer.open({
					type: 2,
					title: "新增分类",
					area: ['700px', '450px'],
					fixed: false, //不固定
					closeBtn: 1,//关闭窗口按钮
					maxmin: true,//窗口最大最小化按钮
					content: 'add?act=add'
				});
        	},
            refresh: function() { //刷新
                window.location.reload();
            },
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
